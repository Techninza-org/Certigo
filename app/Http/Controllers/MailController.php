<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;



use App\Http\Requests;

use App\Http\Controllers\Controller;



class MailController extends Controller {

   public function basic_email() {

      $data = array('name'=>"Virat Gandhi");

   

      Mail::send(['text'=>'mail'], $data, function($message) {

         $message->to('abc@gmail.com', 'Tutorials Point')->subject

            ('Laravel Basic Testing Mail');

         $message->from('xyz@gmail.com','Virat Gandhi');

      });

      echo "Basic Email Sent. Check your inbox.";

   }

   public function html_email() {

      $data = array('name'=>"Virat Gandhi");

      Mail::send('mail', $data, function($message) {

         $message->to('abc@gmail.com', 'Tutorials Point')->subject

            ('Laravel HTML Testing Mail');

         $message->from('xyz@gmail.com','Virat Gandhi');

      });

      echo "HTML Email Sent. Check your inbox.";

   }

   public function attachment_email() {

      $data = array('name'=>"Virat Gandhi");

      Mail::send('mail', $data, function($message) {

         $message->to('abc@gmail.com', 'Tutorials Point')->subject

            ('Laravel Testing Mail with Attachment');

         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');

         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');

         $message->from('xyz@gmail.com','Virat Gandhi');

      });

      echo "Email Sent with attachment. Check your inbox.";

   }

   // public function sendconsolidated($id) {




       
   //       $client = Client::where(['id' => $id])->first();
   //       // Quarter array 
   //       $Q1 = [1,2,3];
   //       $Q2 = [4,5,6];
   //       $Q3 = [7,8,9];
   //       $Q4 = [10,11,12];
 
   //       $current_month = Carbon::now()->month;        
   //       // Quarter for which consolidated report to generate
   //       // -------------------- original code ------------
   //       // $qFound = '';        
   //       // foreach( [$Q1,$Q2,$Q3,$Q4] as $qArray){
   //       //     if(in_array($current_month , $qArray)){                
   //       //         $qFound = $qArray;
   //       //     }
   //       // }
   //       // -------------original code---------------------
   //       $qFound = [   0 => 7,  1 => 8,   2 => 9   ];           //  testing for september(9)
   //       // dd($qFound);      //array:3 [   0 => 7,  1 => 8,   2 => 9   ]
 
   //       // -------------------- original code ------------
   //       $last_month_of_quarter = end($qFound);
   //       // if($current_month == $last_month_of_quarter){
   //       //     dd("this is last month of quarter");
         
 
 
   //           $audits = [];
   //           $allAuditsAvg = [];
   //           $createdArrays = [];       
   //           $templatesName = [];
   //           $negAnsArr = [];
   //           foreach($qFound as $index=>$q){
   //               // Audits found in this  month and YEAR
   //               $myaudits  = Audit::where(['month' => $q,'client_id' => $id,'auditing_for' => 0])->get();
 
                 
   //               // dd($myaudits);         
   //               $score = [];
 
   //               if($myaudits){
   //                   foreach($myaudits as $audit){
   //                       $audits[] = $audit->id;
   //                       $score[] = $audit->final_score;
 
   //                       // getting Checklists and its score
   //                       $template_array = json_decode($audit->checklists); 
   //                       // Creating empty array of each template 
   //                       if( empty($createdArrays)){
   //                           foreach($template_array as $single){
   //                               $arrayName =  $single; 
   //                               $createdArrays[$arrayName] = [];
   //                           }  
   //                       }
   //                       // dd($createdArrays);
                         
   //                       foreach($template_array as $index=>$single){
   //                           $template = Template::where(['id'=>$single])->first();                   
   //                           $templatesName[$single] = $template->template_name;
                             
   //                           $deptResult = DepartmentScore::where(['audit_id' => $audit->id,'template_id' => $single])->first();                    
   //                           if (array_key_exists($single, $createdArrays)) {
   //                               $createdArrays[$single][] = $deptResult->score;
   //                           } else {
   //                               $createdArrays[$single] = [$deptResult->score];
   //                           }
 
 
   //                       }   
 
   //                       // fro getting negative answers
                         
 
   //                   }
   //               }
 
   //               if(count( $score) > 0){
   //                   $average = (array_sum( $score)/count( $score));                
   //               }else{
   //                   $average = 0;
   //               }
   //               $allAuditsAvg[$q] = $average;
 
                 
                 
 
   //           }
 
 
 
 
   //           // NEW CODE FOR ANSWERS WITH DATE 
   //           // $aud_date_arr = [];
   //           // foreach ($qFound as $index => $q) {
   //           //     $months = [];
   //           //     // All audits in particular month 
   //           //     $allAuditsInMonth = Audit::where(['month' => $q, 'client_id' => $id, 'auditing_for' => 0])->get();    
   //           //     // working on each audit 
   //           //     foreach ($allAuditsInMonth as $a) {
   //           //         $unique_audit_details = [];
   //           //         // Questions in this audit having response_score = 0 
   //           //         $audit_details = AuditDetail::where(['audit_id' => $a->id, 'response_score' => 0])->get();
   //           //         // on each question 
   //           //         foreach ($audit_details as $auditDetail) {
   //           //             $a_dates = [];
   //           //             $a_dates[] = $auditDetail->created_at;
   //           //             $unique_audit_details[] = [
   //           //                 'detail' => $auditDetail,
   //           //                 'question_id' => $auditDetail->question_id,
   //           //                 'allDates' => $a_dates,
   //           //             ];
   //           //         }
   //           //         $a->audit_details = $unique_audit_details;
   //           //     }
   //           //     $months['month'] = $q;
   //           //     $months['audit'] = $allAuditsInMonth;
   //           //     $aud_date_arr[] = $months;
   //           // }
 
 
   //           // dd($aud_date_arr);
         
 
   //           // for getting final negative answers from last audit  
   //           $myaudits_latest  = Audit::where(['month' => end($qFound),'client_id' => $id,'auditing_for' => 0])->latest()->first();   
   //           if($myaudits_latest){
   //               $nwgAns = AuditDetail::where(['audit_id'=>$myaudits_latest->id,'response_score'=>0])->get();
                 
   //               $negAnsArr[] = $nwgAns;
   //           } 
 
             
         
   //           // $dates = [];        
   //           // foreach ($negAnsArr as $innerArray) {
   //           //     foreach ($innerArray as $element) {    
   //           //         $ques = [];                              
   //           //         foreach ($audits as $audit) {   
   //           //             // audit:66, ques. no. 100                    
   //           //             $nwgAns = AuditDetail::where(['audit_id'=>$audit,'question_id'=>$element->question_id])->first();
   //           //             $ques['q_no'] = $nwgAns->question_id;
   //           //             $ques['q_date'] = $nwgAns->created_at;
   //           //             $dates[] = $ques;                    
   //           //         }                
   //           //     }
   //           // }
   //           // dd($dates);
   //           // all audits IDs as string 
   //           $commaSeparatedAudits = implode(',', $audits);
   //           // dd($commaSeparatedAudits);
   //           // dd($createdArrays);     
   //           /*array:2 [
   //               4 => array:2 [
   //               0 => 40
   //               1 => 80
   //               ]
   //               5 => array:2 [
   //               0 => 0
   //               1 => 100
   //               ]
   //           ] */
 
   //           // ---------------- Negative Answers in table working ------------
   //           foreach($negAnsArr as $one){           
   //               foreach($one as $onee){
   //                   $itsTemp = Template::where(['id'=>$onee->template_id])->first('template_name');
   //                   $onee->temname = $itsTemp->template_name;
 
   //                   $audit = Audit::where(['id'=>$onee->audit_id])->first();
   //                   $onee->start = $audit->start;
 
   //                   $qNC = TemplateDetail::where(['id'=>$onee->question_id])->first();
   //                   $onee->nc = $qNC->nc;
 
   //                   $dates = [];
   //                   foreach ($audits as $audit) {   
   //                       $ques = [];                              
   //                       // audit:66, ques. no. 100                    
   //                       $nwgAns = AuditDetail::where(['audit_id'=>$audit,'question_id'=>$onee->question_id])->first();
   //                       // $ques['q_no'] = $nwgAns->question_id;
   //                       if($nwgAns){
 
   //                           $ques[] = $nwgAns->created_at;
   //                           $dates[] = $ques;      
   //                       }
   //                   }      
   //                   $onee->datess = $dates;                    
   //               }
   //           }
   //           // dd($negAnsArr);
 
   //           // ---------------- Negative Answers in table working ------------
             
 
 
   //           $avgOFTemplate = [];
   //           foreach($createdArrays as $key =>$single){
   //               $avg = array_sum($single)/count($single);
   //               $avgOFTemplate[$key] = $avg;
   //           }
   //           // dd($avgOFTemplate);         
   //           /*array:2 [
   //               4 => 60
   //               5 => 50
   //           ] */
   //           $avgValuesArray = array_values($avgOFTemplate);
             
 
   //           $uniqueTemplateArray = array_unique($templatesName);
   //           $nameValuesArray = array_values($uniqueTemplateArray);
   //           // dd($uniqueTemplateArray);
 
 
             
   //           // save data in table
   //           $quartersWithFound = '';
 
   //           foreach ($qFound as $element) {
   //               if (in_array($element, $Q1)) {
   //                   $quartersWithFound = 1;
   //               } elseif (in_array($element, $Q2)) {
   //                   $quartersWithFound = 2;
   //               } elseif (in_array($element, $Q3)) {
   //                   $quartersWithFound = 3;
   //               } elseif (in_array($element, $Q4)) {
   //                   $quartersWithFound = 4;
   //               }
   //           }
 
   //           $checkConsolidated =  ConsolidatedReport::where(['client_id'=>$id,'quarter'=>$quartersWithFound])->exists();
   //           if(!$checkConsolidated){
   //               $console = new ConsolidatedReport ;
   //               $console->title = "Consolidated Report for quarter - ".$quartersWithFound;
   //               $console->client_id = $id;
   //               $console->audit_ids = $commaSeparatedAudits;
   //               $console->quarter = $quartersWithFound;
   //               $console->save();
   //           }
             
 
 
 
   //           // data to chart one 
   //           $result = [];
   //           foreach ($allAuditsAvg as $key => $value) {
   //               $carbonDate = Carbon::create(null, $key, 1);            
   //               $monthName = $carbonDate->format('M');
   //               $data = [];
   //               $data[] =   $monthName;
   //               $data[] =   $value;
   //               $result[] = $data;
   //           }       
   //           $formattedData = json_encode( $result);
 
   //           // generate pdf and download 
   //           $data = [
   //               'client'=> $client,
   //               'formattedData'=>$formattedData,
   //               'nameValuesArray'=>$nameValuesArray,
   //               'avgValuesArray'=>$avgValuesArray,
   //               'negAnsArr'=>$negAnsArr
   //            ];
   //           //  dd($data);
   //           //  return view('consolidate-pdf',$data);
   //            $pdf = PDF::loadView('consolidate-pdf',$data);
   //           //  return $pdf->download('consolidated.pdf');
   //            $pdf->save(public_path('pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));
   //           // generate pdf and download 
 
 
   //          //  return view('consolidated',['client'=> $client,'formattedData'=>$formattedData,'nameValuesArray'=>$nameValuesArray,'avgValuesArray'=>$avgValuesArray,'negAnsArr'=>$negAnsArr]);
   //       // }else{
   //       //     return redirect()->back()->with('error','This is not last month of this quarter');
   //       // }
   //       // -------------------- original code ------------
 



   //    // $mail_data = array(
   //    //    'client_name'=>$client->name,
   //    //    'client_id'=>$client->id
   //    // );

   //    // Mail::send('consolidate-mail', function($message) {

   //    //    $message->to('smsunnythefunny@gmail.com', 'Consolidated report')->subject

   //    //       ('Laravel Testing Mail with Attachment');

   //    //    // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');

   //    //    // $message->attach(public_path('/pdfs/consolidate'.$client->id.$quartersWithFound.'.pdf'));

   //    //    $message->from('xyz@gmail.com','Virat Gandhi');

   //    // });

   //    // echo "Email Sent with attachment. Check your inbox.";

   //    return redirect()->back()->with('success','Sent');

   // }

}