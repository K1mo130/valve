<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

        /**
     * Update the user's birthday.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateBirthday(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'birthday' => 'required|date',
        ]);

        $user->birthday = $request->input('birthday');
        $user->save();

        return redirect()->back()->with('status', 'birthday-updated');
    }

    /**
     * Update the user's avatar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAvatar(Request $request) {
        $user = Auth::user();

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the uploaded file
        $avatarFile = $request->file('avatar');

        // Generate a unique filename for the avatar
        $filename = uniqid('avatar_') . '.' . $avatarFile->getClientOriginalExtension();

        // Store the avatar file in the "avatars" directory within the storage/app/public directory
        $avatarFile->storeAs('public/avatars', $filename);

        // Save the avatar filename or path in the user's "avatar" column
        $user->avatar = $filename; // You can use the filename or the full path, depending on your preference
        $user->save();

        return redirect()->back()->with('status', 'avatar-updated');
    }

    /**
     * Update the user's about information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAbout(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'about' => 'required|string',
        ]);

        $user->about = $request->input('about');
        $user->save();

        return redirect()->back()->with('status', 'about-updated');
    }
}
