<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateDetail extends Model
{
    use HasFactory;

    protected $fillable = [
            'template_id' ,
            'question' ,
            'remarks' ,
            'suggestions',
            'response',
            'response_group',
            'template_name',
            'question_name',
            'sdg'
           



    ];
}
