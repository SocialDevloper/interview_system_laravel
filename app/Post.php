<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['title','description','candidate_id'];

    public function candidate()
    {
    	return $this->belongsTo('App\Candidate');
    }
}
