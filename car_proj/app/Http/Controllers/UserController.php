<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        //
        $users = User::where('type', 'user')->paginate(5);
        return view('user.index')->with('users', $users);
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::where('id', $user->id)->first();
        if ($user === null) {
            return redirect()->back();
        }
        return view('user.edit')->with('user', $user);
    }


    public function update(Request $request, User $user)
    {

        $user = User::find($user->id);
        //dd($request->name);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            // 'type' => 'required'

        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = sha1($request->password);
            $user->save();
        }
        $user->forceFill([
            'name' =>  $request->name,
            'email' => $request->email,
            // 'phone'=> $request->phone,
        ])->save();

        return redirect()->back();
    }

    public function destroy(User $user)
    {

        $user->delete();


        return redirect()->back();
    }
}
