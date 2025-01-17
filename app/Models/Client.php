<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $fillable=[
        'title' ,
        'fname' ,
        'lname' ,
        'designation' ,

        'organisation_name' ,
        'organisation_location' ,

        'fssai_no',
        'pincode' ,
        'company_emailid' ,

        'company_website' ,
        'comp_cont_no' ,
        'comp_partners',
        'comp_part_email',

        'no_audit_conduct',
        'no_trainings_conduct',
        'no_samples_collect',
        'contract_amount',

        'client_logo',
        'client_signature',
        'client_id',
        'password',
        
        'personal_responsible',
        'doc_ref',
        'food_mobile',
        'food_email',
        'fstl',
        'director_mobile',
        'director_email',
        'director',
    ];
}
