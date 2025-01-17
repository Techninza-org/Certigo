<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_code',
        'employee_address',
        'designation',
        'ctc_digits',
        'ctc_words',        
        'probation_periods',
        'signing_authority',
        'authority_name',
        'authority_designation',
        'date_of_appointment',
        'reporting_authority',
        'reporting_name',

        'salary',
        'basic',
        'hra',
        'conveyance',
        'special_allowance',

        'medical',
        'lta',
        'monthly_gross_salary',
        'annual_variable_ctc',
        'annual_fixed_ctc',
        

];
}
