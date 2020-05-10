<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use Notifiable;

//    protected $with = ['work', 'company'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills', 'user_id', 'skill_id');
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'projects_members', 'user_id', 'project_id');
    }

    public function scopeSearchName($query)
    {
        $search_name = Request::input('search_name');
        if ($search_name) {
            return $query->where('name', 'like', "%{$search_name}%");
        }
        return $query;
    }
}
