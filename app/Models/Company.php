<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'c_name',
        'c_email',
        'cin_number',
        'c_logo',
        'c_website',
        'c_address',
    ];
}
