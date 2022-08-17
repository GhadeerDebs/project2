<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\AUTH;
use Laravel\Fortify\Rules\Password;
use App\Models\dealership;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_e()
    {
        //
        $user = Auth::user();
        $dealerID = $user->dealership_id;
        $type = $user->type;
        $who = "All Employees";
        if ($type == 'employee') {
            $users = User::orderby('created_at', 'DESC')->where('dealership_id', $dealerID)->paginate(5);
        } else {

            $users = User::where('type', 'employee')->paginate(5);
        }
        return view('employee.index')->with('users', $users)->with('who', $who);
    }
    public function index_a()
    {
        //
        $users = User::where('type', 'admin')->paginate(5);
        $who = "All Admins";
        return view('employee.index')->with('users', $users)->with('who', $who);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_e()
    {
        $dealers = dealership::all();
        return view('employee.create')->with('dealerships', $dealers);
    }
    public function create_a()
    {
        return view('employee.createadmin');
    }

    public function store_e(Request $request)
    {
        $user = Auth::user();
        $dealerID = $user->dealership_id;
        $type = $user->type;
        if ($type == 'employee') {
            $request->validate([
                'name' => ['required', 'alpha', 'max:255'],
                'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
                'password' => ['required', 'string', (new Password)->length(10)->requireNumeric(), 'confirmed'],
                'phone' => ['required', 'digits:10'],
                //'photo' => 'required|image',
            ]);
            $employee = 'employee';

            // $photo =  $request->file('photo');
            // $newphoto = time() . $photo->getClientOriginalName();
            // $photo->move('emp', $newphoto);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'type' => $employee,
                'dealership_id' => $dealerID,
                // 'profile_photo_path' => 'emp/'. $newphoto
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'alpha', 'max:255'],
                'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
                'password' => ['required', 'string', (new Password)->length(10)->requireNumeric(), 'confirmed'],
                'phone' => ['required', 'digits:10'],
                // 'photo' => 'required|image',
              //  'dealership_id' => 'required',
            ]);
            $employee = 'employee';

            // $photo =  $request->file('photo');
            // $newphoto = time() . $photo->getClientOriginalName();
            // $photo->move('emp', $newphoto);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'type' => $employee,
                // 'profile_photo_path' => 'emp/' . $newphoto,
                'dealership_id' => $request->dealership_id,
            ]);
        }



        return redirect()->back()->with(['status'=>'created successfully']);
    }




    public function store_a(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', (new Password)->length(10)->requireNumeric(), 'confirmed'],
            'phone' => ['required', 'digits:10'],
            // 'photo' => 'required|image',

        ]);

        //
        // $photo = $request->profile_photo_path;
        // $newphoto = time() . $photo->getClientOriginalName();
        // $photo->move('admin', $newphoto);

        // $photo =  $request->file('photo');
        // $newphoto = time() . $photo->getClientOriginalName();
        // $photo->move('emp', $newphoto);


        $employee = 'admin';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => $employee,
            // 'photo' => 'emp/' . $newphoto
        ]);



        return redirect()->back()->with(['status'=>'created successfully']);
    }

    public function edit(User $user)
    {
        $user = User::where('id', $user->id)->first();
        if ($user === null) {
            return redirect()->back();
        }
        $dealers = dealership::all();
        return view('employee.edit')->with('user', $user)->with('dealerships', $dealers);
    }


    public function update(Request $request, User $user)
    {
        $user = User::find($user->id);
        if (Auth::user()->type == 'employee') {
            if($user->email==$request->email){
                $request->validate([
                    'name' => ['required', 'alpha', 'max:255'],
                    'email' =>  ['required', 'string', 'email'],
                    // 'type' => 'required'


                ]);

            }else{
                $request->validate([
                    'name' => ['required', 'alpha', 'max:255'],
                    'email' =>  ['required', 'string', 'email', 'unique:users'],
                    // 'type' => 'required'


                ]);

            }

            $user->forceFill([
                'name' =>  $request->name,
                'email' => $request->email,
                'dealership_id' => Auth::user()->dealership_id,
                // 'phone'=> $request->phone,
            ])->save();
        }
        if (Auth::user()->type == 'admin') {
            if($user->email==$request->email){
                $this->validate($request, [
                    'name' => ['required', 'alpha', 'max:255'],
                    'email' =>  ['required', 'string', 'email:rfc,dns', 'max:255'],
                    'dealership_id' => 'required',
                ]);
            }else{
                $this->validate($request, [
                    'name' => ['required', 'alpha', 'max:255'],
                    'email' =>  ['required', 'string', 'email:rfc,dns', 'max:255','unique:users'],
                    'dealership_id' => 'required',


                ]);
            }

            $user->dealership_id = $request->dealership_id;
            $user->name = $request->name;
            $user->email = $request->email;

            $user->forceFill([
                'name' =>  $request->name,
                'email' => $request->email,
                'dealership_id' => $request->dealership_id,
                // 'phone'=> $request->phone,
            ])->save();
        }
        // if($request->hasFile('photo')){

        //     $photo =  $request->photo;
        //     $newphoto = time() . $photo->getClientOriginalName();
        //     $photo->move('emp', $newphoto);
        //     $user->profile_photo_path= 'emp/' . $newphoto;
        //     $user->save();
        // }
        if ($request->has('password')) {
            $user->password = sha1($request->password);
            $user->save();
        }


        return redirect()->back()->with(['status'=>'updated successfully']);
    }

    public function destroy(User $user)
    {
        if (Auth::user()->type == 'employee' && Auth::user()->dealership_id == $user->dealership_id) {
            $emp = User::find($user->id);
            $emp->destroy($user->id);
        }
        if (Auth::user()->type == 'admin') {
            $emp = User::find($user->id);
            $emp->destroy($user->id);
        }


        return redirect()->back();
    }
}
