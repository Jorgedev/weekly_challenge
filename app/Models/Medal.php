<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medal extends Model
{
    protected $fillable = [
        'name', 'description', 'icon',
    ];
    
    public function users(){
		return $this->belongsToMany(User::class);
	}
}
