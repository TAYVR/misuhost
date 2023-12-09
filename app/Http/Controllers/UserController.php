<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Soung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("signup");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'profil' => ['square_image' ,'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
        ]);

      if($request->hasFile('profil')){
        $fileOriginalName = $request->profil->getClientOriginalExtension();
        $profil = time() .'.'. $fileOriginalName;
        Storage::disk('public')->putFileAs('profiles', $request->profil, $profil);

      }else{
        $profil=null;
      }






        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'profil' => $profil,
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('home');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with(['soungs' => function ($query) {
            $query->orderBy('created_at','desc');}])->find($id);

    //    $song= Soung::where('user_id',$id)->with('likes')->get();



        return view("user.myaccount",compact("user"));
    }




    function userpage($id) {
        $user = User::with(['soungs' => function ($query) {
            $query->orderBy('created_at','desc');}])->find($id);

        return view("user.userpage",compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       if(Auth::user()->id==$id){
        $user = User::find($id);
        return view("user.editaccount", compact("user"));
       }else{
        return redirect()->route("home");
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Auth::user()->id==$id){
            $user = User::find($id);

            $request->validate([
                'name' => 'required|min:3|max:50',
                'profil' => ['square_image','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            ]);





            $user->name = $request->name;
            Auth::user()->name = $request->name;
            if(!empty($request->password)) {
                $request->validate(['password' => 'confirmed|min:8']);
                $user->password = $request->password;

            };


            if($request->hasFile('profil')){
                $fileOriginalName = $request->profil->getClientOriginalExtension();
                $profil = time() .'.'. $fileOriginalName;
                Storage::disk('public')->putFileAs('profiles', $request->profil, $profil);
                if($user->profil!=null){

                        Storage::disk('public')->delete('profiles/' . $user->profil);

                }

                $user->profil=$profil;
                Auth::user()->profil=$profil;

            }
            $user->save();

            return redirect()->route('show', $id);
           }else{
            return redirect()->route("home");
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function loginPage()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'email or password is incorrect');



    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        session()->regenerate();
        return redirect()->route("home");
    }


    function addToFavorite($id) {
        $user = Auth::user();
        $song=Soung::find($id);

        if (!$user->favorites->contains($song->id)) {
            $user->favorites()->attach($song);

            return response()->json(['addfaverite'=>true]);
        } else {
            $user->favorites()->detach($song);
            return response()->json(['addfaverite'=>false]);
        }



    }



    function myFavorit() {
        $id =Auth::user()->id;
        $user=User::find($id);
        $songs=$user->favorites;


        return view('user.myfavorites',compact('songs'));

    }
}
