<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
class TestController extends Controller
{
    public function __invoke()
    {
        dispatch(new TestJob())->delay(now()->addSeconds(10));

        return response(now());
    }
}
