<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Sample extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name' ,
        'date' ,
        'location' ,
        'type' ,
        'temperature',
        'weight',
        'quantity',
        'amount' ,
        'client' ,
        'members',
        'parameters',
        'sample_by_sign',
        'sample_to_sign'
    ];
}
