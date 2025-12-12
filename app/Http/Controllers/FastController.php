<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FastController extends Controller
{
    public function __invoke()
    {
        dispatch(new \App\Jobs\FastJob());
        return now();
    }
}
