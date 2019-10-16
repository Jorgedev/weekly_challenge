<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = ['name', 'amount', 'weeks', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function weeks()
    {
       return $this->hasMany(Week::class);
    }
}
