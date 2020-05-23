<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'to'
    ];

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setToUserAttribute()
    {
        return $this->attributes['to_user'] = 'test';
    }
}
