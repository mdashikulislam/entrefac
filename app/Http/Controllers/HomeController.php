<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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
        $contact = Contact::where('user_id',\Auth::id())->first();
        return view('contact')
            ->with([
                'contact'=>$contact
            ]);
    }
    private function contactExtracted(Contact $contact, Request $request){
        $contact->user_id = \Auth::id();
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->website = $request->website;
        $contact->twitter = $request->twitter;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->country = $request->country;
        $contact->state = $request->state;
        $contact->description = $request->description;
        $contact->city = $request->city;
        $contact->street = $request->street;
        $contact->apartment = $request->apartment;
        $contact->support = $request->support;
        $contact->dispute = $request->dispute;
    }
    public function updateContact(Request $request)
    {
        $contact = Contact::where('user_id',\Auth::id())->first();
        if ($contact){
            $this->contactExtracted($contact,$request);
        }else{
            $contact = new Contact();
            $this->contactExtracted($contact,$request);
        }
        $contact->save();
        toast('Contact Update successful','success');
        return redirect()->back();
    }
    public function document()
    {
        $document = Document::where('user_id',\Auth::id())->first();
        return view('document')
            ->with([
                'document'=>$document
            ]);
    }
    private function  documentExtracted(Document $document, Request $request){
        $document->user_id = \Auth::id();
        if ($request->has('business_plan')){
            $document->business_plan = uploadSingleFile($request->business_plan,'document','bp');
        }
        if ($request->has('certificate_of_in_corporation')){
            $document->certificate_of_in_corporation = uploadSingleFile($request->certificate_of_in_corporation,'document','cc');
        }
        if ($request->has('form_3')){
            $document->form_3 = uploadSingleFile($request->form_3,'document','fm');
        }
        if ($request->has('tin')){
            $document->tin = uploadSingleFile($request->tin,'document','tin');
        }
        if ($request->has('others')){
            $document->others = uploadSingleFile($request->others,'document','ot');
        }
    }
    public function updateDocument(Request $request)
    {
        $document = Document::where('user_id',\Auth::id())->first();
        if ($document){
            $this->documentExtracted($document,$request);
        }else{
            $document = new Document();
            $this->documentExtracted($document,$request);
        }
        $document->save();
        toast('Document upload successfully','success');
        return redirect()->back();
    }
    public function userList()
    {
        $user = User::role(\USER)->orderBy('created_at','DESC')->get();
        return view('users')
            ->with([
                'users'=>$user
            ]);
    }

    public function entrepreneurs()
    {
        $entrepreneurs = Profile::with('users')->whereHas('users',function ($users){
            $users->whereHas('roles',function ($role){
                $role->where('name',\USER);
            });
        })->orderByDesc('created_at')->get();
        return view('entrepreneurs')
            ->with([
                'entrepreneurs'=>$entrepreneurs
            ]);
    }

    public function accountStatusChange($id,$status)
    {
        $user = User::findOrFail($id);
        if ($user){
           switch ($status){
               case 1:
                   $user->account_status = 'Approved';
                   break;
               default:
                   $user->account_status = 'Pending';
           }
            $user->save();
            toast('Account status change successfully','success');
            return redirect()->back();
        }else{
            toast('Account not found','error');
            return redirect()->back();
        }
    }

    public function profileSingle($id)
    {
        $user = User::with('profile')->with('contact')->where('id',$id)->first();
        if (empty($user)){
            toast('User not found','error');
            return redirect()->route('entrepreneurs');
        }
        return view('profile_single')
            ->with([
                'user'=>$user
            ]);
    }
}
