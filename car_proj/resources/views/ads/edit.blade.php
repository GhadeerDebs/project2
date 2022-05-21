
@extends('template')
@section('title', ' Edit Advertise')

@section('content')
@php
$typeArray=['Sedan','Minivan','Jeep','MiniJeep','Coupe','SUV','Sports_sedan'];
$drivetrainArray=['frontWHeelDrive', 'rearwheelDrive'];
$gearboxArray=['automatic', 'manual'];
$colorArray=['red','white','black','silver','gray'];
@endphp
<form action="{{route('ads.update',$ads->id)}}" method="POST" >
    @csrf
    @method('POST')
                <div class="form-group">
                    <label for="exampleFormControlInput1">type</label>
                    <select class="form-control" name="type"  >
                        @foreach($typeArray as $item)
                        <option value="{{$item}}" {{($ads->type == $item)?'selected':'' }}> {{$item}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>engine_power</label>
                    <input type="form-control" class="form-control" name="engine_power" value="{{$ads->engine_power}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">engine_capacity</label>
                    <input type="form-control" class="form-control" name="engine_capacity" value="{{$ads->engine_capacity}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">weight</label>
                    <input type="form-control" class="form-control" name="weight" value="{{$ads->weight}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">drivetrain</label>
                    <select class="form-control" name="drivetrain"  >
                        @foreach($drivetrainArray as $item)
                        <option value="{{$item}}" {{($ads->drivetrain == $item)?'selected':'' }}> {{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">gearbox</label>

                    <select class="form-control" name="gearbox"  >
                        @foreach($gearboxArray as $item)
                        <option value="{{$item}}" {{($ads->gearbox == $item)?'selected':'' }}> {{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">dealership_id</label>
                    <input type="form-control" class="form-control" name="dealership_id" value="{{$ads->dealership_id}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Color</label>
                    <input type="form-control" class="form-control" name="color" value="{{$ads->color}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">model_id</label>
                    <input type="form-control" class="form-control" name="model_id" value="{{$ads->model_id}}">
                </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
