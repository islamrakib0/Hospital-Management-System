<?php

namespace App;

use App\User;
use App\Test;

use Illuminate\Database\Eloquent\Model;

class PatientTest extends Model
{
    protected $table = 'patient_tests';
    protected $guarded = [];
}
