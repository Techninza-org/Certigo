<?php



namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\User;

use App\Models\Client;

use App\Models\Attendee;

use App\Models\Training;

use PDF;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\DB;


class TrainingController extends Controller
{

    public function allTrainings()
    {

        // get auth user role
        $user = Auth::user()->role;
        $id = Auth::user()->id;
        // dd($id);

        if ($user === 0) {
            $clients = Client::where(['status' => 1])->get();

            $users = User::where(['status' => 1, 'id' => $id])->get();

            $uptrainings = Training::where(['status' => 0, 'members' => $id])->get();


            $inptrainings = Training::where(['status' => 1, 'members' => $id])->get();


            $comptrainings = Training::where(['status' => 2, 'members' => $id])->get();

            $attendees = Attendee::all();
            return view('training.all', ['clients' => $clients, 'uptrainings' => $uptrainings, 'users' => $users, 'attendees' => $attendees, 'inptrainings' => $inptrainings, 'comptrainings' => $comptrainings]);

        } else {

            $clients = Client::where(['status' => 1])->get();

            $users = User::where(['status' => 1])->get();

            $uptrainings = Training::where(['status' => 0])->get();


            $inptrainings = Training::where(['status' => 1])->get();

            $comptrainings = Training::where(['status' => 2])->get();

            $attendees = Attendee::all();

            // dd($trainings);

            return view('training.all', ['clients' => $clients, 'uptrainings' => $uptrainings, 'users' => $users, 'attendees' => $attendees, 'inptrainings' => $inptrainings, 'comptrainings' => $comptrainings]);
        }
    }







    public function scheduleTraining(Request $request)
    {

        $request->validate([

            'topic' => 'required',

            'audit_start_date' => 'required',

            'location' => 'required',

            'amount' => 'required',

            'client' => 'required',

            'members' => 'nullable',

            'attendees' => 'nullable'



        ]);







        $client = Client::where(['id' => $request->client])->first('no_trainings_conduct');

        $client_trainings = Training::where(['client' => $request->client])->count();

        // dd($client);

        // if ($client_trainings >= $client->no_trainings_conduct) {

        //     // dd($client_trainings,$client->no_trainings_conduct);

        //     return redirect()->back()->with('error', ' Maximum number of trainigs scheduled');



        // }

        $attendeesArr = explode(',', $request->attendees);

        $request['attendees'] = json_encode($attendeesArr);

        $input = $request->all();

        // dd($input);

        $trainingStore = Training::create($input);

        if ($trainingStore) {

            return redirect()->back()->with('success', 'Training Scheduled successfully');



        } else {

            return redirect()->back()->with('error', 'Some error occured while scheduling training.');



        }

    }



    // public function geteditTraining(Request $request){

    //     $training = Training::where(['id'=>$request->trainingId])->first();

    //     $clients = Client::where(['status'=> 1])->get();

    //     $users = User::all();



    //     // dd($training);

    //     return view('training.edit',['training'=>$training,'clients'=>$clients,'users'=>$users]);

    // }





    public function geteditTraining($id)
    {

        $training = Training::where(['id' => $id])->first();

        $clients = Client::where(['status' => 1])->get();

        $users = User::all();

        $attendees = Attendee::all();





        // dd($training);

        return view('training.edit', ['training' => $training, 'clients' => $clients, 'users' => $users, 'attendees' => $attendees]);

    }



    public function editTraining(Request $request)
    {
        $request->validate([
            'trainingId' => 'required',
            'topic' => 'required',
            'audit_start_date' => 'nullable',
            'location' => 'required',
            'client' => 'required',
            'amount' => 'required',
            'members' => 'required',
            'attendees' => 'required',
        ]);

        $training = Training::findOrFail($request->trainingId);

        $attendeesArr = array_unique(explode(',', $request->attendees));
        $request->merge(['attendees' => json_encode($attendeesArr)]);

        if ($training->update($request->all())) {
            return redirect()->back()->with('success', 'Training Details updated');
        }

        return redirect()->back()->with('error', 'Training details not updated.');
    }



    public function viewTraining(Request $request)
    {

        $training = Training::where(['id' => $request->trainingId])->first();

        $train_attend = $training->attendees;

        $attArray = json_decode($train_attend, true);

        $atendis = [];

        foreach ($attArray as $att) {

            $atten = Attendee::where(['id' => $att])->first();

            $atendis[] = $atten;

        }



        // dd($atendis);

        $client = Client::where(['id' => $training->client])->first('organisation_name');





        return view('training.view', ['training' => $training, 'client' => $client, 'atendis' => $atendis]);

    }



    public function deleteTraining(Request $request)
    {

        // dd($request->all());



        $training = Training::where(['id' => $request->trainingId])->delete();

        if ($training) {



            return to_route('get.trainings');

        } else {

            return redirect()->back()->with('error', 'Problem deleting training! Please try again.');

        }

    }



    public function addAttendee(Request $request)
    {

        $request->validate([

            'fname',

            'lname',

            'email',

            'designation',

            'contact'



        ]);







        $input = $request->all();



        // dd($input);

        $attendee = Attendee::create($input);



        if ($attendee) {

            return redirect()->back()->with('success', 'Attendee added successfully');



        } else {

            return redirect()->back()->with('error', 'Some error occured while adding attendee.');



        }

    }

    public function deleteAttendee($id)
    {
        $attendee = Attendee::find($id);

        if (!$attendee) {
            return response()->json(['success' => false, 'message' => 'Attendee not found!']);
        }

        $attendee->delete();

        return response()->json(['success' => true, 'message' => 'Attendee deleted successfully!']);
    }





    public function startTraining(Request $request)
    {

        $request->validate([

            'trainingId' => 'required'

        ]);



        $training = Training::find($request->trainingId);

        $training->status = 1;

        $training->save();

        // dd($training);

        return to_route('get.trainings');

    }





    public function getCompletePage(Request $request)
    {

        $training = Training::where(['id' => $request->tId])->first();

        if ($training->attendees !== null) {

            $train_attend = $training->attendees;

            $attArray = json_decode($train_attend, true);

            $atendis = [];

            foreach ($attArray as $att) {

                $atten = Attendee::where(['id' => $att])->first();

                $atendis[] = $atten;

            }

        }



        if ($training->key_points !== null) {

            $key_points = $training->key_points;

            $pointsArr = json_decode($key_points, true);

            $training->points__array = $pointsArr;



        }



        if ($training->evidences !== null) {

            $evidences = $training->evidences;

            $imgArr = json_decode($evidences, true);

            $training->img__array = $imgArr;



        }







        // dd($atendis);

        $client = Client::where(['id' => $training->client])->first('organisation_name');





        return view('training.view-complete', ['training' => $training, 'client' => $client, 'atendis' => $atendis]);

    }



    public function postCompletePage($id)
    {

        // $request->validate([

        //     'trainingId'=> 'required'

        // ]);



        $training = Training::where(['id' => $id])->first();



        $training->status = 2;

        $training->completed_at = Carbon::now();

        $training->save();





        $atendis = [];

        if ($training->attendees !== null) {

            $train_attend = $training->attendees;

            $attArray = json_decode($train_attend, true);

            foreach ($attArray as $att) {

                $atten = Attendee::where(['id' => $att])->first();

                $atendis[] = $atten;

            }

        }



        if ($training->key_points !== null) {

            $key_points = $training->key_points;

            $training->key_points = json_decode($key_points, true);

        }



        if ($training->evidences !== null) {

            $evidences = $training->evidences;

            $imgArr = json_decode($evidences, true);

            $training->img__array = $imgArr;



        }



        // dd($atendis);

        $client = Client::where(['id' => $training->client])->first('organisation_name');



        return view('pdfview', ['training' => $training, 'client' => $client, 'atendis' => $atendis]);



    }

    public function downloadPdf(Request $request)
    {
        // Validate the request
        $request->validate([
            'trainingId' => 'required',
        ]);

        // Fetch training details
        $training = Training::where(['id' => $request->trainingId])->first();

        // Initialize attendees array
        $atendis = [];
        if ($training->attendees !== null) {
            $train_attend = $training->attendees;
            $attArray = json_decode($train_attend, true);

            foreach ($attArray as $att) {
                $atten = Attendee::where(['id' => $att])->first();
                $atendis[] = $atten;
            }
        }

        // Fetch client details
        $client = Client::where(['id' => $training->client])->first();

        // Get current date and time
        $todaydate = Carbon::now();
        $todayDate = $todaydate->format('d/m/Y');
        $todayTime = $todaydate->format('H:i A');

        if ($client) {
            // Generate PDF
            $pdf = PDF::loadView('downpdf', [
                'training' => $training,
                'atendis' => $atendis,
                'client' => $client,
                'todayDate' => $todayDate,
                'todayTime' => $todayTime,
                'images' => json_decode($training->evidences),
                'points' => json_decode($training->key_points),
                'trainerSign' => $training->trainer_sign,
                'traineeSign' => $training->trainee_sign,
            ]);

            $base64Pdf = base64_encode($pdf->output());

            // return view('pdfviewer', ['base64Pdf' => $base64Pdf]);

            // Return PDF as stream
            return $pdf->stream('certigo-report.pdf');

        }

        // Redirect back with error if client not found
        return redirect()->back()->with('error', 'Client not found');
    }










    // public function pdfview(Request $request)

    // {

    //     $items = DB::table("items")->get();

    //     view()->share('items',$items);





    //     if($request->has('download')){

    //         $pdf = PDF::loadView('pdfview');

    //         return $pdf->download('pdfview.pdf');

    //     }





    //     return view('pdfview');

    // }





    public function trainingImages(Request $request)
    {

        $request->validate([

            'trainingId' => 'required',

            'evidences' => 'nullable',

            'input' => 'nullable',



        ]);



        $trainingDetail = Training::where(['id' => $request->trainingId])->first();



        $imgArr = array();

        $pointsArr = array();





        if ($trainingDetail !== null) {

            $existingImages = json_decode($trainingDetail->evidences, true);

            $existingPoints = json_decode($trainingDetail->key_points, true);

            // If there are existing images, add them to the $imgArr array

            if (!empty($existingImages)) {

                $imgArr = $existingImages;

                $pointsArr = $existingPoints;

            }

        }







        if ($files = $request->file('evidences')) {

            foreach ($files as $file) {

                $image_name = md5(rand(1000, 10000));

                $ext = strtolower($file->getClientOriginalExtension());

                $image_full_name = $image_name . '.' . $ext;

                $upload_path = 'storage/training/';

                $image_url = $upload_path . $image_full_name;

                $file->move($upload_path, $image_full_name);

                $imgArr[] = $image_url;

            }

        }



        foreach ($request->input as $in) {

            $pointsArr[] = $in;

        }



        $evidences = json_encode($imgArr);

        $trainingDetail->evidences = $evidences;





        // POints 

        $allInputs = json_encode($pointsArr);

        $trainingDetail->key_points = $allInputs;



        // dd($allInputs);





        if ($trainingDetail->save()) {

            return redirect()->back()->with('success', 'Images upload successfully');

        } else {

            return redirect()->back()->with('error', 'Images upload failed. Try again.');

        }



    }





    public function remove_point(Request $request)
    {

        $request->validate([



            'key' => 'required',

            'trainingId' => 'required'





        ]);

        $training = Training::where(['id' => $request->trainingId])->first();

        $inputsArr = json_decode($training->key_points);



        foreach ($inputsArr as $key => $in) {

            if ($key == $request->key) {

                unset($inputsArr[$key]);

            }

        }





        $inputsArr = array_values($inputsArr); // Re-index the array



        $inputsJson = json_encode($inputsArr, true);



        $training->key_points = $inputsJson;



        // $training->save();

        // dd($auditDetail);

        if ($training->save()) {

            return redirect()->back()->with('success', 'Key point removed');

        } else {

            return redirect()->back()->with('error', 'Key point  not removed');

        }





    }







    public function getUploadSign($trainingId)
    {

        return view('training.signature', ['trainingId' => $trainingId]);

    }



    public function trainingSignatures(Request $request)
    {

        $request->validate([

            'trainersign' => 'required',

            'traineesign' => 'nullable',

            'trainingId' => 'required',



        ]);





        $training = Training::where(['id' => $request->trainingId])->first();

        if ($request->trainersign == null || $request->traineesign == null || $request->trainersign == '' || $request->traineesign == '') {

            return redirect()->back()->with('error', 'Please upload signatures');



        }



        if ($request->file('trainersign') !== null) {

            $uploadedFileName = $request->file('trainersign')->getClientOriginalName();

            $image_name = date('YmdHis') . $uploadedFileName;

            $request->file('trainersign')->storeAs('public/signatures/', $image_name);



            $request['trainer_sign'] = $image_name;

        }



        if ($request->file('traineesign') !== null) {

            $uploadedFileName2 = $request->file('traineesign')->getClientOriginalName();

            $image_name2 = date('YmdHis') . $uploadedFileName2;

            $request->file('traineesign')->storeAs('public/signatures/', $image_name2);



            $request['trainee_sign'] = $image_name2;

        }

        // dd($request->all());



        $result = $training->update($request->all());

        if ($result) {



            return redirect()->back()->with('success', 'Signatures Uploaded Successfully');

        } else {

            return redirect()->back()->with('error', 'Please try again');



        }

    }









    public function signView($id)
    {

        return view('training.signature-pad', ['training_id' => $id]);

    }





    public function sign_View($id)
    {

        return view('training.sign-pad', ['training_id' => $id]);

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



        $audit = Training::where(['id' => $request->training_id])->first();

        if ($audit) {

            $audit->trainer_sign = $file;

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



        $audit = Training::where(['id' => $request->training_id])->first();

        if ($audit) {

            $audit->trainee_sign = $file;

            $audit->save();

            return back()->with('success', 'Signature saved successfully !!');

        }

        return back()->with('error', 'Re-upload your signature');





    }

}