<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $fillable = ['order', 'deposited_amount', 'deposit_at', 'deposit_status', 'challenge_id'];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
