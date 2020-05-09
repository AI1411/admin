<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
