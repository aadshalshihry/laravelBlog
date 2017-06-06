<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);

        
        $user = new User;
        $user->name = strtolower($request->name);
        $user->email = strtolower($request->email);
        $user->username = strtolower($request->username);
        $user->password = hash::make($request->password);

        $user->save();
        Auth::guard('web')->login($user);

        return redirect()->route("users.show", $user->id);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view("users.show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $countExistedEmail = DB::table('users')->where('email', '<>', $request->email);
        // return $countExistedEmail;

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'unique:users,email,' . $id . '|required|email',
            'username' => 'required|max:255',
            'old_password' => 'required|old_password:' . Auth::user()->password,
            'password' => 'required|confirmed'
        ]);
        

        if (Hash::check($request->old_password, $request->password))
        {
            $user = User::findOrFail($id);
            $user->name = strtolower($request->name);
            $user->email = strtolower($request->email);
            $user->username = strtolower($request->username);
            $user->password = Hash::make($request->password);

            if($user->update()){
                return redirect()->route("users.show", $user->id);
            } else {
                return redirect()->route("users.create");
            } 
        }
        
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        User::find($id)->delete();
        Auth::logout();
        return redirect()->route("home");
    }
}
