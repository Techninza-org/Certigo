<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
            'temp_folder_id' ,
            'template_type' ,
            'template_name' ,
            'description' ,
            'multi_select'
    ];
}
