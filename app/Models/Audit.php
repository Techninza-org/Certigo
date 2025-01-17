<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Audit extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'client_id',
        'audit_index',
        'audit_number',

        'audit_name',
        'start',
        'end',
        'audit_type',
        'location',
        'checklists',
        'auditors',
        'amount',
        'auditing_for',
        'multi_select',
        'auditor_sign',
        'auditee_sign',
        'month',
        'year',
        'final_score',
        'personal_responsible',
        'doc_ref',
        'food_mobile',
        'food_email',
        'fstl',
        'director_mobile',
        'director_email',
        'director',
        'deadline_time',
        'questions',

        

        

    ];
}
