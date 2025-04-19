<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminNotification extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }

}
