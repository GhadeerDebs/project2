<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\make;
use App\Models\make_years;
use App\Models\moodel;

class CarModelController extends Controller
{
    public function index(){
        $makes=make::all();
        return view('Models.index')->with('makes',$makes);
    }


    public function relative_years($makeid){
        $make_years=make_years::where('make_id',$makeid)->get();
        return view('Models.relative_years')->with('years',$make_years);
    }
    public function relative_model($yearid){
        $models=moodel::where('make_years_id',$yearid)->get();
        return view('Models.relative_models')->with('models',$models);
    }


    public function create(){
        return view('Models.create');
    }

    public function create_year($make){
        $make=make::where('id','=',$make)->first();
        return view('Models.create_year')->with('make',$make);
    }
    public function create_model($year){
        $year=make_years::where('id','=',$year)->first();
        $make=make::where('id','=',$year->make_id)->first();
        return view('Models.create_model')->with('make',$make)->with('year',$year);
    }

    public function store(Request $request){
        $this->validate($request,[
            'make_name'=>'required',
            'year'=>'required',
            'model_name'=>'required',
        ]);
        $make=make::create([
            'name'=>$request->make_name,
        ]);
        $make_years=make_years::create([
            'year'=>$request->year,
            'make_id'=>$make->id,
        ]);
        $model=moodel::create([
            'name'=>$request->model_name,
            'make_years'=>$make_years->id,
        ]);
        return redirect()->back();
    }
    public function store_year(Request $request){
        $this->validate($request,[
            'year'=>'required',
            'make_id'=>'required',
        ]);
        $make_years=make_years::create([
            'year'=>$request->year,
            'make_id'=>$request->make_id,
        ]);
        return redirect()->back();
    }

    public function store_model(Request $request){
        $this->validate($request,[
            'model_name'=>'required',
            'year_id'=>'required',
            'make_id'=>'required',
        ]);
        $model=moodel::create([
            'name'=>$request->model_name,
            'make_years_id'=>$request->year_id,
        ]);
        return redirect()->back();
    }

    public function edit_make($id){
        $make=make::where('id','=',$id)->first();
        return view('Models.edit_make')->with('make',$make);
    }
    public function edit_year($id){
        $year=make_years::where('id','=',$id)->first();
        return view('Models.edit_year')->with('year',$year);
    }
    public function edit_model($id){
        $model=moodel::where('id','=',$id)->first();
        return view('Models.edit_model')->with('model',$model);
    }

    public function update_make(Request $request,make $make){

            $this->validate($request,[
                'make_name' =>'required',
            ]);
            $make=make::find($make->id);
            $make->name=$request->make_name;
            $make->save();

            return redirect()->route('Modells.index');
    }

    public function update_year(Request $request,make_years $year){
        $year=make_years::find($year->id);
        $this->validate($request,[
            'year' =>'required',
        ]);
        $year->year=$request->year;
        $year->save();

        return redirect()->route('Models.relative_years',['makeid'=>$year->make_id]);
    }

    public function update_model(Request $request,moodel $model){
        $model=moodel::find($model->id);
        $this->validate($request,[
            'model_name' =>'required',
        ]);
        $model->name=$request->model_name;
        $model->save();
        return redirect()->route('Models.relative_models',['yearid'=>$model->make_years_id]);
    }

    public function destroy_make(make $make){
        $make = make::find($make->id);
        $make->destroy($make->id);

        return redirect()->back();
    }

    public function destroy_year(make_years $year){
        $year = make_years::find($year->id);
        $year->destroy($year->id);

        return redirect()->back();
    }

    public function destroy_model(moodel $model){
        $model = moodel::find($model->id);
        $model->destroy($model->id);
        return redirect()->back();
    }

}
