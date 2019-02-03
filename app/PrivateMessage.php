<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PrivateMessage extends Model
{
    protected $fillable=[
        'sender_id', 'received_id', 'subject', 'message', 'read'
    ];


    protected $appends = ['sender_id', 'received_id'];



    public function getSenderAttribute()
    {
        return User::where('id', $this->sender_id)->first();
    }


    public function getReceivedAttribute()
    {
        return User
        ::where('id', $this->sender_id)->first();
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
}
