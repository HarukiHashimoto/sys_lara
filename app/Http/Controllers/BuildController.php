<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BuildController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function build_smp()
    {
        echo auth::user();
        log::info("111");
        return view('build_smp');
    }
}
