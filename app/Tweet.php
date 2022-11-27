<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [
        'id'
    ];
    
    public function users(){
        return $this->belongsTo('App\User');
    }
}
