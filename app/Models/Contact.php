<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fName', 'lName', 'email', 'phone', 'companyname', 'countryName', 'message', 'enquiryType', 'fromWhereHeard'
    ];
}
