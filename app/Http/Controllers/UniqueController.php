<?php

namespace App\Http\Controllers;

use App\Jobs\UniqueJob;
use Illuminate\Bus\UniqueLock;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class UniqueController extends Controller
{
    public function __invoke()
    {
        dispatch(new UniqueJob('bar'));
        // app(UniqueLock::class)->release(new UniqueJob('bar')); // снимает cache блокировку
        return time();
    }
}
