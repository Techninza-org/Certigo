<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;

use App\Models\TempFolder;

use App\Models\Template;

use App\Models\TemplateDetail;

use App\Models\ObjectiveResponse;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Illuminate\Support\Facades\Log;




class TemplateController extends Controller
{

    public function index()
    {

        $templates = TempFolder::all();

        foreach ($templates as $f) {



            $f->tc = count(Template::where(['temp_folder_id' => $f->id])->get());

        }

        return view('templates.all-folders', ['templates' => $templates]);

    }





    // Folder store 

    public function template_store(Request $request)
    {

        $request->validate([

            'title' => 'required'

        ]);



        TempFolder::create($request->all());



        return redirect()->back()->with('success', 'Folder created successfully');

    }





    public function remove_folder(Request $request)
    {

        $request->validate([

            'folderId' => 'required'

        ]);





        // Search for templates matching temp Folder

        $templates = Template::where(['temp_folder_id' => $request->folderId])->get();

        if (!$templates->isEmpty()) {

            foreach ($templates as $temm) {

                $tmplatedtails = TemplateDetail::where(['template_id' => $temm->id])->get();

                if (!$tmplatedtails->isEmpty()) {

                    foreach ($tmplatedtails as $tmdt) {

                        $tmdt->delete();

                    }

                }

                $temm->delete();

            }

        }

        $folder = TempFolder::where(['id' => $request->folderId])->delete();





        if ($folder) {

            return to_route('get.templates')->with('success', 'Folder removed successfully');

        } else {

            return to_route('get.templates')->with('error', 'Problem removing folder. PLease try again.');

        }













    }

    public function remove_template(Request $request)
    {
        $request->validate([
            'templateId' => 'required'
        ]);

        // Search for templates matching temp Folder
        $template = Template::where(['id' => $request->templateId])->first();
        if ($template) {

            $tmplatedtails = TemplateDetail::where(['template_id' => $request->templateId])->get();
            if (!$tmplatedtails->isEmpty()) {
                foreach ($tmplatedtails as $tmdt) {
                    $tmdt->delete();
                }
            }

            if ($template->delete()) {
                return redirect()->back()->with('success', 'Template removed successfully');
            } else {
                return redirect()->back()->with('error', 'Problem removing template. Please try again.');
            }
        }

        return redirect()->back()->with('error', 'Template not found.');


    }



    public function edit_temp_name(Request $request)
    {

        $request->validate([

            'template_id' => 'required',

            'title' => 'required'

        ]);



        TempFolder::where(['id' => $request->template_id])->update(['title' => $request->title]);



        return redirect()->back()->with('success', 'Template name updated successfully');

    }



    public function get_template_files(Request $request)
    {



        $request->validate([

            'folderid' => 'required'

        ]);



        $templates = Template::where(['temp_folder_id' => $request->folderid])->get();

        foreach ($templates as $t) {



            $t->oc = count(TemplateDetail::where(['template_id' => $t->id])->get());

        }



        return view('templates.templates', ['folderid' => $request->folderid, 'templates' => $templates]);

    }



    public function templatestore(Request $request)
    {

        $request->validate([

            'temp_folder_id' => 'required',

            'template_type' => 'required',

            'template_name' => 'required',

            'description' => 'required',

            'multi_select' => 'nullable'





        ]);



        $input = $request->all();

        if ($request->multi_select) {

            $input['multi_select'] = 1;

        } else {

            $input['multi_select'] = 0;



        }

        $store = Template::create($input);

        if ($store) {

            return redirect()->back()->with('success', 'Template Created Successfully');

        } else {

            return redirect()->back()->with('error', 'Problem creating template');



        }

    }





    public function get_edit_template(Request $request)
    {

        $request->validate([

            'templateId' => 'required',

            'folderid' => 'nullable'

        ]);

        $id = $request->templateId;

        $template = Template::where(['id' => $id])->first();

        $template_name = $template->template_name;



        $firstLetter = substr($template_name, 0, 1);

        $letterAfterSpace = substr(strstr($template_name, ' '), 1, 1);



        $columns = Schema::getColumnListing('objective_responses');

        $score = $columns[2];



        $template_details = TemplateDetail::where(['template_id' => $id])->get();

        foreach ($template_details as $tem_det) {

            $res_grp = ObjectiveResponse::where(['group_id' => $tem_det->response_group])->get();

            $tem_det->respGrp = $res_grp;

            $tem_det->score_f = $score;

        }

        // dd($template_details);

        $obj_count = count($template_details);



        $responses = ObjectiveResponse::orderBy('created_at')->get()->groupBy(function ($data) {

            return $data->group_id;

        });

        // dd($responses);

        return view('templates.edit', ['folderid' => $request->folderid, 'responses' => $responses, 'obj_count' => $obj_count, 'template' => $template, 'template_details' => $template_details, 'firstLetter' => $firstLetter, 'letterAfterSpace' => $letterAfterSpace]);

    }



    public function template_update(Request $request)
    {

        $request->validate([

            'templateid' => 'required',

            'template_type' => 'required',

            'template_name' => 'required',

            'description' => 'required',

            'multi_select' => 'nullable'





        ]);



        $input = $request->except('_token');

        if ($request->multi_select == 'on') {

            $input['multi_select'] = 1;

        }

        if ($request->multi_select == 'off') {

            $input['multi_select'] = 0;



        }



        $tempUpdate = Template::where(['id' => $request->templateid])->update(

            [

                'template_type' => $input['template_type'],

                'template_name' => $input['template_name'],

                'description' => $input['description'],

                // 'multi_select'=> $input['multi_select'] 

            ]

        );



        $temDetails = TemplateDetail::where(['template_id' => $request->templateid])->get();

        foreach ($temDetails as $td) {

            $td->template_name = $request->template_name;

            $td->save();

        }

        if ($tempUpdate) {

            return redirect()->back()->with('success', 'Template updated');

        } else {

            return redirect()->back()->with('error', 'Problem updating template, please try again.');

        }

    }





    public function open_template(Request $request)
    {



        $request->validate([

            'templateId' => 'required',

            'folderid' => 'nullable'

        ]);

        $id = $request->templateId;

        $template = Template::where(['id' => $id])->first();

        $template_name = $template->template_name;

        $template_id = $template->id;





        $firstLetter = substr($template_name, 0, 1);

        $letterAfterSpace = substr(strstr($template_name, ' '), 1, 1);



        $columns = Schema::getColumnListing('objective_responses');

        $score = $columns[2];



        $details = TemplateDetail::where(['template_id' => $id])->get();

        // dd($details);

        foreach ($details as $tem_det) {

            $res_grp = ObjectiveResponse::where(['group_id' => $tem_det->response_group])->get();

            $tem_det->respGrp = $res_grp;

            $tem_det->score_f = $score;

        }

        // dd($details);



        return view('templates.open-template', ['folderid' => $request->folderid, 'details' => $details, 'firstLetter' => $firstLetter, 'template_id' => $template_id, 'letterAfterSpace' => $letterAfterSpace]);

    }





    public function add_objective(Request $request)
    {

        $request->validate([

            'template_id' => 'required',

            'question' => 'required',

            'group_id' => 'nullable',

            'question_name' => 'nullable'



        ]);



        $temName = Template::where(['id' => $request->template_id])->first('template_name');

        if ($request->group_id !== null) {

            $request['response_group'] = $request->group_id;

        }



        $request['template_name'] = $temName->template_name;



        // Question name 







        $addObj = TemplateDetail::create($request->all());

        if ($addObj) {

            return redirect()->back()->with('success', 'Objective added. ');



        } else {

            return redirect()->back()->with('error', 'Problem adding Objective.');



        }



    }



    public function updt_obj_q(Request $request)
    {

        $request->validate([

            'id' => 'required',

            'question' => 'required',

            'sdg' => 'nullable',

            'nc' => 'nullable',

            'question_name' => 'nullable'





        ]);



        // dd($request->all());

        $update = TemplateDetail::where(['id' => $request->id])->update([

            'question' => $request->question,

            'sdg' => $request->sdg,

            'nc' => $request->nc,

            'question_name' => $request->question_name







        ]);

        if ($update) {

            return redirect()->back()->with('success', 'Objective updated ');



        } else {

            return redirect()->back()->with('error', 'Objective not updated ');



        }





    }



    public function removeObjective(Request $request)
    {



        TemplateDetail::where(['id' => $request->dataId])->delete();



        $data = ['success', 'Objective removed successfully '];

        return response()->json(['data' => $data], 200);

    }



    public function submitForm(Request $request)
    {

        $formData = $request->all();







        // Process and store the form data in the database using your logic

        foreach ($formData as $data) {

            $model = new ObjectiveResponse();

            $model->name = $data['name'];

            $model->score = $data['score'];

            $model->color = $data['color'];



            if ($data['is_base'] == "on") {

                $model->is_base = 1;

            }



            $model->group_id = "ID_" . time();

            $model->save();

        }



        // Return a response indicating the success or failure of the form submission

        return response()->json(['message' => 'Forms submitted successfully']);

    }





    public function fetchResponseId(Request $request)
    {

        $resp = ObjectiveResponse::where(['group_id' => $request->checkVal])->get()->toArray();

        return response()->json(['resp' => $resp], 200);

    }





    public function changeResponse(Request $request)
    {



        $grp_id = $request->checkVal;

        $objID = $request->objID;



        $objective = TemplateDetail::where(['id' => $objID])->first();

        $objective->response_group = $grp_id;

        $objective->save();



        return response()->json(['response' => 'Response changes successfully'], 200);

    }





    public function fillViewModal(Request $request)
    {



        $tempDet = TemplateDetail::where(['template_id' => $request->tempID])->get();

        foreach ($tempDet as $td) {

            $objRes = ObjectiveResponse::where(['group_id' => $td->response_group])->get();

            $td->ors = $objRes;

        }

        $temp = Template::where(['id' => $request->tempID])->first();



        return response()->json(['response' => $tempDet, 'template' => $temp], 200);

    }



    public function getResponses()
    {



        $responses = ObjectiveResponse::get()->groupBy(function ($data) {

            return $data->group_id;

        });

        // dd($responses);

        return view('templates.responses', ['responses' => $responses]);

    }



    public function removeResponse(Request $request)
    {

        $request->validate([

            'group_id' => 'required'



        ]);



        $removed = ObjectiveResponse::where(['group_id' => $request->group_id])->delete();

        if ($removed) {



            return redirect()->back()->with('success', 'Response removed successfully.');

        } else {

            return redirect()->back()->with('error', 'Response removed failed.');



        }

    }


    // copy folder and template

    public function copy_folder(Request $request)
    {
        Log::info('copy_folder method called with request:', $request->all());

        // Validate the request
        $validated = $request->validate([
            'folder_id' => 'required|exists:temp_folders,id', // Ensure folder_id exists in temp_folders table
        ]);

        Log::info('Validation passed with folder_id:', [$validated['folder_id']]);

        // Find the folder to copy
        $folder = TempFolder::find($request->folder_id);

        if (!$folder) {
            Log::error('Folder not found for ID:', [$request->folder_id]);
            return redirect()->back()->with('error', 'Folder not found.');
        }

        Log::info('Folder found:', $folder->toArray());

        // Create a new folder
        $new_folder = TempFolder::create([
            'title' => $folder->title . ' (copy)',
        ]);

        Log::info('New folder created:', $new_folder->toArray());

        // Get all templates in the folder
        $templates = Template::where('temp_folder_id', $folder->id)->get();

        foreach ($templates as $template) {
            // Create a copy of each template
            $new_template = Template::create([
                'temp_folder_id' => $new_folder->id,
                'template_name' => $template->template_name . ' (copy)',
                'template_type' => $template->template_type,
                'description' => $template->description,
                'multi_select' => $template->multi_select,
            ]);

            Log::info('New template created:', $new_template->toArray());

            // Get template details for the current template
            $template_details = TemplateDetail::where('template_id', $template->id)->get();

            foreach ($template_details as $detail) {
                // Create a copy of each template detail
                $new_detail = TemplateDetail::create([
                    'template_id' => $new_template->id, // Use new template ID
                    'template_name' => $detail->template_name,
                    'question' => $detail->question,
                    'question_name' => $detail->question_name,
                    'sdg' => $detail->sdg,
                    'nc' => $detail->nc,
                    'response' => $detail->response,
                    'response_group' => $detail->response_group,
                    'remarks' => $detail->remarks,
                    'suggestions' => $detail->suggestions,
                ]);

                Log::info('New template detail created:', $new_detail->toArray());
            }
        }

        return redirect()->back()->with('success', 'Folder and its templates copied successfully.');
    }


}