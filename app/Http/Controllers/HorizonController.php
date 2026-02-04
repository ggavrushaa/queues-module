<?php

namespace App\Http\Controllers;

use App\Jobs\Horizon\NewsletterJob;
use App\Jobs\Horizon\NotificationJob;
use Illuminate\Http\Request;

class HorizonController extends Controller
{
    public function __invoke(Request $request)
    {
        for ($i = 0; $i < 100; $i++) {
            dispatch(new NotificationJob());
            dispatch(new NewsletterJob());
        }

        return now();
    }
}
