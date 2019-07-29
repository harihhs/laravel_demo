<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

	public function __construct(){
        $this->middleware('auth');
    }

	public function profile() {
		return view('profile');
	}

	public function edit(User $user)
    {
		$user = Auth::user();
        return view('profile.edit',compact('user'));
    }

	public function update(User $user)
    { 
		if (request('email') == $user->email) {
			$this->validate(request(), [
				'name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255'],
				'age' => ['required', 'integer'],
			]);
		} else {
			$this->validate(request(), [
				'name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'age' => ['required', 'integer'],
			]);
		}
        $user->name = request('name');
        $user->email = request('email');
        $user->age = request('age');

        $user->save();

        return redirect('/profile')->with('success','Profile updated successfully');;
	}
	
	
}