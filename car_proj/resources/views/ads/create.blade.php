@extends('template')
@section('title', 'Advertisment')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Create Post</h1>
                    </div>
                    <br>
                    <br>
                    <div class="container"> <a href=" {{ route('ads') }} "><button type="button"
                                class="btn btn-primary">
                                All Avertisements</button></a></div>
                </div>
            </div>
        </div>
        {{-- 'type'            => 'required',
'engine_capacity' => 'required',
'engine_power'    => 'required',
'drivetrain'      => 'required',
'weight'          => 'required',
'gearbox'         => 'required',
'color'           => 'required',
'dealership_id'   => 'required',
'model_id'        => 'required' --}}

        <div class="row">
            <div class="col">
                <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">type</label>
                        <input type="text" class="form-control" name="type">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">engine_capacity</label>
                        <textarea class="form-control" rows="3" name="engine_capacity"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">engine_power</label>
                        <input type="form-control" class="form-control" name="engine_power">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">weight</label>
                        <input type="form-control" class="form-control" name="weight">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">drivetrain</label>
                        <input type="form-control" class="form-control" name="drivetrain">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">gearbox</label>
                        <input type="form-control" class="form-control" name="gearbox">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">dealership_id</label>
                        <input type="form-control" class="form-control" name="dealership_id">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">model_id</label>
                        <input type="form-control" class="form-control" name="model_id">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
