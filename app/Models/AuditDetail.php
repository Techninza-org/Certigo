<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class AuditDetail extends Model

{

    use HasFactory;



    protected $fillable=[

        'audit_id' ,

        'question_id' ,

        'template_id' ,

        'template_name' ,



        'response_score' ,

        'response_id' ,



        'objective_evidences' ,



        'suggestions',

        'evidences' ,
        'doc_ref',
        'person_responsible',
        'timeline',
        'report_path'

        

    ];

}

