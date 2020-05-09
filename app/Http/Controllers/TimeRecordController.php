<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeRecordController extends Controller
{
    public function index()
    {
        return view('time_records.index');
    }
}
