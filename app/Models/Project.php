<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'projects_members', 'project_id', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status_id === 1) {
            return "success";
        } elseif ($this->status_id === 2) {
            return 'warning';
        }
        return 'danger';
    }

    public function getProgressBarAttribute()
    {
        if ($this->progress <= 20) {
            return "danger";
        } elseif ($this->progress <= 50) {
            return 'warning';
        } elseif ($this->progress <= 80) {
            return 'blue';
        }
        return 'green';
    }
}
