<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferLetter extends Model
{
    protected $fillable = [
        'date',
        'appointed_at',
        'company_address',
        'cin_number',
        'primary_contact',
        'company_email',
        'md_contact',
        'website',

        'candidate_name',
        'address',
        'phone',
        'email',
        'adhar',
        'position',

        'responsibility',

        'joining_date',
        'job_location',
        'working_hour',
        'salary',
        'payment_duration',

        'travelling',
        'lunch',
        'tiffin',
        'dinner',
        'lodging',

        'attendence_present_in',
        'notice_period'
    ];

    protected $casts = [
        'date' => 'date',
        'joining_date' => 'date',

        'responsibility' => 'array',

        'travelling' => 'boolean',
        'lunch' => 'boolean',
        'tiffin' => 'boolean',
        'dinner' => 'boolean',
        'lodging' => 'boolean',
    ];
}
