<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Challenge extends Model
{
    use Multitenantable;

    protected $fillable = ['name', 'amount', 'portion', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function weeks()
    {
       return $this->hasMany(Week::class);
    }
}
