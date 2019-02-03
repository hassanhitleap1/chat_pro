<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'sender_id', 'received_id', 'subject', 'message', 'read'
    ];


    protected $appends=['sender_id', 'received_id'];



    public function getSenderAttribute(){
        return User::where('id',$this->sender_id)->first();
    }


    public function getReceivedAttribute()
    {
        return User::where('id', $this->sender_id)->first();
    }

}
