<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function __construct()
	{
        $this->middleware('auth');
    }

    public function update_my_photo(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $photoName = $user->id.'_photo'.time().'.'.request()->photo->getClientOriginalExtension();
        $request->photo->storeAs('avatars',$photoName);
        $user->photo = $photoName;
        $user->save();

        return back()->with('success','Foto salva.');

    }
}
