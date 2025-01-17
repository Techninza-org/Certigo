<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaySlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
            'company_address',
            'company_logo',

            'month',
            'year',
            'employee_name',
            'employee_number',
            'joined_date',
            'department',
            'sub_department',
            'designation',
            'payment_mode',
            'bank',
            'ifsc',
            'bank_account',
            'pan',
            'uan',
            'pf_number',
            'apd',
            'twd',
            'lpd',
            'dp',
            'basic',
            'hra',
            'medical_allowance',
            'adhoc_allowance',
            'pf_value',
            'professional_tax',
            'net_salary_in_words',
            'total_deductions',
            'total_earnings',
            'net_salary',
            'gross_salary',
            'esi_no',
            'conveyance_allowance',
            'esi_value',
            'loan_recovery',
            'loss_of_pay_days',

            




    ];
}
