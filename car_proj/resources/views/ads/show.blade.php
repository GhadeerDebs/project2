

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
                    <label for="exampleFormControlInput1">dealership :</label>
                    <label for="exampleFormControlInput1">{{$ads->dealership->name}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">color :</label>
                    <label for="exampleFormControlInput1">{{$ads->color}}</label>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">model :</label>
                    <label for="exampleFormControlInput1">{{$ads->model->name}}</label>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Basic equipment :</label>
                    <label for="exampleFormControlInput1">{{($ads->equipment != null) ? $ads->equipment : 'undefined'}}</label>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">entertainment equipment :</label>
                    <label for="exampleFormControlInput1">{{($ads->entertainment_equipment != null)?$ads->entertainment_equipment : 'undefined'}}</label>
                </div>

@stop
