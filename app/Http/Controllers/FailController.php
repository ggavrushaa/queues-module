<?php

namespace App\Http\Controllers;

use App\Jobs\FailJob;
use Illuminate\Http\Request;

class FailController extends Controller
{
    public function __invoke()
    {
        dispatch(new FailJob);

        return now();
    }
}
