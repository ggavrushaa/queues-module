<?php

namespace App\Http\Controllers;

use App\Jobs\BalanceJob;
use App\Jobs\Horizon\NewsletterJob;
use App\Jobs\Horizon\NotificationJob;
use Illuminate\Http\Request;

class HorizonBalanceController extends Controller
{
    public function __invoke(Request $request)
    {
        for ($i = 0; $i < 100; $i++) {
            dispatch(new BalanceJob())->onQueue('balance1');
        }
        for ($i = 0; $i < 50; $i++) {
            dispatch(new BalanceJob())->onQueue('balance2');
        }

        return now();
    }
}
