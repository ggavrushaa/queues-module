<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Bitrix24\UpdateLeadJob;
use League\Uri\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::query()->latest()->first()
            ?: User::factory()->create();

        return view('user.profile.index', compact('user'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::query()->latest()->first();

        $user->update($request->only('name', 'email'));

        dispatch(new UpdateLeadJob($user));

        return back();
    }
         
}
