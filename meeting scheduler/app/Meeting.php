<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Meeting extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'meeting_name', 'client_id', 'meeting_vanue', 'attendences', 'date', 'end_time', 'meeting_details', 'host_id', 'meeting_status',
    ];
    //
    public function user(){  
        return $this->belongsTo('App\User', 'host_id');
    }
    /*public function content(){       
        return $this->hasMany('App\Backend_Models\AssignmentGallery', 'assignment_id');
    }*/
}
