<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function update(Request $request) {
        // Validate the request data
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect with a success message
        return redirect()->route('dashboard')->with('status', 'Password updated successfully.');
    }
}
