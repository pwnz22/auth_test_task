<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
