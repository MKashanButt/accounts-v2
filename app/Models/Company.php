<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'logo',
        'name',
        'address',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
