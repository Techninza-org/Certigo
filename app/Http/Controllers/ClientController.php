<?php



namespace App\Http\Controllers;



use Mail;

use Carbon\Carbon;

use App\Models\User;

use App\Models\Audit;

use App\Models\Client;

use App\Models\Sample;

use App\Models\Template;

use App\Models\Training;

use App\Models\TempFolder;

use App\Models\AuditDetail;

use App\Models\ServiceCode;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Models\TemplateDetail;

use App\Models\ConsolidatedReport;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Adrianorosa\GeoLocation\GeoLocation;

use Stevebauman\Location\Facades\Location;



class ClientController extends Controller
{



    public function index()
    {

        $id = Auth::user()->id;

        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            return view('index');
        }
        $audits = Audit::where('auditors', $id)->get();
        foreach ($audits as $audit) {
            $audit->client = Client::where('id', $audit->client_id)->first();
            $audit->auditor = User::where('id', $audit->auditors)->first();
        }
        return view('dashboard', data: ['audits' => $audits]);
    }



    public function ajax(Request $request)
    {
        // print_r($request->all());

        if (Auth::user()->role == 1) {



            $draw = $request->get('draw'); // Internal use
            $start = $request->get("start"); // where to start next records for pagination
            $rowPerPage = $request->get("length"); // How many recods needed per page for pagination
            $orderArray = $request->get('order');
            $columnNameArray = $request->get('columns'); // It will give us columns array
            $searchArray = $request->get('search');
            $columnIndex = $orderArray[0]['column'];  // This will let us know, which column index should be sorted   0 = id, 1 = name, 2 = email , 3 = created_at
            $columnName = $columnNameArray[$columnIndex]['data']; // Here we will get column name, Base on the index we get
            $columnSortOrder = $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
            $searchValue = $searchArray['value']; // This is search value 

            $clients = $clients = Client::whereIn('status', [1, 2]);
            $total = $clients->count();

            $totalFilter = $clients = Client::whereIn('status', [1, 2]);
            if (!empty($searchValue)) {
                $totalFilter = $totalFilter->where('fname', 'like', '%' . $searchValue . '%')
                    ->orWhere('client_id', 'like', '%' . $searchValue . '%');
            }
            $totalFilter = $totalFilter->count();
            $arrData = $clients = Client::whereIn('status', [1, 2]);
            $arrData = $arrData->skip($start)->take($rowPerPage);
            $arrData = $arrData->orderBy($columnName, $columnSortOrder);
            if (!empty($searchValue)) {
                $arrData = $arrData->where('fname', 'like', '%' . $searchValue . '%')
                    ->orWhere('client_id', 'like', '%' . $searchValue . '%');
            }
            $arrData = $arrData->get(['id', 'title', 'fname', 'lname', 'organisation_name', 'organisation_location', 'no_audit_conduct', 'no_samples_collect', 'no_trainings_conduct', 'contract_amount', 'client_id', 'status']);
            // $arrData = $arrData->get(['id','title','fname','lname','organisation_name','organisation_location','no_audit_conduct','no_samples_collect','client_id','status']);
            $response = array(
                "draw" => intval($draw),
                "recordsTotal" => $total,
                "recordsFiltered" => $totalFilter,
                "data" => $arrData,
            );

        } else {


            $draw = $request->get('draw'); // Internal use
            $start = $request->get("start"); // where to start next records for pagination
            $rowPerPage = $request->get("length"); // How many recods needed per page for pagination
            $orderArray = $request->get('order');
            $columnNameArray = $request->get('columns'); // It will give us columns array                         
            $searchArray = $request->get('search');
            $columnIndex = $orderArray[0]['column'];  // This will let us know, which column index should be sorted   0 = id, 1 = name, 2 = email , 3 = created_at
            $columnName = $columnNameArray[$columnIndex]['data']; // Here we will get column name, Base on the index we get
            $columnSortOrder = $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
            $searchValue = $searchArray['value']; // This is search value 

            // Retrieve client_ids from audits table where auditors are equal to the current user's ID and group them by client_id
            $clientIds = Audit::where('auditors', Auth::user()->id)
                ->whereNull('deleted_at') // Exclude soft-deleted records
                ->pluck('client_id')
                ->unique()
                ->toArray();
            // dd($clientIds);
            // Retrieve clients records from clients table where client_id matches the client_ids from audits table
            $clients = Client::whereIn('id', $clientIds)
                ->whereIn('status', [1, 2]);
            // Apply status filter
            // $clients->whereIn('status', [1, 2]);

            // $clients = $clients = Client::whereIn('status', [1, 2]);
            $total = $clients->count();

            $totalFilter = $clients = Client::whereIn('status', [1, 2]);
            if (!empty($searchValue)) {
                $totalFilter = $totalFilter->where('fname', 'like', '%' . $searchValue . '%')
                    ->orWhere('client_id', 'like', '%' . $searchValue . '%');
            }
            $totalFilter = $totalFilter->count();

            $arrData = $clients = Client::whereIn('status', [1, 2]);
            $arrData = $arrData->skip($start)->take($rowPerPage);
            $arrData = $arrData->orderBy($columnName, $columnSortOrder);

            if (!empty($searchValue)) {
                $arrData = $arrData->where('fname', 'like', '%' . $searchValue . '%')
                    ->orWhere('client_id', 'like', '%' . $searchValue . '%');
            }

            //     $arrData = $arrData->get(['id','title','fname','lname','organisation_name','organisation_location','no_audit_conduct','no_samples_collect','client_id','status']); 
            $arrData = $arrData->get(['id', 'title', 'fname', 'lname', 'organisation_name', 'organisation_location', 'no_audit_conduct', 'no_samples_collect', 'no_trainings_conduct', 'client_id', 'status']);

            $response = array(
                "draw" => intval($draw),
                "recordsTotal" => $total,
                "recordsFiltered" => $totalFilter,
                "data" => $arrData,

            );
        }
        return response()->json($response, 200);
        // return view('index',['clients'=>$clients]);
    }





    public function client_store(Request $request)
    {

        $request->validate([

            'title' => 'required',

            'fname' => 'required',

            'lname' => 'required',

            'designation' => 'required',



            'organisation_name' => 'required',

            'organisation_location' => 'required',



            'fssai_no' => 'nullable',

            'pincode' => 'required',

            'company_emailid' => 'required',



            'company_website' => 'nullable',

            'comp_cont_no' => 'required',

            'comp_partners' => 'nullable',

            'comp_part_email' => 'nullable',



            'no_audit_conduct' => 'nullable',

            'no_trainings_conduct' => 'nullable',

            'no_samples_collect' => 'nullable',

            'contract_amount' => 'nullable',



            'client_logo' => 'nullable',

            'client_signature' => 'nullable',

            // 'personal_responsible'=> 'nullable',

            // 'doc_ref'=> 'nullable',

            'food_mobile' => 'nullable',

            'food_email' => 'nullable',

            'fstl' => 'nullable',

            'director_mobile' => 'nullable',

            'director_email' => 'nullable',

            'director' => 'nullable',

            'password' => 'required',
        ]);



        // Unique Client ID 

        $characters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $codeLength = 4;

        $code = substr(str_shuffle($characters), 0, $codeLength);

        $request['client_id'] = $code . time();
        // Client Password 

        // $password = 'pass' . str_replace(' ', '', $request->fname) . time();

        $password = $request->password;

        $hashedPassword = Hash::make($password);

        $request['password'] = $hashedPassword;



        $input = $request->all();



        // Client logo 

        if ($request->file('client_logo') !== null) {

            $image = request()->file(key: 'client_logo')->getClientOriginalName();

            $image_name = date('YmdHis') . $image;

            $request->file('client_logo')->storeAs('public/clients-logo', $image_name);

            $input['client_logo'] = $image_name;

        }



        // Client logo 

        // if($request->file('client_signature') !== null){

        //     $image = request()->file(key:'client_signature')->getClientOriginalName();

        //     $image_name = date('YmdHis').$image;

        //     $request->file('client_signature')->storeAs('public/clients-logo', $image_name);

        //     $input['client_signature'] = $image_name;

        // }

        // Creating client 

        $client = Client::create($input);

        if ($client) {

            // Sending password to  mail 

            $data = array(

                'name' => $request->title . $request->fname . $request->lname,

                'email' => $request->company_emailid,

                'password' => $password

            );
            echo "HTML Email Sent. Check your inbox.";

            return back()->with('s_msg', 'Client created successfully')->with('loader', true);

        } else {

            return back()->with('e_msg', 'Problem creating Client. Please try again!');

        }



    }







    public function view_client(Request $request)
    {

        $viewCl = Client::where(['id' => $request->id])->first();

        $f = substr($viewCl->fname, 0, 1);

        $s = substr($viewCl->lname, 0, 1);



        $upaudits = Audit::where(['client_id' => $request->id])->where(['completion' => 0])->get();

        $inaudits = Audit::where(['client_id' => $request->id])->where('completion', '>', 0)->where('completion', '<', 100)->get();

        $cmaudits = Audit::where(['client_id' => $request->id])->where(['completion' => 100])->get();



        $uptraining = Training::where(['client' => $request->id])->where(['status' => 0])->get();

        $intraining = Training::where(['client' => $request->id])->where(['status' => 1])->get();

        $cmtraining = Training::where(['client' => $request->id])->where(['status' => 2])->get();



        $upsamples = Sample::where(['client' => $request->id])->where(['status' => 0])->get();

        $insamples = Sample::where(['client' => $request->id])->where(['status' => 1])->get();

        $cmsamples = Sample::where(['client' => $request->id])->where(['status' => 2])->get();





        // Consolidated reports 

        $consolidated = ConsolidatedReport::where(['client_id' => $request->id])->get();

        foreach ($consolidated as $one) {

            $auditsinCon = $one->audit_ids;

            $auditsArr = explode(',', $auditsinCon);

            // dd($auditsArr);

            foreach ($auditsArr as $a) {



            }

        }



        if ($viewCl) {

            return view('client.view', ['consolidated' => $consolidated, 'viewCl' => $viewCl, 'f' => $f, 's' => $s, 'upaudits' => $upaudits, 'uptraining' => $uptraining, 'inaudits' => $inaudits, 'intraining' => $intraining, 'cmaudits' => $cmaudits, 'cmtraining' => $cmtraining, 'insamples' => $insamples, 'upsamples' => $upsamples, 'cmsamples' => $cmsamples]);



        } else {

            return redirect()->back()->with('error', 'Client Not found');



        }

    }





    public function audit_client(Request $request)
    {

        $id = $request->cid;

        $client = Client::where(['id' => $id])->first();

        if (Auth::user()->role == 1) {
            $hygieneAudits = Audit::where(['client_id' => $id, 'auditing_for' => 0])->get();

            $indusAudits = Audit::where(['client_id' => $id, 'auditing_for' => 1])->get();
        } else {
            $hygieneAudits = Audit::where(['client_id' => $id, 'auditing_for' => 0, 'auditors' => Auth::user()->id])->get();

            $indusAudits = Audit::where(['client_id' => $id, 'auditing_for' => 1, 'auditors' => Auth::user()->id])->get();
        }

        if ($hygieneAudits) {

            foreach ($hygieneAudits as $audit) {

                //  $auditor = User::where(['id' => $audit->auditors])->first('name');
                $auditor = User::withTrashed()->where(['id' => $audit->auditors])->first();

                $audit->auditor = $auditor->name;


                $templatesArr = $audit->checklists;
                $templatesjson = json_decode($templatesArr);

                $tempNames = [];
                if ($templatesjson) {
                    foreach ($templatesjson as $tArr) {
                        $template = Template::where(['id' => $tArr])->first();
                        $tempNames[] = $template;
                    }
                }

                $audit->tempname = $tempNames;

                // Total questions and answered questions to get progress percentage start

                $percentage = $this->quick_completion_percentage($audit->id);
                // dd($percentage);
                $audit->compl_percent = $percentage;
                // Total questions and answered questions to get progress percentage end
                $audit->formattedTimestamp = Carbon::parse($audit->updated_at)->format('d/m/Y \a\t g:i A');
                // dd($total_questions,$answ_ques);
            }
        }
        // dd($hygieneAudits);

        if ($indusAudits) {
            foreach ($indusAudits as $audit) {
                $auditor = User::where(['id' => $audit->auditors])->first('name');
                if (!$auditor) {
                    $audit->auditor = 'Sheela';
                } else {
                    $audit->auditor = $auditor->name;
                }


                $templatesArr = $audit->checklists;
                $templatesjson = json_decode($templatesArr);
                $tempNames = [];
                foreach ($templatesjson as $tArr) {
                    $template = Template::where(['id' => $tArr])->first();
                    $tempNames[] = $template;
                }
                $audit->tempname = $tempNames;

                // Total questions and answered questions to get progress percentage start
                $percentage = $this->quick_completion_percentage($audit->id);
                // dd($percentage);
                $audit->compl_percent = $percentage;
                // Total questions and answered questions to get progress percentage end
                $audit->formattedTimestamp = Carbon::parse($audit->updated_at)->format('d/m/Y \a\t g:i A');
                // dd($total_questions,$answ_ques);
            }
        }
        // dd($hygieneAudits);

        $servCode = ServiceCode::all();
        $folders = TempFolder::all();
        $employes = User::where(['status' => 1])->get();

        $city = "city";        // Mountain View
        $region = "region";        // California
        $country = "country";

        return view('client.audit', ['city' => $city, 'region' => $region, 'country' => $country, 'folders' => $folders, 'client' => $client, 'hygieneAudits' => $hygieneAudits, 'indusAudits' => $indusAudits, 'employes' => $employes, 'servCode' => $servCode]);

    }



    public function edit_client(Request $request)
    {

        $id = $request->clid;



        $client = Client::where(['id' => $id])->first();



        $audits = Audit::where(['client_id' => $id])->get();

        return view('client.edit', ['client' => $client, 'audits' => $audits]);

    }



    public function update_client(Request $request)
    {

        $request->validate([

            'id' => 'required',



            'title' => 'required',

            'fname' => 'required',

            'lname' => 'required',

            'designation' => 'required',



            'organisation_name' => 'required',

            'organisation_location' => 'required',



            'fssai_no' => 'nullable',

            'pincode' => 'required',

            'company_emailid' => 'required',



            'company_website' => 'required',

            'comp_cont_no' => 'required',

            'comp_partners' => 'nullable',

            'comp_part_email' => 'nullable',



            'no_audit_conduct' => 'nullable',

            'no_trainings_conduct' => 'nullable',

            'no_samples_collect' => 'nullable',

            'contract_amount' => 'nullable',



            'logo' => 'nullable',





        ]);



        $client = Client::where(['id' => $request->id])->first();



        if ($request->file('logo') !== null) {

            $uploadedFileName = $request->file('logo')->getClientOriginalName();

            $image_name = date('YmdHis') . $uploadedFileName;

            $request->file('logo')->storeAs('public/clients-logo/', $image_name);



            $request['client_logo'] = $image_name;

        }







        // dd($client->client_logo);

        // dd($image_name);

        $client->update(

            $request->all()

        );

        return redirect()->back()->with('success', 'Details Updated Successfully');

    }



    public function delete_client(Request $request)
    {

        $client = Client::where(['id' => $request->dclId])->first();

        $client->delete();



        return redirect()->back()->with('success', 'Client removed Successfully');



    }



    public function inactive_client(Request $request)
    {

        $client = Client::where(['id' => $request->clientId])->first();



        if ($client) {



            $client->status = 2;

            $client->save();

            return redirect()->back()->with('Client got in-active Successfully');



        } else {

            return redirect()->back()->with('Client not found');



        }



    }



    public function active_client(Request $request)
    {

        $client = Client::where(['id' => $request->clientId])->first();



        if ($client) {



            $client->status = 1;

            $client->save();

            return redirect()->back()->with('Client got active Successfully');



        } else {

            return redirect()->back()->with('Client not found');



        }



    }









}