<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
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
        $user->password = bcrypt($request->password);

        if($user->save()){
            return redirect()->route("users.show", $user->id);
        } else {
            return redirect()->route("users.create");
        }
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

        $countExistedEmail = DB::table('users')->where('email', '<>', $request->email);
        return $countExistedEmail;

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,id'.$id,
            'username' => 'required|max:255',
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        

        if (Hash::check($request->old_password, $request->password))
        {
            $user = User::findOrFail($id);
            $user->name = strtolower($request->name);
            $user->email = strtolower($request->email);
            $user->username = strtolower($request->username);
            $user->password = bcrypt($request->password);

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
    public function destroy($id)
    {
        //
    }
}
