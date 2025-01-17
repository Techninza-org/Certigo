<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferLetter extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'name',
            'designation',
            'starting_date',
            'report_to_name',
            'report_to_dept',
            'ctc_digits',
            'ctc_words',
            'travel_allowance',
            'probation_period',
            'confirmation',
    ];
}
