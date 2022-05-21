

@extends('template')
@section('title', ' Show Advertise')

@section('content')
                <div class="form-group">
                    <label for="exampleFormControlInput1">type :</label>
                    <label for="exampleFormControlInput1">{{$ads->type}}</label>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">engine_capacity :</label>
                    <label for="exampleFormControlInput1">{{$ads->engine_capacity}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">engine_power :</label>
                    <label for="exampleFormControlInput1">{{$ads->engine_power}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">weight :</label>
                    <label for="exampleFormControlInput1">{{$ads->weight}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">drivetrain :</label>
                    <label for="exampleFormControlInput1">{{$ads->drivetrain}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">gearbox :</label>
                    <label for="exampleFormControlInput1">{{$ads->gearbox}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">dealership_id :</label>
                    <label for="exampleFormControlInput1">{{$ads->dealership_id}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">color :</label>
                    <label for="exampleFormControlInput1">{{$ads->color}}</label>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">model_id :</label>
                    <label for="exampleFormControlInput1">{{$ads->model_id}}</label>

                </div>

@stop
