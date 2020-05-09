<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status_id === 1) {
            return "success";
        } elseif ($this->status_id === 2) {
            return 'warning';
        } elseif ($this->status_id === 3) {
            return 'info';
        }
        return "danger";
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
