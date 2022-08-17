<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{

    public function index()
    {
        //
        $users = User::where('type', 'user')->get();
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
                'name' => ['required', 'alpha', 'max:255'],
                'email' => ['required', 'string', 'email:rfc,dns', 'max:255'],
            // 'type' => 'required'

        ]);


        $user->name = $request->name;
        $user->email = $request->email;

        if (isset($request->password)) {

            $this->validate($request, [
              'password' => ['required', 'string', (new Password)->length(10)->requireNumeric(), 'confirmed'],
        ]);
            $user->password = sha1($request->password);
            $user->save();
        }


        $user->forceFill([
            'name' =>  $request->name,
            'email' => $request->email,
            // 'phone'=> $request->phone,
        ])->save();

        return redirect()->back()->with(['status'=>'updated successfully']);
    }

    public function destroy(User $user)
    {

        $user->delete();


        return redirect()->back();
    }
}
