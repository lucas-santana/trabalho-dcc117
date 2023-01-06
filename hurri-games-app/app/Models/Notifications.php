<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message'
    ];

    public function userFrom()
    {
        return $this->belongsTo(User::class,'from_user_id');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class,'to_user_id');
    }
}
