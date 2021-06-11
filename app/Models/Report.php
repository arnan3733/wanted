<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisions_id',
        'wanted_number',
        'accused_name',
        'accused_id_card',
        'allegates_id',
        'court_office',
        'prosecutor_office',
        'date_issue',
        'expiration_date',
        'expiration_type',
        'detect_date',
        'detect_status',
        'withdraw_case_date',
        'withdraw_case_status',
        'arrest_date',
        'arrest_status',
        'case_id',
        'assignment_number',
        'authority_name',
        'authority_contact',
        'attachment_file',
    ];
}
