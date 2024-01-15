<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        try {
            // Mengambil data pengguna dengan paginasi
            $paginatedUsers = User::paginate();

            return view('users.index', compact('paginatedUsers'))
                ->with('success', 'User data retrieved successfully.');
        } catch (\Exception $e) {
            // Tangani kesalahan dengan lebih baik
            // Contoh: Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to retrieve user data. Please try again.');
        }
    }
}
