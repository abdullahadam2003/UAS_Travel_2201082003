<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        try {
            // Pembaruan Password
            if ($request->filled('password')) {
                auth()->user()->update(['password' => Hash::make($request->password)]);
            }

            // Pembaruan Nama dan Email
            auth()->user()->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->back()->with('success', 'Profile updated.');
        } catch (\Exception $e) {
            // Tangani kesalahan dengan lebih baik
            // Contoh: Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Profile update failed. Please try again.');
        }
    }
}
