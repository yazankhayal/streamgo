<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

    protected $table = "messages";

    protected $fillable = [
        'content'
    ];

    public function User(){
        return $this->belongsTo(User::class,"user_id","id");
    }

}
