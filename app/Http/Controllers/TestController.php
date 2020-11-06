<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;

class TestController extends Controller
{
    public function index()
    {
    	$candiates = Candidate::with(['posts'])->get();

    	$postdata = [];
    	foreach ($candiates as $candiate) {
    		$postdata[$candiate->first_name." ".$candiate->last_name]['post'] = $candiate->posts->implode('title', ', ');
    	}

    	return $postdata;
    }
}
