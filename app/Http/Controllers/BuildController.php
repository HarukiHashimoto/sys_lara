<?php

namespace App\Http\Controllers;

use Request;
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
        return view('build_smp');
    }

    public function save_model()
    {
        $smp = Request::input('sample');
        echo $smp;
        log::info(auth::id());
        // return auth::user();
    }
}
