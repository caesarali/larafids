<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting');
    }

    public function username(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'username' => 'required|string|min:6|unique:users,username,' . $user->id,
            'password_username' => 'required'
        ]);

        if (!Hash::check($request->password_username, $user->password)) {
            return redirect()->back()->withErrors(['password_username' => 'Please input a valid password.']);
        }

        $user->update(['username' => $request->username]);
        $message = [
            'alert-type' => 'success',
            'message' => 'Username berhasil diubah.'
        ];
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Username has been updated.',
            'type' => 'success'
        ]);
    }

    public function password(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required'
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Please input a valid password.']);
        }

        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Password has been updated.',
            'type' => 'success'
        ]);
    }
}
