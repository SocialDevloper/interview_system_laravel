<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use softDeletes;
    public $fillable = ['first_name','middle_name','last_name', 'email', 'selectEducation', 'applyFor', 'totalExperience', 'currentCTC', 'expectedCTC', 'noticePeriod', 'interviewDate', 'selectStatus', 'reason_to_leave_job'];

    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
}
