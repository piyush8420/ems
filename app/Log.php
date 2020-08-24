<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table="log";
     protected $fillable = [
       'event_id','Notification_type','user_data_log'
    ];
}
