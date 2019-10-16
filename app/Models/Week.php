<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $fillable = ['deposited_amount', 'deposit_at', 'challenge_id'];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
