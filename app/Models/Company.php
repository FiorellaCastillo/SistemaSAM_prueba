<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Company extends Model{
    use HasFactory;


    protected $fillable = [
        'legal_company_id',
        'logo',
        'company_name',
        'company_email',

    ];
}