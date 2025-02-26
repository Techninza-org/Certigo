<?php



namespace App\Http\Controllers;



use App\Models\Audit;

use App\Models\AuditDetail;

use App\Models\TemplateDetail;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class Controller extends BaseController

{

    use AuthorizesRequests, ValidatesRequests;







    public function completion_percentage($audit_id){

        $audit = Audit::where(['id'=>$audit_id])->first();



        $check_list_arr = json_decode($audit->checklists);

            $total_count = [];

            foreach($check_list_arr as $cl){

                $ques_count = TemplateDetail::where(['template_id'=>$cl])->count();

                $total_count[] = $ques_count;

            }

            // return $total_count;

            $total_questions = array_sum($total_count)*4;

            $answered_ques = 0;

            $answered_record = AuditDetail::where(['audit_id'=>$audit->id])->get(['response_score','objective_evidences','suggestions','evidences']);

            foreach($answered_record as $ar){

                if($ar->response_score !== null){

                    $answered_ques ++;

                }

                if($ar->objective_evidences !== null){

                    $answered_ques ++;

                }

                if($ar->suggestions !== null){

                    $answered_ques ++;

                }



                               

                if(!empty(json_decode($ar->evidences))){

                    $answered_ques ++;

                }

            }            

            $filledQuestions = AuditDetail::where(['audit_id' => $audit_id])->whereNotNull('response_score')->count();

            $completion_percent = round(($filledQuestions/$total_questions)*100,2);

            // $audit->compl_percent  = $completion_percent;

            return $completion_percent;

    }



    public function quick_completion_percentage($audit_id){

        $audit = Audit::where(['id'=>$audit_id])->first();

        // dd($audit);

        $check_list_arr = json_decode($audit->checklists);

            $total_count = [];

            foreach($check_list_arr as $cl){

                $ques_count = TemplateDetail::where(['template_id'=>$cl])->count();

                $total_count[] = $ques_count;

            }

            // return $total_count;

            $total_questions = array_sum($total_count);

            if($total_questions == 0){
                return redirect()->back()->with('error','You may have a template with NO objectives in it.');
            }
            

            $answered_ques = AuditDetail::where(['audit_id' => $audit_id])->whereNotNull('response_score')->count();
            
            $completion_percent = round(($answered_ques/$total_questions)*100,2);

            // $audit->compl_percent  = $completion_percent;

           

           

            return $completion_percent;



        }

}

