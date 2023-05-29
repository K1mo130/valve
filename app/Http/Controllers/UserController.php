<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\User;

class UserController extends Controller {
    public function profile($name) {
        $user = User::where('name', '=', $name)->firstOrFail();
        return view('profile.profile', compact('user'));
    }
}
