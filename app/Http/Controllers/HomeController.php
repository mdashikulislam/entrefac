<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Profile;
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

        $profile = Profile::where('user_id',\Auth::id())->first();
        return view('profile')
            ->with([
                'profile'=>$profile
            ]);
    }

    private function profileExtracted(Profile $profile, Request $request):void
    {
        $profile->user_id = \Auth::id();
        $profile->trading_name = $request->trading_name;
        $profile->description = $request->description;
        $profile->stuff_size = $request->stuff_size;
        $profile->industry = $request->industry;
        $profile->category = $request->category;
        $profile->business_type = $request->business_type;
        $profile->legal_business_name = $request->legal_business_name;
        $profile->registration_type = $request->registration_type;
    }
    public function updateProfile(Request $request)
    {
        $profile = Profile::where('user_id',\Auth::id())->first();
        if ($profile){
            $this->profileExtracted($profile,$request);
        }else{
            $profile = new Profile();
            $this->profileExtracted($profile,$request);
        }
        $profile->save();
        toast('Profile Update successfully','success');
        return redirect()->back();
    }

    public function contact()
    {

        return view('contact');
    }

    public function document()
    {
        $document = Document::where('user_id',\Auth::id())->first();
        return view('document')
            ->with([
                'document'=>$document
            ]);
    }

    public function updateDocument(Request $request)
    {
        return $request->all();
    }
}
