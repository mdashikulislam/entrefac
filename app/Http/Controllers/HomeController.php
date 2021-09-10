<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function landing()
    {
        return view('landing')
            ->with([
                'user'=>\Auth::user()
            ]);
    }

    public function accountUpdate(Request $request)
    {
        $this->validate($request,[
            'business_name'=>['required','max:191'],
            'country'=>['required','max:191'],
            'first_name'=>['required','max:191'],
            'last_name'=>['required','max:191'],
            'phone'=>['required','max:191'],
            'registered_business'=>['required','max:191'],
            'email'=>['required','unique:users,email,'.\Auth::id()],
        ]);
        $user = User::findOrFail(\Auth::id());
        if (empty($user)){
            abort(404);
        }
        $user->business_name = $request->business_name;
        $user->country = $request->country;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->registered_business = $request->registered_business;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        toast('Account update successfully','success');
        return redirect()->route('landing');
    }

    public function profile()
    {
        return view('profile');
    }
}
