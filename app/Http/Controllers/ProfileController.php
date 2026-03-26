<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
     public function index(){
        return view('profile.index', 
        [  'user' => Auth::user()

        ] );
    
        
    }

      public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Image Upload
        if ($request->hasFile('photo')) {
            $image = $request->photo;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile'), $imageName);

            $user->photo = $imageName;
        }

        $user->save();

         return redirect()->route('profile.home')->with('success', 'Profile updated successfully!');
    }

     public function home(){
        return view('profile.home', [
            'user' => Auth::user()
        ]);
    }
}
