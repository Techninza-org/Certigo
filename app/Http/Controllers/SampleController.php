<?php

namespace App\Http\Controllers;
use PDF;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Sample;
use App\Models\Parameter;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function allSamples(){

        $upsamples = Sample::where(['status'=> 0])->get();
        $insamples = Sample::where(['status'=> 1])->get();
        $cmsamples = Sample::where(['status'=> 2])->get();

        $clients = Client::where(['status'=> 1])->get();
        $users = User::where(['status'=>1])->get();
   

        $parameters = Parameter::all();


        return view('samples.all',['clients'=>$clients,'users'=>$users,'upsamples'=>$upsamples,'parameters'=>$parameters,'insamples'=>$insamples,'cmsamples'=>$cmsamples]);
    } 

    public function scheduleSample(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'type' => 'required',
            'temperature' => 'nullable',
            'weight' => 'nullable',
            'quantity' => 'nullable',
            'amount' => 'required',
            'client' => 'required',
            'members' => 'nullable',
            'parameters' => 'nullable'

        ]);

        $client = Client::where(['id' => $request->client])->first('no_samples_collect');
        $client_samples = Sample::where(['client' => $request->client ])->count();
        // if($client_samples >= $client->no_samples_collect){
        //     // dd($client_trainings,$client->no_trainings_conduct);
        //     return redirect()->back()->with('error',' Maximum number of samples scheduled');
        // }


        $membersArr = explode(',',$request->members);        
        $request['members'] = json_encode($membersArr);

        $parametersArr = explode(',',$request->parameters);       
        $request['parameters'] = json_encode($parametersArr);

        $input = $request->all();

        // dd($input);
        $trainingStore = Sample::create($input);

        if($trainingStore){
            return redirect()->back()->with('success','Sample Scheduled successfully');

        }else{
            return redirect()->back()->with('error','Some error occured while scheduling sample.');

        }
    }

    public function addParameter(Request $request){
        $request->validate([
            'name' => 'required',
            

        ]);



        $input = $request->all();

        // dd($input);
        $parameterAdd = Parameter::create($input);

        if($parameterAdd){
            return redirect()->back()->with('success','Parameter Scheduled successfully');

        }else{
            return redirect()->back()->with('error','Some error occured while adding parameter.');

        }
    }

    public function viewSample(Request $request){
        $sample = Sample::where(['id'=>$request->sampleId])->first();
        //Parameters
        $s_para = $sample->parameters;
        $paraArray = json_decode($s_para,true);
        $param = [];
        foreach($paraArray as $par){
            $sampara = Parameter::where(['id'=>$par])->first();
            $param[]  = $sampara;
        }
        
        // dd($atendis);
        $client = Client::where(['id'=>$sample->client])->first();

       
        return view('samples.view',['sample'=>$sample,'client'=>$client,'param'=>$param]);
    }

    public function startSample(Request $request){
        $request->validate([
            'sampleId' => 'required'
        ]);

        $sample = Sample::find($request->sampleId);
        $sample->status = 1;
        $sample->save();
        // dd($training);
        return to_route('get.samples');
    }

    public function completeSample(Request $request){
        $sample = Sample::where(['id'=>$request->sampleId])->first();
        //Parameters
        $s_para = $sample->parameters;
        $paraArray = json_decode($s_para,true);
        $param = [];
        foreach($paraArray as $par){
            $sampara = Parameter::where(['id'=>$par])->first();
            $param[]  = $sampara;
        }
        if($sample->key_points !== null){
            $key_points = $sample->key_points;
            $pointsArr = json_decode($key_points,true);
            $sample->points = $pointsArr;
            
        }
        // dd($atendis);
        $client = Client::where(['id'=>$sample->client])->first();

       
        return view('samples.complete',['sample'=>$sample,'client'=>$client,'param'=>$param]);
    }

    public function postCompleteSample($id){
        // $request->validate([
        //     'sampleId'=> 'required'
        // ]);



        $sample = Sample::where(['id'=>$id])->first();
        //Parameters
        $s_para = $sample->parameters;
        $paraArray = json_decode($s_para,true);
        $param = [];
        foreach($paraArray as $par){
            $sampara = Parameter::where(['id'=>$par])->first();
            $param[]  = $sampara;
        }
        
        // dd($atendis);
        $client = Client::where(['id'=>$sample->client])->first();
       $sample->status  = 2;
       $sample->completed_date  = Carbon::now();
       $sample->save();


       if($sample->key_points !== null){
        $key_points = $sample->key_points;
        $pointsArr = json_decode($key_points,true);
        $sample->points__array = $pointsArr;
        
        
        }
        


        return view('samplepdfview',['sample'=>$sample,'client'=>$client,'param'=>$param]);

    }


    public function downloadPdf(Request $request){
        $request->validate([
            'sampleId'=> 'required'
        ]);

        $sample = Sample::where(['id'=>$request->sampleId])->first();
        //Parameters
        $s_para = $sample->parameters;
        $paraArray = json_decode($s_para,true);
        $param = [];
        foreach($paraArray as $par){
            $sampara = Parameter::where(['id'=>$par])->first();
            $param[]  = $sampara;
        }
        
        // dd($atendis);
        $client = Client::where(['id'=>$sample->client])->first();

        $todaydate = Carbon::now();
        $todayDate = $todaydate->format('d/m/Y');
        $todayTime = $todaydate->addHours('5')->addMinutes('30')->format('H:i a');

            if($client){
            
                $pdf = PDF::loadView('sample-pdf', [
                    'sample'=>$sample,
                    'param'=>$param,
                    'client'=>$client,
                    'todayDate'=>$todayDate,
                    'todayTime'=>$todayTime,
                    'images' => json_decode($sample->evidences),
                    'points' => json_decode($sample->key_points),
                    'sample_by_sign' => $sample->sample_by_sign,
                    'sample_to_sign' => $sample->sample_to_sign,

                ]);
                return $pdf->stream('reportPdf.pdf');
            }
       
        // return $pdf->download('itsolutionstuff.pdf');
        return redirect()->back()->with('error','Client not found');


    }

    public function sampleImages(Request $request){
        $request->validate([
            'sampleId'=> 'required',
            'evidences'=> 'nullable',
            'input'=> 'nullable',

        ]);

        // dd($request->all());

        $sampleDetail = Sample::where(['id'=>$request->sampleId])->first();

        $imgArr = array();
        $pointsArr = array();


       if($sampleDetail !== null){
            $existingImages = json_decode($sampleDetail->evidences, true);
            $existingPoints = json_decode($sampleDetail->key_points, true);
            // If there are existing images, add them to the $imgArr array
            if (!empty($existingImages)) {
                $imgArr = $existingImages;
                $pointsArr = $existingPoints;
            }
       }       
       


        if($files = $request->file('evidences')){
            foreach( $files as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'storage/sample/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path,$image_full_name);
                $imgArr[] = $image_url;
            }
        }

        foreach($request->input as $in){
            $pointsArr[] = $in;
        }
        
        $evidences = json_encode($imgArr);            
        $sampleDetail->evidences = $evidences;


        // POints 
        $allInputs = json_encode($pointsArr);    
        $sampleDetail->key_points = $allInputs;

        // dd($allInputs);

       
        if($sampleDetail->save()){           
            return redirect()->back()->with('success','Images upload successfully');
        }else{
            return redirect()->back()->with('error','Images upload failed. Try again.');
        }       
       
    }

    public function remove_sample_point(Request $request){
        $request->validate([
            
            'key' => 'required',
            'sampleId' => 'required'


        ]);
        $sample = Sample::where(['id'=>$request->sampleId])->first();
        $inputsArr = json_decode($sample->key_points);

        foreach( $inputsArr as $key => $in ){
            if($key == $request->key){
                unset($inputsArr[$key]);
            }
        }


        $inputsArr = array_values($inputsArr); // Re-index the array

        $inputsJson = json_encode($inputsArr, true);

        $sample->key_points = $inputsJson;

        // $sample->save();
        // dd($auditDetail);
        if($sample->save()){
            return redirect()->back()->with('success','Key point removed');
        }else{
            return redirect()->back()->with('error','Key point  not removed');
        }
        

    }


    public function getUploadSign($sampleId){
        return view('samples.signature',['sampleId'=>$sampleId]);
    }

    public function sampleSignatures(Request $request){
        $request->validate([
            'sample_bysign' => 'required',
            'sample_tosign' => 'nullable',
            'sampleId' => 'required',

        ]);

        
        $sample = Sample::where(['id'=> $request->sampleId])->first();
        if( $request->sample_bysign == null || $request->sample_tosign == null || $request->sample_bysign == '' || $request->sample_tosign == ''){
            return redirect()->back()->with('error','Please upload signatures');

        }

        if($request->file('sample_bysign') !== null){
            $uploadedFileName  = $request->file('sample_bysign')->getClientOriginalName();
            $image_name = date('YmdHis').$uploadedFileName ;
            $request->file('sample_bysign')->storeAs('public/signatures/', $image_name);

            $request['sample_by_sign'] = $image_name;
        }

        if($request->file('sample_tosign') !== null){
            $uploadedFileName2  = $request->file('sample_tosign')->getClientOriginalName();
            $image_name2 = date('YmdHis').$uploadedFileName2 ;
            $request->file('sample_tosign')->storeAs('public/signatures/', $image_name2);

            $request['sample_to_sign'] = $image_name2;
        }
        // dd($request->all());
     
        $result = $sample->update( $request->all() );
        if($result){

            return redirect()->back()->with('success','Signatures Uploaded Successfully');
        }else{
            return redirect()->back()->with('error','Please try again');

        }
    }

    public function deleteSample(Request $request){
        // dd($request->all());

        $training = Sample::where(['id'=>$request->sampleId])->delete();
        if($training){

            return to_route('get.samples');
        }else{
            return  redirect()->back()->with('error','Problem deleting sample! Please try again.');
        }
    }


    public function signView($id)
    {
        return view('samples.signature-pad',['training_id'=>$id]);
    }


    public function sign_View($id)
    {
        return view('samples.sign-pad',['training_id'=>$id]);
    }


    public function store(Request $request)
    {
        $folderPath = public_path('images/');        
        $image = explode(";base64,", $request->signed);              
        $image_type = explode("image/", $image[0]);           
        $image_type_png = $image_type[1];           
        $image_base64 = base64_decode($image[1]);           
        $file =  uniqid() . '.'.$image_type_png;      
        file_put_contents($file, $image_base64);

        $audit = Sample::where(['id'=>$request->training_id])->first();
        if($audit){
            $audit->sample_by_sign = $file;
            $audit->save();
            return back()->with('success', 'Signature saved successfully !!');
        }
        return back()->with('error','Re-upload your signature');
      
    }

    public function store_sign(Request $request)
    {
        $folderPath = public_path('images/');        
        $image = explode(";base64,", $request->signed);              
        $image_type = explode("image/", $image[0]);           
        $image_type_png = $image_type[1];           
        $image_base64 = base64_decode($image[1]);           
        $file =  uniqid() . '.'.$image_type_png;      
        file_put_contents($file, $image_base64);

        $audit = Sample::where(['id'=>$request->training_id])->first();
        if($audit){
            $audit->sample_to_sign = $file;
            $audit->save();
            return back()->with('success', 'Signature saved successfully !!');
        }
        return back()->with('error','Re-upload your signature');

      
    }

}
