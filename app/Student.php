<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = ['name','email','password', 'gender', 'age', 'phone_number', 'birth_date', 'hobbies', 'address', 'cource', 'image'];
}
