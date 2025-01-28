<?php
namespace App\Http\Controllers;

use App\Models\ReportColor;

// use PDF;
// use Dompdf\Dompdf;
use H4cc\WkhtmlToPdf\WkhtmlToPdf;
use Illuminate\Support\Facades\Log;


use Dompdf\Options;

use Carbon\Carbon;

use App\Models\User;

use App\Models\Audit;

use App\Models\Client;

use App\Models\Template;

use App\Models\TempFolder;

use App\Models\AuditDetail;

use App\Models\ServiceCode;

use Illuminate\Http\Request;

use App\Models\TemplateDetail;

use App\Models\CompletedReport;


use App\Models\DepartmentScore;

use App\Models\ObjectiveResponse;

use App\Models\ConsolidatedReport;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Models\GraphType;

use Illuminate\Support\Facades\View;
// use Niklasravnsborg\Pdf\Pdf;

class AuditController extends Controller
{

    public function index()
    {

        return view('audits');
    }

    public function schedule_audit(Request $request)
    {

        $request->validate([

            'client_id' => 'required',

            'audit_index' => 'required',
            'audit_number' => 'required',


            'audit_name' => 'nullable',

            'start' => 'nullable',

            // 'end' => 'nullable',

            'audit_type' => 'nullable',

            'location' => 'nullable',

            'checklists' => 'nullable',

            'auditors' => 'nullable',

            'amount' => 'nullable',

            'auditing_for' => 'nullable',

            'doc_ref' => 'nullable',

            'personal_responsible' => 'nullable',

            'director' => 'nullable',

            'fstl' => 'nullable'

        ]);



        $client = Client::where(['id' => $request->client_id])->first();

        $client_audits = Audit::where(['client_id' => $request->client_id])->count();



        // if ($client_audits >= $client->no_audit_conduct) {

        //     return response()->json(['error' => "Audits limit reached", 'status' => 400], 200);
        // }


        $request['location'] = $client->organisation_location;


        $selectedValues = $request->input('checklists');



        // Convert the array of selected values to a string

        // $valuesString = implode(',', $selectedValues);

        // $request['checklists'] = $valuesString;



        // $input = $request->all();

        // return response()->json(['success'=>$input], 200);

        $checklists = $request->checklists;

        $checkQues = [];

        foreach ($checklists as $check) {
            $tempLateD = TemplateDetail::where(['template_id' => $check])->get();

            foreach ($tempLateD as $t) {
                // Check if the key exists in the array
                if (!isset($checkQues[$check])) {
                    // If not, initialize it as an empty array
                    $checkQues[$check] = [];
                }

                // Check if the value exists in the array
                if (!in_array($t->id, $checkQues[$check])) {
                    // If not, store the value in the array
                    $checkQues[$check][] = $t->id;
                }
            }
        }

        // Encode the array to JSON
        $checkQuesJson = json_encode($checkQues);


        $request['questions'] = $checkQuesJson;
        $checklists = json_encode($checklists);








        $request['checklists'] = $checklists;



        if ($request->auditing_for == 0) {

            $scheduled_time = Carbon::now()->addDay()->format('Y-m-d');

            $request['deadline_time'] = $scheduled_time;
        }


        $carbonDate = Carbon::createFromFormat('Y-m-d', $request->start);

        $monthNumber = $carbonDate->month;

        $yearNumber = $carbonDate->year;

        $request['month'] = $monthNumber;

        $request['year'] = $yearNumber;

        if ($request->auditing_for == 1) {

            $request['audit_index'] = $request->audit_index . "-" . $client->client_id . "-INDUS-" . $request->audit_number;
        } else {
            $request['audit_index'] = $request->audit_index . "-" . $client->client_id . "-" . $request->audit_number;
        }

        // dd($request['audit_index']);

        $audit = Audit::create($request->all());





        return response()->json(['success' => $audit, 'status' => 200], 200);

        // return redirect()->back()->with('success','Client created successfully');

    }





    public function view_audit($id)
    {

        $audit = Audit::where(['id' => $id])->first();

        return view('audit.view', ['audit' => $audit]);
    }



    public function update_audit(Request $request)
    {

        $request->validate([

            'audit_id' => 'required',

            'audit_index' => 'nullable',

            'audit_name' => 'nullable',

            'start' => 'nullable',



            'end' => 'nullable',

            'audit_type' => 'nullable',

            'location' => 'nullable',

            // 'checklists' => 'nullable',

            'auditors' => 'nullable',

            'amount' => 'nullable',

            'auditing_for' => 'nullable'

        ]);





        $audit = Audit::where(['id' => $request->audit_id])->first();



        $audit->update(

            $request->all()

        );



        return redirect()->back()->with('success', 'Audit updated successfully');
    }


    public function template_options(Request $request)
    {

        $folder = TempFolder::where(['id' => $request->selectedFolderId])->first();



        $template = Template::where(['temp_folder_id' => $folder->id])->get();

        // $templates_details = TemplateDetail::where(['template_id' => $template->id])->get();





        return response()->json(['template' => $template], 200);
    }





    public function tempsInFolder(Request $request)
    {

        $temppsinfolder = Template::where(['temp_folder_id' => $request->folderID])->get(['id', 'template_name']);

        return response()->json(['response' => $temppsinfolder], 200);
    }





    public function remove_audit(Request $request)
    {

        $request->validate([

            'auditId' => 'required'

        ]);



        $audit = Audit::where(['id' => $request->auditId])->delete();



        if ($audit) {

            return redirect()->back()->with('success', 'Audit removed successfully');
        } else {

            return redirect()->back()->with('success', 'Problem removing audit. PLease try again.');
        }
    }





    public function resume_audit(Request $request)
    {

        $request->validate([
            'auditId' => 'required',
            'cid' => 'nullable'
        ]);


        $audit = Audit::where(['id' => $request->auditId])->first();
        $client = Client::where(['id' => $request->cid])->first();

        $template_array = json_decode($audit->checklists);
        $total_questions_array = [];
        $total_questionsAnswered_array = [];
        $tenplates_names_in_audit = [];

        $emptyInputs = 0;

        foreach ($template_array as $template) {
            $tempLate = Template::where(['id' => $template])->first();
            $tempLateD = TemplateDetail::where(['template_id' => $template])->get();
            $auditfilled = AuditDetail::where(['audit_id' => $request->auditId, 'template_id' => $template])->get();
            $tempLate['tot_que_answered'] = count($auditfilled);
            $tempLate['tot_que'] = count($tempLateD);
            $total_questions_array[] = count($tempLateD);
            // dd($total_questions_array);
            $total_questionsAnswered_array[] = count($auditfilled);
            $tenplates_names_in_audit[] = $tempLate;

            $checking = AuditDetail::where(['audit_id' => $request->auditId, 'template_id' => $template])->get();

            foreach ($checking as $chk) {
                if ($chk->response_score == 0) {
                    if ($chk->objective_evidences == null || $chk->suggestions == null || $chk->evidences == null || $chk->evidences == []) {
                        $emptyInputs += 1;
                    }
                }
            }
        }

        $total_questions_in_audit = array_sum($total_questions_array);
        $total_answers_in_audit = array_sum($total_questionsAnswered_array);

        $auditfilled = AuditDetail::where(['audit_id' => $request->auditId, 'template_id' => $template])->first();
        if ($auditfilled) {
            $start_time = $auditfilled->created_at->format('H:i A');
        } else {
            $start_time = '';
        }

        // Parse the input date using Carbon
        $carbonDate = Carbon::parse($audit->start);

        // Convert to the desired format with AM/PM
        $formattedDate = $carbonDate->format('d-m-Y');
        $audit->formated_date = $formattedDate;

        // if($audit){
        // return redirect()->back()->with('success','Audit resumed successfully');
        // }else{
        // return redirect()->back()->with('success','Problem removing audit. PLease try again.');
        // }

        $signDone = 0;
        if ($audit->auditor_sign != null && $audit->auditee_sign != null) {
            $signDone = 1;
        }

        $auditDetail = AuditDetail::where(['id' => $request->auditId])->first();

        $isSaved = false;

        if ($auditDetail && $auditDetail->report_path) {
            $isSaved = true;
        }

        return view('audit.resume', ['isSaved' => $isSaved, 'client' => $client, 'emptyInputs' => $emptyInputs, 'clientId' => $request->cid, 'audit' => $audit, 'start_time' => $start_time, 'tenplates_names_in_audit' => $tenplates_names_in_audit, 'auditfilled' => $auditfilled, 'total_questions_in_audit' => $total_questions_in_audit, 'total_answers_in_audit' => $total_answers_in_audit, 'signDone' => $signDone]);
    }





    public function getFormData(Request $request)
    {
        $itemId = $request->itemId; // Get the item ID from the AJAX request
        $auditid = $request->audi_id;
        // return response()->json([$itemId,$auditid], 200);

        // Fetch the data from the database using the item ID or any other identifier
        $data = AuditDetail::where(['question_id' => $itemId, 'audit_id' => $auditid])->first();
        // return response()->json($data, 200);

        if ($data !== null) {
            $data['img'] = json_decode($data['evidences']);
            return response()->json(['data' => $data, 'status' => true]);
        }
        // Return the data as JSON
        return response()->json(['data' => 'no data found', 'status' => false]);
    }


    public function getResponseType(Request $request)
    {

        $audi_id = $request->audi_id;
        // return response()->json([$itemId,$auditid], 200);
        // Fetch the data from the database using the audit ID or any other identifier
        $data = Audit::where(['id' => $audi_id])->first('multi_select');
        if ($data !== null) {
            return response()->json($data);
        }
        // Return the data as JSON
        return response()->json(['data' => 'no data found']);
    }


    public function remSelTemp(Request $request)
    {
        return response()->json(['data' => $request->tem_id], 200);
    }


    public function tempdetAjax(Request $request)
    {
        $temp = Template::where(['id' => $request->tem_id])->first();
        $data = TemplateDetail::where(['template_id' => $request->tem_id])->get();
        $response = [
            'temp' => $temp,
            'data' => $data
        ];
        return response()->json(['response' => $response], 200);
    }

    public function getResGrp(Request $request)
    {
        $data = ObjectiveResponse::where(['group_id' => $request->resGrp])->get();
        return response()->json(['data' => $data], 200);
    }

    public function fillAudit(Request $request)
    {

        $request->validate([
            'audit_id' => 'required',
            'question_id' => 'required',
            'template_id' => 'required',
            'template_name' => 'required',
            'response_score' => 'nullable',
            'objective_evidences' => 'nullable',
            'suggestions' => 'nullable',
            'evidences' => 'nullable',
        ]);
        // dd($request->all());
        $imgArr = array();

        $auditDetail = AuditDetail::where(['audit_id' => $request->audit_id, 'question_id' => $request->question_id])->first();
        if ($auditDetail !== null) {
            $existingImages = json_decode($auditDetail->evidences, true);
            // If there are existing images, add them to the $imgArr array
            if (!empty($existingImages)) {
                $imgArr = $existingImages;
            }
        }

        if ($files = $request->file('evidences')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'storage/evidences/';
                // $request->avatar->storeAs('users',$filename,'public');
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $imgArr[] = $image_url;
            }
        }

        $input = $request->all();
        $input['evidences'] = json_encode($imgArr);

        if (is_string($request->response_score)) {
            $response_score_arr = explode('|', $request->response_score);
            $input['response_score'] = $response_score_arr[0];
            $input['response_id'] = $response_score_arr[1];
        }

        if (is_array($request->response_score)) {

            $firstValues = [];
            $secondValues = [];
            foreach ($request->response_score as $item) {
                $parts = explode('|', $item);
                if (count($parts) === 2) {
                    $firstValues[] = $parts[0];
                    $secondValues[] = $parts[1];
                }
            }
            $firstValStr = implode(',', $firstValues);
            $secondValStr = implode(',', $secondValues);

            // dd($firstValStr,$secondValStr);
            $input['response_score'] = $firstValStr;
            $input['response_id'] = $secondValStr;
        }
        // for setting time when 1st question is answered 
        $input['start_time'] = Carbon::now()->addHours('5')->addMinutes('30')->format('H:i A');

        // Creating Audit
        if ($auditDetail == null) {
            $auditfill = AuditDetail::create($input);
            if ($auditfill) {
                $audit = Audit::where(['id' => $request->audit_id])->first();
                $percentage = $this->quick_completion_percentage($audit->id);
                $audit->completion = $percentage;
                $audit->save();
                return redirect()->back()->with('success', 'Details uploaded successfully');
            } else {
                return redirect()->back()->with('error', 'Details upload failed. Try again.');
            }
        } else {
            // $auditDetail->update($input);
            if ($auditDetail->update($input)) {
                $audit = Audit::where(['id' => $request->audit_id])->first();
                $percentage = $this->quick_completion_percentage($audit->id);
                $audit->completion = $percentage;
                $audit->save();
                return redirect()->back()->with('success', 'Details updated successfully');
            } else {
                return redirect()->back()->with('error', 'Details update failed. Try again.');
            }
        }
    }





    public function removeEvidence(Request $request)
    {

        $request->validate([

            'audit_id' => 'required',

            'question_id' => 'required',

            'imageIndex' => 'required'



        ]);

        $auditDetail = AuditDetail::where(['audit_id' => $request->audit_id, 'question_id' => $request->question_id])->first();

        $evidencesArr = json_decode($auditDetail->evidences);



        foreach ($evidencesArr as $key => $img) {

            if ($key == $request->imageIndex) {

                unset($evidencesArr[$key]);
            }
        }





        $evidencesArr = array_values($evidencesArr); // Re-index the array



        $evidencesjson = json_encode($evidencesArr, true);



        $auditDetail->evidences = $evidencesjson;



        $auditDetail->save();

        // dd($auditDetail);

        if ($auditDetail->save()) {

            return redirect()->back()->with('success', 'Image removed');
        } else {

            return redirect()->back()->with('error', 'Image  not removed');
        }
    }





    public function dloadAudRep(Request $request)
    {

        $request->validate([

            'auditId' => 'required',

            'cid' => 'required'



        ]);



        $audit = Audit::where(['id' => $request->auditId])->first();



        $client = Client::where(['id' => $request->cid])->first();



        $todaydate = Carbon::now();

        $todayDate = $todaydate->format('d/m/Y');

        $todayTime = $todaydate->format('H:i A');



        if ($client) {



            $pdf = PDF::loadView('audit-report-pdf', [

                'client' => $client,

                'audit' => $audit,

                'todayDate' => $todayDate,

                'todayTime' => $todayTime

            ]);

            return $pdf->stream('auditreportPdf.pdf');
        }



        // return $pdf->download('itsolutionstuff.pdf');

        return redirect()->back()->with('error', 'Client not found');
    }


    public function auditRepView(Request $request)
    {
        $request->validate([

            'auditId' => 'required',

            'auth_id' => 'required',

            'cid' => 'required',

        ]);
        Log::info('Audit report view request', ['request' => $request->all()]);
        // Auth user 

        if ($request->auth_id != 'client') {
            // Fetch the user details if auth_id is not 'client'
            $auth_user = User::where(['id' => $request->auth_id])->first(['name', 'designation']);
        } else {
            // Create a new object for dummy values
            $auth_user = new \stdClass();
            $auth_user->name = 'Dummy Name';
            $auth_user->designation = 'Dummy Designation';
        }


        $color_code = ReportColor::where(['type' => 1])->first();

        $color_code_ind = ReportColor::where(['type' => 2])->first();



        $type = GraphType::first();

        // dd($type->type);
        // Audit record

        $audit = Audit::where(['id' => $request->auditId])->first();
        // Previous Audit report 

        // $previous_audit = Audit::where('id','<',$request->auditId)->where(['client_id' => $request->cid])->first();



        // if($previous_audit !== null){

        //     $previous_check_array = json_decode($previous_audit->checklists); // converted to array



        // }

        // Templates json data from above audit record

        $check_array = json_decode($audit->checklists); // converted to array

        $sectionCount = count($check_array);            // count the number of templates in audit



        $total_qu_count = [];                           // (done final), total questions in template

        $actual_responses = [];

        $target_responses = [];



        $templatecoll = [];

        $templatenames = [];



        $roundPercen = [];



        $sdgsArr = [];



        foreach ($check_array as $ca) {

            $template = Template::where(['id' => $ca])->first(['id', 'template_name', 'temp_folder_id']); // Fetch template_id and template_name

            $temp_folder = TempFolder::where(['id' => $template->temp_folder_id])->first('title'); // Fetch template_id and template_name



            $questions = TemplateDetail::where('template_id', $ca)->get(); // Fetch questions using template_id

            // dd($questions) ;

            $responses = ObjectiveResponse::where(['group_id' => $questions[0]->response_group])->get(); // responses belonged to this group

            // initializing base score
            $base_score = '';
            foreach ($responses as $r) {
                if ($r->is_base == 1) {
                    $base_score = $r->score;
                }
            }
            // After this, the base score is decided

            // sending template anmes array to graph 
            $templatenames[] = $template->template_name;

            //  -----------Actual score----------------------
            $actual_score_array = [];
            foreach ($questions as $q) {
                $qResponse = AuditDetail::where(['audit_id' => $request->auditId, 'question_id' => $q->id])->first();
                $actual_score_array[] = $qResponse->response_score;
            }
            $actual__score = array_sum($actual_score_array);
            // --------------Got the actual score ------------------
            $actual_responses[] = $actual__score;


            // ---------  Target score ------------------

            $target_score_array = [];

            foreach ($questions as $q) {

                $qResponse = AuditDetail::where(['audit_id' => $request->auditId, 'question_id' => $q->id])->first();



                if ($qResponse->response_score == 'null' || $qResponse->response_score == 0) {

                    $target_score_array[] = $base_score;
                } else {

                    $target_score_array[] = $qResponse->response_score;
                }

            }

            $target__score = array_sum($target_score_array);

            // -------- Got the Target score -------------

            $target_responses[] = $target__score;





            // SDGs for graph



            foreach ($questions as $sdg_inQ) {
                // $sdgsArr[] = $sdg_inQ->sdg;
                $name = ""; // Initialize the name variable
                $color = '';
                // Determine the name based on the value (you can customize this logic)
                if ($sdg_inQ->sdg == 1) {
                    $name = 'No Poverty';
                    $color = '#e5233d';
                } elseif ($sdg_inQ->sdg == 2) {
                    $name = 'Zero Hunger';
                    $color = '#dda73a';
                } elseif ($sdg_inQ->sdg == 3) {
                    $name = 'Good Health and Well-Being';
                    $color = '#4ca146';
                } elseif ($sdg_inQ->sdg == 4) {
                    $name = 'Quality Education';
                    $color = '#c7212f';
                } elseif ($sdg_inQ->sdg == 5) {
                    $name = 'Gender Equality';
                    $color = '#ef402d';
                } elseif ($sdg_inQ->sdg == 6) {
                    $name = 'Clean Water and Sanitation';
                    $color = '#27bfe6';
                } elseif ($sdg_inQ->sdg == 7) {
                    $name = 'Affordable and Clean Energy';
                    $color = '#fbc412';
                } elseif ($sdg_inQ->sdg == 8) {
                    $name = 'Decent Work and Economic Growth';
                    $color = '#a31c44';
                } elseif ($sdg_inQ->sdg == 9) {
                    $name = 'Industry, Innovation, and Infrastructure';
                    $color = '#f26a2e';
                } elseif ($sdg_inQ->sdg == 10) {
                    $name = 'Reduced Inequalities';
                    $color = '#e01483';
                } elseif ($sdg_inQ->sdg == 11) {
                    $name = 'Sustainable Cities and Communities';
                    $color = '#f89d2a';
                } elseif ($sdg_inQ->sdg == 12) {
                    $name = 'Responsible Consumption and Production';
                    $color = '#bf8d2c';
                } elseif ($sdg_inQ->sdg == 13) {
                    $name = 'Climate Action';
                    $color = '#407f46';
                } elseif ($sdg_inQ->sdg == 14) {
                    $name = 'Life Below Water';
                    $color = '#1f97d4';
                } elseif ($sdg_inQ->sdg == 15) {
                    $name = 'Life on Land';
                    $color = '#59ba47';
                } elseif ($sdg_inQ->sdg == 16) {
                    $name = 'Peace, Justice and Strong Institutions';
                    $color = '#136a9f';
                } elseif ($sdg_inQ->sdg == 17) {
                    $name = ' Partnerships';
                    $color = '#14496bd';
                }
                $sdgsArr[] = [
                    'name' => $name,
                    'value' => $sdg_inQ->sdg,
                    'color' => $color
                ];
            }

            // dd($sdgsArr);
            // Responses of questions 
            foreach ($questions as $q) {
                $qResponse = AuditDetail::where(['audit_id' => $request->auditId, 'question_id' => $q->id])->first();
                $q->qName = TemplateDetail::where(['id' => $q->id])->first('question_name');
                // Log::info('Question response', ['response' => $qResponse]);
                // Log::info('Question', ['question' => $q]);

                if ($audit->auditing_for == 0) {
                    $previous_audit = Audit::where('id', '<', value: $request->auditId)->where(['client_id' => $request->cid, 'auditing_for' => 0])->first();
                }

                if ($audit->auditing_for == 1) {
                    $previous_audit = Audit::where('id', '<', $request->auditId)->where(['client_id' => $request->cid, 'auditing_for' => 1])->first();
                }
                if ($previous_audit !== null) {
                    // Log::info('Previous audit found', ['audit' => $previous_audit]);
                    // Log::info('Q', [$q->id]);
                    $previous_qResponse = AuditDetail::where(['audit_id' => $previous_audit->id])->where(['question_id' => $q->id])->first();
                    // Log::info('Previous question response', ['response' => $previous_qResponse]);
                    // dd($previous_qResponse);
                    if ($previous_qResponse !== null) {

                        $p_resp_text = ObjectiveResponse::where(['id' => $previous_qResponse->response_id])->first();
                        $q->pr_resp_text = $p_resp_text->name;
                    } else {
                        return redirect()->back()->with('error', "Your previous audit report is incomplete, please fill it completely to proceed further");
                    }
                }

                // Getting base score               
                if ($qResponse->response_score == 'null' || $qResponse->response_score == 0) {
                    $positive_responses[] = $base_score;
                } else {
                    $positive_responses[] = $qResponse->response_score;
                }

                $q->answewrs = $qResponse;
                $resp_text = ObjectiveResponse::where(['id' => $qResponse->response_id])->first();
                if ($resp_text) {

                    $q->resp_text = $resp_text;
                } else {
                    return redirect()->back()->with('error', 'Response is missing.Recheck your responses in objectives');
                }

                if ($qResponse->response_score == null) {
                    $q->res = 1;
                } elseif (is_array($qResponse->response_score)) {
                    $q->res = json_encode($qResponse->response_score);
                } else {
                    $q->res = $qResponse;
                }

                $q->images = json_decode($qResponse->evidences);
            }

            $total_positive_responses[] = array_sum($positive_responses);
            $templatecoll[] = [
                'temp_folder' => $temp_folder->title,
                'tempId' => $template->id,
                'tempName' => $template->template_name,
                'tempQues' => $questions,
                'positive_responses' => $actual__score,
                'target_responses' => $target__score
            ];

            // calculating percentage 
            $percentagetochart = ($actual__score / $target__score) * 100;
            $roundPercen[] = round($percentagetochart, 2);

            $check_dept = DepartmentScore::where(['audit_id' => $audit->id, 'template_id' => $template->id])->first();

            if ($check_dept == null) {
                $dept_score = new DepartmentScore;
                $dept_score->audit_id = $audit->id;
                $dept_score->template_id = $template->id;
                $dept_score->score = round($percentagetochart, 2);
                $dept_score->save();
            }
        }


        $sdgsArrJSON = json_encode($sdgsArr);
        // dd($sdgsArrJSON);

        $auditor = User::where(['id' => $audit->auditors])->first(['id', 'name', 'designation']);
        $client = Client::where(['id' => $request->cid])->first();

        $firstAnswerd = AuditDetail::where(['audit_id' => $request->auditId])->oldest()->first();
        // dd($firstAnswerd);
        $start_time = $firstAnswerd->created_at->format('H:i A');
        // $start_time = $request->start_time;

        $lastAnswerd = AuditDetail::where(['audit_id' => $request->auditId])->latest()->first();
        $end_date = $lastAnswerd->created_at->format('d/ m/ Y ');
        $end_time = $lastAnswerd->created_at->format('H:i A');



        // date_default_timezone_set('Asia/Kolkata');
        $todaydate = Carbon::now();
        $todayDate = $todaydate->format('d/m/Y');
        $todayTime = $todaydate->format('H:i A');

        if ($audit->end == null || $audit->end_time == null) {
            $audit->end = $todayDate;
            $audit->end_time = $todayTime;
            $audit->save();
        }

        $audit->final_score = (array_sum($actual_responses) / array_sum($target_responses)) * 100;
        if (!$audit->save()) {
            return redirect()->back()->with('error', 'Score not saved, try again');
        }

        // $chartConfig = [
        //     'chart' => ['type' => 'bar'],
        //     'title' => ['text' => 'SCORE BY SECTION'],
        //     'xAxis' => ['categories' => $templatenames],
        //     'yAxis' => [
        //         'min' => 0,
        //         'max' => 100,
        //         'title' => ['text' => 'Percentage'],
        //     ],
        //     'series' => [
        //         ['data' => $roundPercen]
        //     ],
        // ];

        // // Encode the configuration to send it to the Export Server
        // $encodedConfig = json_encode($chartConfig);

        // // Highcharts Export Server URL
        // $exportServerUrl = 'https://export.highcharts.com/';

        // // Send request to the Export Server and get the image URL
        // $imageUrl = $exportServerUrl . '?options=' . urlencode($encodedConfig);




        if ($client) {

            if ($audit->auditing_for == 0) {
                return view('view-audit-report', [
                    'templatecoll' => $templatecoll,
                    'audit' => $audit,
                    'client' => $client,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'end_date' => $end_date,
                    'todayDate' => $todayDate,
                    'todayTime' => $todayTime,
                    'auditor' => $auditor,
                    'sectionCount' => $sectionCount,
                    'total_qu_count' => $total_qu_count,
                    'actual_responses' => array_sum($actual_responses),
                    'target_responses' => array_sum($target_responses),
                    'auth_user' => $auth_user,
                    'templatenames' => $templatenames,
                    'roundPercen' => $roundPercen,
                    'color_code' => $color_code->color,
                    'type' => $type->type,
                    'sdgs' => $sdgsArrJSON,
                ]);
            }




            if ($audit->auditing_for == 1) {
               return view('industrial', [
                    'templatecoll' => $templatecoll,
                    'audit' => $audit,
                    'client' => $client,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'end_date' => $end_date,
                    'todayDate' => $todayDate,
                    'todayTime' => $todayTime,
                    'auditor' => $auditor,
                    'sectionCount' => $sectionCount,
                    'total_qu_count' => $total_qu_count,
                    'actual_responses' => array_sum($actual_responses),
                    'target_responses' => array_sum($target_responses),
                    'auth_user' => $auth_user,
                    'templatenames' => $templatenames,
                    'roundPercen' => $roundPercen,
                    'color_code_ind' => $color_code_ind->color,
                    'type' => $type->type,
                    'sdgs' => $sdgsArrJSON,
                ]);

                // $folderPath = public_path('storage/completed_reports');

                // $fileName = 'audit-report-' . $audit->id . '-' . now()->format('Y-m-d_H-i-s') . '.pdf';

                // $pdfPath = $folderPath . '/' . $fileName;
                // $pdf->save($pdfPath);

                // return redirect()->back()->with('success', 'PDF saved successfully.');
            }
            // return redirect()->back()->with('error', 'Failed to save pdf');
        }

        return redirect()->back()->with('error', 'Client not found');
    }

    public function saveReportToDb(Request $request)
    {
        // Get the currently authenticated user's ID
        // $userid = Auth::guard('webclient')->user()->id;

        // Validate the request
        $request->validate([
            'report_pdf' => 'required|file|mimes:pdf|max:2048', // Ensures it's a valid file type
            'audit_id' => 'required',
        ]);

        // Get the uploaded file
        $pdf = $request->file('report_pdf');
        $audit_id = $request->input('audit_id');

        // Check if the file is valid
        if ($pdf->isValid()) {
            // Define the folder path for saving the file
            $folderPath = 'storage/completed_reports';

            $fileName = 'audit-report-' . $audit_id . '-' . now()->format('Y-m-d_H-i-s') . '.pdf';

            // Move the file to the folder
            $pdf->move($folderPath, $fileName);

            $pdfPath = $folderPath . '/' . $fileName;
            $audit = Audit::where('id', $audit_id)->first();
            if ($audit) {
                $audit->report_path = $pdfPath;
                $audit->save();
            }
            return response()->json(['message' => 'File uploaded successfully'], 200);
        } else {
            return response()->json(['message' => 'File upload failed'], 500);
        }

    }

    public function auditRepSave(Request $request)
    {
        $request->validate([
            'auditId' => 'required',
            'auth_id' => 'required',
            'auditIndex' => 'required',

            'cid' => 'required',
            'report' => 'required|mimes:pdf', // Max file size is 2MB
        ]);
        // dd($request->all());


        // Validate the uploaded file
        // dd($request->all());

        // Generate a dynamic filename based on the audit index
        $filename = 'audit_' . $request->auditIndex . '.pdf';

        // Store the uploaded file
        $pdfPath = $request->file('report')->storeAs('completed_reports', $filename, 'public'); // 'local' is the disk name

        $fileInDb = new CompletedReport;
        $fileInDb->audit_id = $request->auditId;
        $fileInDb->audit_index = $request->auditIndex;
        $fileInDb->report = $filename;
        $fileInDb->path = $pdfPath;
        if ($fileInDb->save()) {
            return redirect()->back()->with('success', 'PDF file uploaded successfully.');
        }


        // Optionally, you can return a response or redirect the user
        return redirect()->back()->with('error', 'PDF file uploaded failed. Try again');
    }

    public function viewCompletedReport(Request $request)
    {
        $pdf = CompletedReport::where(['audit_id' => $request->auditId])->first();

        if ($pdf) {

            $pdfFile = env("SITE_URL") . "/storage/completed_reports/" . $pdf->report;

            return redirect($pdfFile);
        }
        return redirect()->back()->with('error', 'Pdf not available');
    }



    // put final score in db table 
    public function auditFinalScore(Request $request)
    {
        $request->validate([
            'auditId' => 'required',
            'auth_id' => 'required',
            'cid' => 'required',
        ]);

        $audit = Audit::where(['id' => $request->auditId])->first();
        // Templates json data from above audit record
        $check_array = json_decode($audit->checklists); // converted to array                             
        $actual_responses = [];
        $target_responses = [];

        foreach ($check_array as $ca) {
            $template = Template::where(['id' => $ca])->first(['id', 'template_name', 'temp_folder_id']); // Fetch template_id and template_name
            $temp_folder = TempFolder::where(['id' => $template->temp_folder_id])->first('title'); // Fetch template_id and template_name
            $questions = TemplateDetail::where('template_id', $ca)->get(); // Fetch questions using template_id
            $responses = ObjectiveResponse::where(['group_id' => $questions[0]->response_group])->get(); // responses belonged to this group
            // initializing base score
            $base_score = '';
            foreach ($responses as $r) {
                if ($r->is_base == 1) {
                    $base_score = $r->score;
                }
            }
            //  -----------Actual score----------------------
            $actual_score_array = [];
            foreach ($questions as $q) {
                $qResponse = AuditDetail::where(['audit_id' => $request->auditId, 'question_id' => $q->id])->first();
                $actual_score_array[] = $qResponse->response_score;
            }
            $actual__score = array_sum($actual_score_array);
            // --------------Got the actual score ------------------
            $actual_responses[] = $actual__score;
            // ---------  Target score ------------------
            $target_score_array = [];
            foreach ($questions as $q) {
                $qResponse = AuditDetail::where(['audit_id' => $request->auditId, 'question_id' => $q->id])->first();
                if ($qResponse->response_score == 'null' || $qResponse->response_score == 0) {
                    $target_score_array[] = $base_score;
                } else {
                    $target_score_array[] = $qResponse->response_score;
                }
            }
            $target__score = array_sum($target_score_array);
            // -------- Got the Target score -------------
            $target_responses[] = $target__score;


            // calculating percentage 
            $percentagetochart = ($actual__score / $target__score) * 100;
            $roundPercen[] = round($percentagetochart, 2);

            $check_dept = DepartmentScore::where(['audit_id' => $audit->id, 'template_id' => $template->id])->first();

            if ($check_dept == null) {
                $dept_score = new DepartmentScore;
                $dept_score->audit_id = $audit->id;
                $dept_score->template_id = $template->id;
                $dept_score->score = round($percentagetochart, 2);
                $dept_score->save();
            }
        }

        $audit->final_score = (array_sum($actual_responses) / array_sum($target_responses)) * 100;
        if ($audit->save()) {
            return redirect()->back()->with('success', 'Final Score saved');
        }
        // return $pdf->download('itsolutionstuff.pdf');
        return redirect()->back()->with('error', 'Score not saved, try again');
    }




    public function signaturesUpload(Request $request)
    {

        $request->validate([

            'auditorsign' => 'required',

            'auditeesign' => 'required',

            'audit_id' => 'required',



        ]);





        $audit = Audit::where(['id' => $request->audit_id])->first();

        if ($request->auditorsign == null || $request->auditeesign == null || $request->auditorsign == '' || $request->auditeesign == '') {

            return redirect()->back()->with('error', 'Please upload signatures');
        }



        if ($request->file('auditorsign') !== null) {

            $uploadedFileName = $request->file('auditorsign')->getClientOriginalName();

            $image_name = date('YmdHis') . $uploadedFileName;

            $request->file('auditorsign')->storeAs('public/signatures/', $image_name);



            $request['auditor_sign'] = $image_name;
        }



        if ($request->file('auditeesign') !== null) {

            $uploadedFileName2 = $request->file('auditeesign')->getClientOriginalName();

            $image_name2 = date('YmdHis') . $uploadedFileName2;

            $request->file('auditeesign')->storeAs('public/signatures/', $image_name2);



            $request['auditee_sign'] = $image_name2;
        }

        // dd($request->all());



        $result = $audit->update($request->all());

        if ($result) {



            return redirect()->back()->with('success', 'Signatures Uploaded Successfully');
        } else {

            return redirect()->back()->with('error', 'Please try again');
        }
    }







    public function sendEmail(Request $request)
    {
        $request->validate([
            'auditId' => 'required',
            'auth_id' => 'required',
            'cid' => 'required',
        ]);

        $appurl = getenv('SITE_URL');
        $viewUrl = $appurl . "/audit-report-view?auditId=" . $request->auditId . "&cid=" . $request->cid . "&auth_id=" . $request->auth_id . "";
        $client = Client::where(['id' => $request->cid])->first();
        $audit = Audit::where(['id' => $request->auditId])->first();
        if ($audit) {
            $audit->status = 2;
            $audit->save();
        }

        // Sending data to  mail 
        $data = array(
            'ctitle' => $client->title,
            'cfname' => $client->fname,
            'clname' => $client->lname,
            'url' => $viewUrl,
            'cemail' => $client->company_emailid,
        );

        // dd($request->company_emailid);
        Mail::send('mail-report', $data, function ($message) use ($data) {
            $message->to($data['cemail'], 'Certigo QAS')->subject('Download your audit report');
            $message->from('sanurag0022@gmail.com', 'Certigo QAS');
        });

        // return redirect()->back()->with('success','Report send successfuly');
        return view('audit.email-confirmation')->with('success', 'Email sent successfully');
    }





    public function consolidated($id)
    {

        $client = Client::where(['id' => $id])->first();
        // Quarter array 
        $Q1 = [1, 2, 3];
        $Q2 = [4, 5, 6];
        $Q3 = [7, 8, 9];
        $Q4 = [10, 11, 12];

        $current_month = Carbon::now()->month;
        // -------------------- original code ------------
        // Quarter for which consolidated report to generate
        $qFound = '';
        foreach ([$Q1, $Q2, $Q3, $Q4] as $qArray) {
            if (in_array($current_month, $qArray)) {
                $qFound = $qArray;
            }
        }
        // -------------original code---------------------
        // $qFound = [10,11,12]; 

        // -------------------- original code ------------
        $last_month_of_quarter = end($qFound);
        // if($current_month == $last_month_of_quarter){




        $audits = [];
        $allAuditsAvg = [];
        $createdArrays = [];
        $templatesName = [];
        $negAnsArr = [];
        foreach ($qFound as $index => $q) {
            // Audits found in this  month and YEAR
            $myaudits = Audit::where(['month' => $q, 'client_id' => $id, 'auditing_for' => 0])->get();


            // dd($myaudits);         
            $score = [];

            if ($myaudits) {
                foreach ($myaudits as $audit) {
                    $audits[] = $audit->id;
                    $score[] = $audit->final_score;

                    // getting Checklists and its score
                    $template_array = json_decode($audit->checklists);
                    // Creating empty array of each template 
                    if (empty($createdArrays)) {
                        foreach ($template_array as $single) {
                            $arrayName = $single;
                            $createdArrays[$arrayName] = [];
                        }
                    }

                    foreach ($template_array as $index => $single) {
                        $template = Template::where(['id' => $single])->first();
                        $templatesName[$single] = $template->template_name;

                        $deptResult = DepartmentScore::where(['audit_id' => $audit->id, 'template_id' => $single])->first();
                        if (array_key_exists($single, $createdArrays)) {
                            $createdArrays[$single][] = $deptResult->score;
                        } else {
                            $createdArrays[$single] = [$deptResult->score];
                        }
                    }
                    // fro getting negative answers
                    // $negativeAnswers = [];
                    // $audit_details = AuditDetail::where('audit_id', $audit->id)->where('response_score', '<', 0)->get();
            
                    // foreach ($audit_details as $detail) {
                    //     // Store the negative answers with their details (could also store `question_id`, etc.)
                    //     $negativeAnswers[] = [
                    //         'question_id' => $detail->question_id,
                    //         'response_score' => $detail->response_score,
                    //         'created_at' => $detail->created_at,
                    //     ];
                    // }
            
                    // // If you want to store negative answers inside a separate array
                    // $createdArrays['negative_answers'][$audit->id] = $negativeAnswers;
                }
            }

            if (count($score) > 0) {
                $average = (array_sum($score) / count($score));
            } else {
                $average = 0;
            }
            $allAuditsAvg[$q] = $average;
        }


        $myaudits_latest = Audit::whereIn('month', $qFound)->where(['client_id' => $id, 'auditing_for' => 0])->latest()->first();
        if ($myaudits_latest) {
            $nwgAns = AuditDetail::where(['audit_id' => $myaudits_latest->id, 'response_score' => 0])->get();
            $negAnsArr[] = $nwgAns;
        }

        // $dates = [];        
        // foreach ($negAnsArr as $innerArray) {
        //     foreach ($innerArray as $element) {    
        //         $ques = [];                              
        //         foreach ($audits as $audit) {   
        //             // audit:66, ques. no. 100                    
        //             $nwgAns = AuditDetail::where(['audit_id'=>$audit,'question_id'=>$element->question_id])->first();
        //             $ques['q_no'] = $nwgAns->question_id;
        //             $ques['q_date'] = $nwgAns->created_at;
        //             $dates[] = $ques;                    
        //         }                
        //     }
        // }
        // dd($dates);
        // all audits IDs as string 
        $commaSeparatedAudits = implode(',', $audits);
        // dd($commaSeparatedAudits);
        // dd($createdArrays);     
        /*array:2 [
            4 => array:2 [
            0 => 40
            1 => 80
            ]
            5 => array:2 [
            0 => 0
            1 => 100
            ]
        ] */

        // ---------------- Negative Answers in table working ------------
        foreach ($negAnsArr as $one) {
            foreach ($one as $onee) {
                $itsTemp = Template::where(['id' => $onee->template_id])->first('template_name');
                $onee->temname = $itsTemp->template_name;

                $audit = Audit::where(['id' => $onee->audit_id])->first();
                $onee->start = $audit->start;

                $qNC = TemplateDetail::where(['id' => $onee->question_id])->first();
                $onee->nc = $qNC->nc;

                $dates = [];
                $addedQuestions = [];
                foreach ($audits as $audit) {
                    $ques = [];
                    // audit:66, ques. no. 100                    
                    $nwgAns = AuditDetail::where(['audit_id' => $audit, 'question_id' => $onee->question_id])->first();
                    if ($nwgAns) {
                        // Check if this question has already been added
                        if (!in_array($nwgAns->question_id, $addedQuestions)) {
                            $tempQues = TemplateDetail::where(['id' => $nwgAns->question_id])->first();
                            $ques['q_no'] = $nwgAns->question_id;
                            $ques['q_name'] = $tempQues->question;
                            $ques['response_date'] = $nwgAns->created_at;
        
                            $dates[] = $ques;
                            $addedQuestions[] = $nwgAns->question_id;  // Mark this question as added
                        }
                    }
                }
                $onee->datess = $dates;
            }
        }
        // ---------------- Negative Answers in table working ------------

        $avgOFTemplate = [];
        foreach ($createdArrays as $key => $single) {
            $avg = array_sum($single) / count($single);
            $avgOFTemplate[$key] = $avg;
        }
        // dd($avgOFTemplate);         
        /*array:2 [
            4 => 60
            5 => 50
        ] */
        $avgValuesArray = array_values($avgOFTemplate);

        $uniqueTemplateArray = array_unique($templatesName);
        $nameValuesArray = array_values($uniqueTemplateArray);

        // save data in table
        $quartersWithFound = '';
        foreach ($qFound as $element) {
            if (in_array($element, $Q1)) {
                $quartersWithFound = 1;
            } elseif (in_array($element, $Q2)) {
                $quartersWithFound = 2;
            } elseif (in_array($element, $Q3)) {
                $quartersWithFound = 3;
            } elseif (in_array($element, $Q4)) {
                $quartersWithFound = 4;
            }
        }

        $checkConsolidated = ConsolidatedReport::where(['client_id' => $id, 'quarter' => $quartersWithFound])->exists();
        if (!$checkConsolidated) {
            $console = new ConsolidatedReport;
            $console->title = "Consolidated Report for quarter - " . $quartersWithFound;
            $console->client_id = $id;
            $console->audit_ids = $commaSeparatedAudits;
            $console->quarter = $quartersWithFound;
            $console->save();
        }

        // data to chart one 
        $result = [];
        foreach ($allAuditsAvg as $key => $value) {
            $carbonDate = Carbon::create(null, $key, 1);
            $monthName = $carbonDate->format('M');
            $data = [];
            $data[] = $monthName;
            $data[] = $value;
            $result[] = $data;
        }
        $formattedData = json_encode($result);

        // generate pdf and download 
        $data = [
            'client' => $client,
            'formattedData' => $formattedData,
            'nameValuesArray' => $nameValuesArray,
            'avgValuesArray' => $avgValuesArray,
            'negAnsArr' => $negAnsArr
        ];
        //  $pdf = PDF::loadView('consolidate-pdf',$data);
        //  $pdf->save(storage_path('app/public/pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));
        // generate pdf and download 

        // dd($negAnsArr);




        return view('consolidated', ['client' => $client, 'formattedData' => $formattedData, 'nameValuesArray' => $nameValuesArray, 'avgValuesArray' => $avgValuesArray, 'negAnsArr' => $negAnsArr]);
        // }
        // else{
        //     return redirect()->back()->with('error','This is not last month of this quarter');
        // }
        // -------------------- original code ------------
    }

    public function consolidated_quarter($id, $quarter)
    {

        $client = Client::where(['id' => $id])->first();
        // Quarter array 
        $Q1 = [1, 2, 3];
        $Q2 = [4, 5, 6];
        $Q3 = [7, 8, 9];
        $Q4 = [10, 11, 12];

        if ($quarter == 1) {
            $qFound = [1, 2, 3];
        } elseif ($quarter == 2) {
            $qFound = [4, 5, 6];
        } elseif ($quarter == 3) {
            $qFound = [7, 8, 9];
        } elseif ($quarter == 4) {
            $qFound = ['10', '11', '12'];
        }




        $audits = [];
        $allAuditsAvg = [];
        $createdArrays = [];
        $templatesName = [];
        $negAnsArr = [];
        foreach ($qFound as $index => $q) {
            // Audits found in this  month and YEAR
            $myaudits = Audit::where(['month' => $q, 'client_id' => $id, 'auditing_for' => 0])->get();




            $score = [];
            if (!$myaudits->isEmpty()) {

                foreach ($myaudits as $audit) {
                    $audits[] = $audit->id;
                    $score[] = $audit->final_score;

                    // getting Checklists and its score
                    $template_array = json_decode($audit->checklists);
                    // Creating empty array of each template 
                    if (empty($createdArrays)) {
                        foreach ($template_array as $single) {
                            $arrayName = $single;
                            $createdArrays[$arrayName] = [];
                        }
                    }
                    // dd($createdArrays);

                    foreach ($template_array as $index => $single) {
                        $template = Template::where(['id' => $single])->first();
                        $templatesName[$single] = $template->template_name;

                        $deptResult = DepartmentScore::where(['audit_id' => $audit->id, 'template_id' => $single])->first();
                        if (array_key_exists($single, $createdArrays)) {
                            $createdArrays[$single][] = $deptResult->score;
                        } else {
                            $createdArrays[$single] = [$deptResult->score];
                        }
                    }

                    // fro getting negative answers


                }
            }
            if (count($score) > 0) {
                $average = (array_sum($score) / count($score));
            } else {
                $average = 0;
            }
            $allAuditsAvg[$q] = $average;
        }

        // for getting final negative answers from last audit  
        $myaudits_latest = Audit::where(['month' => end($qFound), 'client_id' => $id, 'auditing_for' => 0])->latest()->first();
        if ($myaudits_latest) {
            $nwgAns = AuditDetail::where(['audit_id' => $myaudits_latest->id, 'response_score' => 0])->get();

            $negAnsArr[] = $nwgAns;
        }


        // all audits IDs as string 
        $commaSeparatedAudits = implode(',', $audits);
        // dd($commaSeparatedAudits);
        // dd($createdArrays);     
        /*array:2 [
            4 => array:2 [
            0 => 40
            1 => 80
            ]
            5 => array:2 [
            0 => 0
            1 => 100
            ]
        ] */

        // ---------------- Negative Answers in table working ------------
        foreach ($negAnsArr as $one) {
            foreach ($one as $onee) {
                $itsTemp = Template::where(['id' => $onee->template_id])->first('template_name');
                $onee->temname = $itsTemp->template_name;

                $audit = Audit::where(['id' => $onee->audit_id])->first();
                $onee->start = $audit->start;

                $qNC = TemplateDetail::where(['id' => $onee->question_id])->first();
                $onee->nc = $qNC->nc;

                $dates = [];
                foreach ($audits as $audit) {
                    $ques = [];
                    // audit:66, ques. no. 100                    
                    $nwgAns = AuditDetail::where(['audit_id' => $audit, 'question_id' => $onee->question_id])->first();
                    // $ques['q_no'] = $nwgAns->question_id;
                    if ($nwgAns) {

                        $ques[] = $nwgAns->created_at;
                        $dates[] = $ques;
                    }
                }
                $onee->datess = $dates;
            }
        }
        // dd($negAnsArr);

        // ---------------- Negative Answers in table working ------------



        $avgOFTemplate = [];
        foreach ($createdArrays as $key => $single) {
            $avg = array_sum($single) / count($single);
            $avgOFTemplate[$key] = $avg;
        }
        // dd($avgOFTemplate);         
        /*array:2 [
            4 => 60
            5 => 50
        ] */
        $avgValuesArray = array_values($avgOFTemplate);


        $uniqueTemplateArray = array_unique($templatesName);
        $nameValuesArray = array_values($uniqueTemplateArray);
        // dd($uniqueTemplateArray);



        // save data in table
        $quartersWithFound = '';

        foreach ($qFound as $element) {
            if (in_array($element, $Q1)) {
                $quartersWithFound = 1;
            } elseif (in_array($element, $Q2)) {
                $quartersWithFound = 2;
            } elseif (in_array($element, $Q3)) {
                $quartersWithFound = 3;
            } elseif (in_array($element, $Q4)) {
                $quartersWithFound = 4;
            }
        }

        $checkConsolidated = ConsolidatedReport::where(['client_id' => $id, 'quarter' => $quartersWithFound])->exists();
        if (!$checkConsolidated) {
            $console = new ConsolidatedReport;
            $console->title = "Consolidated Report for quarter - " . $quartersWithFound;
            $console->client_id = $id;
            $console->audit_ids = $commaSeparatedAudits;
            $console->quarter = $quartersWithFound;
            $console->save();
        }

        // data to chart one 
        $result = [];
        foreach ($allAuditsAvg as $key => $value) {
            $carbonDate = Carbon::create(null, $key, 1);
            $monthName = $carbonDate->format('M');
            $data = [];
            $data[] = $monthName;
            $data[] = $value;
            $result[] = $data;
        }

        $formattedData = json_encode($result);

        // generate pdf and download 
        $appurl = getenv('CONSOLIDATE_REPORT_URL');

        $viewUrl = $appurl . "quarter-consolidated/" . $client->id . "/" . $quarter;
        $dataToGraph = [
            'client' => $client,
            'formattedData' => $formattedData,
            'nameValuesArray' => $nameValuesArray,
            'avgValuesArray' => $avgValuesArray,
            'negAnsArr' => $negAnsArr,
            'url' => $viewUrl
        ];


        //  $pdf = PDF::loadView('consolidate-pdf',$dataToGraph);
        //  return $pdf->stream('consolidated.pdf',$dataToGraph);
        //  $pdf->save(public_path('pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));
        //================= generate pdf and download ============


        // =================mail code======================
        Mail::send('consolidate-mail', $dataToGraph, function ($message) use ($client, $quartersWithFound) {

            $message->to('smsunnythefunny@gmail.com', 'Consolidated report')->subject('Consolidated report from Certigo QAS');

            // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');

            // $message->attach(public_path('/pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));

            $message->from('xyz@gmail.com', 'Certigo QAS');
        });

        return view('consolidated', ['client' => $client, 'formattedData' => $formattedData, 'nameValuesArray' => $nameValuesArray, 'avgValuesArray' => $avgValuesArray, 'negAnsArr' => $negAnsArr]);
        // return redirect()->back()->with('success','Report sent');
        // }else{
        //     return redirect()->back()->with('error','This is not last month of this quarter');
        // }
        // -------------------- original code ------------
    }

    public function consolidated_quarter_link($id, $quarter)
    {

        $quarterr = $quarter;
        $appurl = getenv('CONSOLIDATE_REPORT_URL');

        $viewUrl = $appurl . "quarter-consolidated/" . $id . "/" . $quarter;

        $data = [

            'url' => $viewUrl
        ];
        // =================mail code======================
        Mail::send('consolidate-mail', $data, function ($message) {

            $message->to('smsunnythefunny@gmail.com', 'Consolidated report')->subject('Consolidated report from Certigo QAS');

            // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');

            // $message->attach(public_path('/pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));

            $message->from('xyz@gmail.com', 'Certigo QAS');
        });
        return redirect()->back()->with('success', 'Email sent successfully');
    }


    public function sendconsolidated($id)
    {

        $client = Client::where(['id' => $id])->first();
        // Quarter array 
        $Q1 = [1, 2, 3];
        $Q2 = [4, 5, 6];
        $Q3 = [7, 8, 9];
        $Q4 = [10, 11, 12];

        $current_month = Carbon::now()->month;
        // Quarter for which consolidated report to generate
        // -------------------- original code ------------
        // $qFound = '';        
        // foreach( [$Q1,$Q2,$Q3,$Q4] as $qArray){
        //     if(in_array($current_month , $qArray)){                
        //         $qFound = $qArray;
        //     }
        // }
        // -------------original code---------------------
        $qFound = [0 => 7, 1 => 8, 2 => 9];           //  testing for september(9)
        // dd($qFound);      //array:3 [   0 => 7,  1 => 8,   2 => 9   ]

        // -------------------- original code ------------
        $last_month_of_quarter = end($qFound);
        // if($current_month == $last_month_of_quarter){
        //     dd("this is last month of quarter");



        $audits = [];
        $allAuditsAvg = [];
        $createdArrays = [];
        $templatesName = [];
        $negAnsArr = [];
        foreach ($qFound as $index => $q) {
            // Audits found in this  month and YEAR
            $myaudits = Audit::where(['month' => $q, 'client_id' => $id, 'auditing_for' => 0])->get();


            // dd($myaudits);         
            $score = [];

            if ($myaudits) {
                foreach ($myaudits as $audit) {
                    $audits[] = $audit->id;
                    $score[] = $audit->final_score;

                    // getting Checklists and its score
                    $template_array = json_decode($audit->checklists);
                    // Creating empty array of each template 
                    if (empty($createdArrays)) {
                        foreach ($template_array as $single) {
                            $arrayName = $single;
                            $createdArrays[$arrayName] = [];
                        }
                    }
                    // dd($createdArrays);

                    foreach ($template_array as $index => $single) {
                        $template = Template::where(['id' => $single])->first();
                        $templatesName[$single] = $template->template_name;

                        $deptResult = DepartmentScore::where(['audit_id' => $audit->id, 'template_id' => $single])->first();
                        if (array_key_exists($single, $createdArrays)) {
                            $createdArrays[$single][] = $deptResult->score;
                        } else {
                            $createdArrays[$single] = [$deptResult->score];
                        }
                    }

                    // fro getting negative answers


                }
            }

            if (count($score) > 0) {
                $average = (array_sum($score) / count($score));
            } else {
                $average = 0;
            }
            $allAuditsAvg[$q] = $average;
        }




        // NEW CODE FOR ANSWERS WITH DATE 
        // $aud_date_arr = [];
        // foreach ($qFound as $index => $q) {
        //     $months = [];
        //     // All audits in particular month 
        //     $allAuditsInMonth = Audit::where(['month' => $q, 'client_id' => $id, 'auditing_for' => 0])->get();    
        //     // working on each audit 
        //     foreach ($allAuditsInMonth as $a) {
        //         $unique_audit_details = [];
        //         // Questions in this audit having response_score = 0 
        //         $audit_details = AuditDetail::where(['audit_id' => $a->id, 'response_score' => 0])->get();
        //         // on each question 
        //         foreach ($audit_details as $auditDetail) {
        //             $a_dates = [];
        //             $a_dates[] = $auditDetail->created_at;
        //             $unique_audit_details[] = [
        //                 'detail' => $auditDetail,
        //                 'question_id' => $auditDetail->question_id,
        //                 'allDates' => $a_dates,
        //             ];
        //         }
        //         $a->audit_details = $unique_audit_details;
        //     }
        //     $months['month'] = $q;
        //     $months['audit'] = $allAuditsInMonth;
        //     $aud_date_arr[] = $months;
        // }


        // dd($aud_date_arr);


        // for getting final negative answers from last audit  
        $myaudits_latest = Audit::where(['month' => end($qFound), 'client_id' => $id, 'auditing_for' => 0])->latest()->first();
        if ($myaudits_latest) {
            $nwgAns = AuditDetail::where(['audit_id' => $myaudits_latest->id, 'response_score' => 0])->get();

            $negAnsArr[] = $nwgAns;
        }



        // $dates = [];        
        // foreach ($negAnsArr as $innerArray) {
        //     foreach ($innerArray as $element) {    
        //         $ques = [];                              
        //         foreach ($audits as $audit) {   
        //             // audit:66, ques. no. 100                    
        //             $nwgAns = AuditDetail::where(['audit_id'=>$audit,'question_id'=>$element->question_id])->first();
        //             $ques['q_no'] = $nwgAns->question_id;
        //             $ques['q_date'] = $nwgAns->created_at;
        //             $dates[] = $ques;                    
        //         }                
        //     }
        // }
        // dd($dates);
        // all audits IDs as string 
        $commaSeparatedAudits = implode(',', $audits);
        // dd($commaSeparatedAudits);
        // dd($createdArrays);     
        /*array:2 [
            4 => array:2 [
            0 => 40
            1 => 80
            ]
            5 => array:2 [
            0 => 0
            1 => 100
            ]
        ] */

        // ---------------- Negative Answers in table working ------------
        foreach ($negAnsArr as $one) {
            foreach ($one as $onee) {
                $itsTemp = Template::where(['id' => $onee->template_id])->first('template_name');
                $onee->temname = $itsTemp->template_name;

                $audit = Audit::where(['id' => $onee->audit_id])->first();
                $onee->start = $audit->start;

                $qNC = TemplateDetail::where(['id' => $onee->question_id])->first();
                $onee->nc = $qNC->nc;

                $dates = [];
                foreach ($audits as $audit) {
                    $ques = [];
                    // audit:66, ques. no. 100                    
                    $nwgAns = AuditDetail::where(['audit_id' => $audit, 'question_id' => $onee->question_id])->first();
                    // $ques['q_no'] = $nwgAns->question_id;
                    if ($nwgAns) {

                        $ques[] = $nwgAns->created_at;
                        $dates[] = $ques;
                    }
                }
                $onee->datess = $dates;
            }
        }
        // dd($negAnsArr);

        // ---------------- Negative Answers in table working ------------



        $avgOFTemplate = [];
        foreach ($createdArrays as $key => $single) {
            $avg = array_sum($single) / count($single);
            $avgOFTemplate[$key] = $avg;
        }
        // dd($avgOFTemplate);         
        /*array:2 [
            4 => 60
            5 => 50
        ] */
        $avgValuesArray = array_values($avgOFTemplate);


        $uniqueTemplateArray = array_unique($templatesName);
        $nameValuesArray = array_values($uniqueTemplateArray);
        // dd($uniqueTemplateArray);



        // save data in table
        $quartersWithFound = '';

        foreach ($qFound as $element) {
            if (in_array($element, $Q1)) {
                $quartersWithFound = 1;
            } elseif (in_array($element, $Q2)) {
                $quartersWithFound = 2;
            } elseif (in_array($element, $Q3)) {
                $quartersWithFound = 3;
            } elseif (in_array($element, $Q4)) {
                $quartersWithFound = 4;
            }
        }

        $checkConsolidated = ConsolidatedReport::where(['client_id' => $id, 'quarter' => $quartersWithFound])->exists();
        if (!$checkConsolidated) {
            $console = new ConsolidatedReport;
            $console->title = "Consolidated Report for quarter - " . $quartersWithFound;
            $console->client_id = $id;
            $console->audit_ids = $commaSeparatedAudits;
            $console->quarter = $quartersWithFound;
            $console->save();
        }




        // data to chart one 
        $result = [];
        foreach ($allAuditsAvg as $key => $value) {
            $carbonDate = Carbon::create(null, $key, 1);
            $monthName = $carbonDate->format('M');
            $data = [];
            $data[] = $monthName;
            $data[] = $value;
            $result[] = $data;
        }
        $formattedData = json_encode($result);

        // ============generate pdf and download ==============
        $appurl = getenv('CONSOLIDATE_REPORT_URL');

        $viewUrl = $appurl . "consolidated/" . $client->id;
        $dataToGraph = [
            'client' => $client,
            'formattedData' => $formattedData,
            'nameValuesArray' => $nameValuesArray,
            'avgValuesArray' => $avgValuesArray,
            'negAnsArr' => $negAnsArr,
            'url' => $viewUrl
        ];


        //  $pdf = PDF::loadView('consolidate-pdf',$dataToGraph);
        //  return $pdf->stream('consolidated.pdf',$dataToGraph);
        //  $pdf->save(public_path('pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));
        //================= generate pdf and download ============


        // =================mail code======================
        Mail::send('consolidate-mail', $dataToGraph, function ($message) use ($client, $quartersWithFound) {

            $message->to('smsunnythefunny@gmail.com', 'Consolidated report')->subject('Laravel Testing Mail with Attachment');

            // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');

            // $message->attach(public_path('/pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));

            $message->from('xyz@gmail.com', 'Certigo QAS');
        });
        // =================mail code======================
        // return redirect()->back()->with('success','Consolidated Report sent to client');
        // return view('consolidated',['client'=> $client,'formattedData'=>$formattedData,'nameValuesArray'=>$nameValuesArray,'avgValuesArray'=>$avgValuesArray,'negAnsArr'=>$negAnsArr]);

        return redirect()->back()->with('success', 'Email sent successfully');


        // }else{
        //     return redirect()->back()->with('error','This is not last month of this quarter');
        // }
        // -------------------- original code ------------
    }




    public function getServiceCode()
    {

        $serviceCodes = ServiceCode::all();

        return view('services.service', ['codes' => $serviceCodes]);

    }

    // edit service code

    public function updateServiceCode(Request $request)
    {

        $request->validate([

            'service_code' => 'required',

            'id' => 'required'

        ]);

        $service = ServiceCode::find($request->id);

        $service->service_code = $request->service_code;

        if ($service->save()) {

            return redirect()->back()->with('success', 'Service Code updated successfully');

        } else {

            return redirect()->back()->with('error', 'Service Code not updated');

        }

    }

    // delete service code

    public function deleteServiceCode($id)
    {
        // Find the service by ID
        $service = ServiceCode::find($id);

        // Check if the service exists
        if (!$service) {
            return redirect()->back()->with('error', 'Service Code not found');
        }

        // Attempt to delete the service
        if ($service->delete()) {
            return redirect()->back()->with('success', 'Service Code deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Service Code not deleted');
        }
    }




    public function saveServiceCode(Request $request)
    {

        $request->validate([

            'service_code' => 'required'

        ]);



        $service = new ServiceCode;

        $service->service_code = $request->service_code;

        // $service->save();

        $servCode = ServiceCode::all();



        if ($service->save()) {

            return redirect()->back()->with('success', 'Service Code saved')->withInput(['servCode' => $servCode]);
        } else {

            return redirect()->back()->with('error', 'Service Code not saved')->withInput(['servCode' => $servCode]);
        }
    }





    public function signView(Request $request)
    {

        return view('audit.signature-pad', ['audit_id' => $request->audit_id, 'client_id' => $request->client_id]);
    }





    public function sign_View(Request $request)
    {

        return view('audit.sign-pad', ['audit_id' => $request->audit_id, 'client_id' => $request->client_id]);
    }

    public function store(Request $request)
    {

        $folderPath = public_path('images/');

        $image = explode(";base64,", $request->signed);

        $image_type = explode("image/", $image[0]);

        $image_type_png = $image_type[1];

        $image_base64 = base64_decode($image[1]);

        $file = uniqid() . '.' . $image_type_png;

        file_put_contents($file, $image_base64);



        $audit = Audit::where(['id' => $request->audit_id])->first();

        if ($audit) {

            $audit->auditor_sign = $file;

            $audit->save();

            return back()->with('success', 'Signature saved successfully !!');
        }

        return back()->with('error', 'Re-upload your signature');
    }



    public function store_sign(Request $request)
    {

        $folderPath = public_path('images/');

        $image = explode(";base64,", $request->signed);

        $image_type = explode("image/", $image[0]);

        $image_type_png = $image_type[1];

        $image_base64 = base64_decode($image[1]);

        $file = uniqid() . '.' . $image_type_png;

        file_put_contents($file, $image_base64);



        $audit = Audit::where(['id' => $request->audit_id])->first();

        if ($audit) {

            $audit->auditee_sign = $file;

            $audit->save();

            return back()->with('success', 'Signature saved successfully !!');
        }

        return back()->with('error', 'Re-upload your signature');
    }


    public function viewGeneratedReport($id)
    {
        $audit = AuditDetail::find($id);

        if (!$audit) {
            abort(404, 'Audit not found.');
        }

        return view('audit-report-viewpdf', ['audit' => $audit]);
    }

    // public function viewGeneratedReportIndustrial($id)
    // {
    //     $audit = AuditDetail::find($id);

    //     if (!$audit) {
    //         abort(404, 'Audit not found.');
    //     }

    //     return view('industrial-viewpdf', ['audit' => $audit]);
    // }




    public function store_docref_pesonal(Request $request)
    {

        $request->validate([

            'doc_ref' => 'required',

            'personal_responsible' => 'required',

            'audit_id' => 'required',



        ]);



        $audit = Audit::where(['id' => $request->audit_id])->first();

        if ($audit) {

            $audit->doc_ref = $request->doc_ref;

            $audit->personal_responsible = $request->personal_responsible;

            if ($audit->save()) {

                return back()->with('success', 'Doc. Ref. and Personal Responsible saved successfully');
            }

            return back()->with('error', 'Problem saving Doc. Ref. and Personal Responsible, try again...');
        } else {

            return back()->with('error', 'Audit not found, try again.');
        }
    }
}



// public function auditRepView(Request $request){

//     $request->validate([

//         'auditId'=> 'required',

//         'cid'=> 'required'

//     ]);



//     // Audit record

//     $audit = Audit::where(['id'=>$request->auditId])->first();



//     // Templates json data from above audit record

//     $check_array = json_decode($audit->checklists); // converted to array

//     $sectionCount = count($check_array);            // count the number of templates in audit



//     $total_qu_count = [];                           // (done final), total questions in template

//     $total_positive_responses  = [] ;

//     $templatecoll = [];



//     foreach($check_array as $ca){

//         $template = Template::where(['id' => $ca])->first(['id', 'template_name']); // Fetch template_id and template_name

//         $questions = TemplateDetail::where('template_id', $ca)->get(); // Fetch questions using template_id



//         $total_qu_count[] = count($questions);      //Total questions in a template (done final) , (may be removed)



//         $positive_responses  = [] ;



//         foreach($questions as $q){



//             $qResponse = AuditDetail::where(['audit_id'=>$request->auditId,'question_id'=>$q->id])->first();

//             if($qResponse->response_score == 'null' || $qResponse->response_score == 0 ){

//                 $positive_responses[] = 1;

//             }else{

//                 $positive_responses[] = $qResponse->response_score;

//             }



//             $q->answewrs = $qResponse;                

//             $resp_text = ObjectiveResponse::where(['id'=>$qResponse->response_id])->first();

//             $q->resp_text = $resp_text;



//             if($qResponse->response_score == null){

//                 $q->res = 1;

//             }elseif(is_array($qResponse->response_score)){

//                 $q->res = json_decode($qResponse->response_score);

//             }else{

//                 $q->res = $qResponse;

//             }

//             $q->images = json_decode($qResponse->evidences);



//         }



//         $total_positive_responses[] = array_sum($positive_responses);

//         $templatecoll[] = [

//             'tempId' => $template->id,

//             'tempName' => $template->template_name,

//             'tempQues' => $questions,

//             'positive_responses'=>array_sum($positive_responses)

//         ];

//     }

//     // dd($templatecoll);

//     $auditor = User::where(['id'=>$audit->auditors])->first(['id', 'name']);        

//     $client = Client::where(['id'=>$request->cid])->first();



//     date_default_timezone_set('Asia/Kolkata');

//     $todaydate = Carbon::now();

//     $todayDate = $todaydate->format('d/m/Y');

//     $todayTime = $todaydate->format('H:i A');



//     if ($client) {                

//         return view('view-audit-report', [

//             'templatecoll' => $templatecoll,

//             'audit' => $audit,

//             'client' => $client,

//             'todayDate' => $todayDate,

//             'todayTime' => $todayTime,

//             'auditor' => $auditor,

//             'sectionCount'=>$sectionCount,

//             'total_qu_count'=>$total_qu_count,

//             'total_positive_responses'=>$total_positive_responses

//         ]);

//     }



//     // return $pdf->download('itsolutionstuff.pdf');

//     return redirect()->back()->with('error','Client not found');

// }