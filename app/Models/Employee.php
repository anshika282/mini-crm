<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
        'profile_picture',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
