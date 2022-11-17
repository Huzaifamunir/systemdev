<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{    

    use HasFactory;
    protected $table="Companies";
    protected $fillable=[
        'company_email',
        'company_name',
        'company_password',
        'company_address',
        'company_phone',
        'company_phenomena'
    ];
}
