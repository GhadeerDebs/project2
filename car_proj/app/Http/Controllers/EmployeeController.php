<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\AUTH;
use Laravel\Fortify\Rules\Password;

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
        $user=Auth::user();
        $dealerID=$user->dealership_id;
        $type=$user->type;
        if($type=='employee'){
            $users= User::orderby('created_at', 'DESC')->where('dealership_id',$dealerID)->get();
        }else{

        $users = User::where('type', 'employee')->get();
    }
        return view('employee.index')->with('users', $users);
    }
    public function index_a()
    {
        //
        $users = User::where('type', 'admin')->get();
        return view('employee.index')->with('users', $users);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_e()
    {
        return view('employee.create');
    }
    public function create_a()
    {
        return view('employee.createadmin');
    }

    public function store_e(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', (new Password)->length(10)->requireNumeric(), 'confirmed'],
            'phone' => ['required', 'digits:10'],
            'photo' => 'required|image',
            //  'type' => 'required'
        ]);


        $employee = 'employee';

        $photo =  $request->file('photo');
        $newphoto = time() . $photo->getClientOriginalName();
        $photo->move('emp', $newphoto);

        $user=Auth::user();
        $dealerID=$user->dealership_id;
        $type=$user->type;
        if($type=='employee'){
            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => $employee,
            'dealership_id' => $dealerID,
            'photo' => 'emp/' . $newphoto
        ]);
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'type' => $employee,
                'photo' => 'emp/' . $newphoto
            ]);

        }



        return redirect()->back();
    }




    public function store_a(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', (new Password)->length(10)->requireNumeric(), 'confirmed'],
            'phone' => ['required', 'digits:10'],
            'photo' => 'required|image',

        ]);

        //
        // $photo = $request->profile_photo_path;
        // $newphoto = time() . $photo->getClientOriginalName();
        // $photo->move('admin', $newphoto);

        $photo =  $request->file('photo');
        $newphoto = time() . $photo->getClientOriginalName();
        $photo->move('emp', $newphoto);


        $employee = 'admin';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => $employee,
            'photo' => 'emp/' . $newphoto
        ]);



        return redirect()->back();
    }

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
        if(Auth::user()->type=='employee'){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                // 'type' => 'required'

            ]);
            $user->dealership_id=Auth::user()->dealership_id;

        }
        if(Auth::user()->type=='admin'){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',


        ]);

    }
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
        if(Auth::user()->type=='employee' && Auth::user()->dealership_id== $user->dealership_id){
            $emp = User::find($user->id);
            $emp->destroy($user->id);
        }
        if(Auth::user()->type=='admin'){
            $emp = User::find($user->id);
            $emp->destroy($user->id);
        }


        return redirect()->back();
    }
}
