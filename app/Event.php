<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	 protected $table="event";
     protected $fillable = [
        'name', 'date', 'start', 'end', 'detail'
    ];
}
