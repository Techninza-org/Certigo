<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Training extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'topic',
        'audit_start_date',
        'location',
        'amount',
        'client',
        'members' ,
        'attendees',
        'trainee_sign',
        'trainer_sign'
    ];
}
