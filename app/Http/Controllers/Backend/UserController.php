<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateResquest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $users = User::all();
        // this is search function where request has search field with value -> be with search 
        // for the result with the username or email like value in search fiedl.
        // Notion about the way write variable in 
        if($request->has('search')){
            $users = User::where('username','like',"%{$request->search}%")->orWhere('email','like',"%{$request->search}%")->get();
        };
        return view('users.index', compact('users'));
       $users = User::all();
        // this is search function where request has search field with value -> be with search 
        // for the result with the username or email like value in search fiedl.
        // Notion about the way write variable in 
        if($request->has('search')){
            $users = User::where('username','like',"%{$request->search}%")->orWhere('email','like',"%{$request->search}%")->get();
        };
        return view('users.index', compact('users'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message','User Register Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateResquest $request, User $user)
    {
        $user->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('message','Update User successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if( auth()->user()->id == $user->id){
            return redirect()->route('users.index')->with('message','You are deleting yourself');
        }
        $user->delete();
        return redirect()->route('users.index')->with('message','Delete User successfully');

    }
}
