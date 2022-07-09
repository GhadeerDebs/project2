@extends('template')
@section('title', 'Advertisment')

@section('content')
@php
$typeArray=['Sedan','Minivan','Jeep','MiniJeep','Coupe','SUV','Sports_sedan'];
$drivetrainArray=['frontWHeelDrive', 'rearwheelDrive'];
$gearboxArray=['automatic', 'manual'];

@endphp
    <div class="container">

        <div class="row">
            @if (count($errors)>0)
                <ul>
                    @foreach ($errors as $item)
                        <li>
                            {{$item}}

                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Edit Advertise</h1>
                    </div>
                    <br>

                    <div class="container">
                         <a href=" {{ route('ads') }} "><button type="button"
                                class="btn btn-primary">
                                All Avertisements</button></a></div>
                    </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{route('ads.update',$ads->id)}}" method="POST" >
                        @php
                        $id=$ads->id;
                        @endphp
                 {{ csrf_field() }}
                 @method('POST')
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">type</label>
                        <select class="form-control" name="type"  >
                            @foreach($typeArray as $item)
                            <option value="{{$item}}" {{($ads->type == $item)?'selected':'' }}> {{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlTextarea1">engine_capacity</label>
                        <input type="form-control" class="form-control" name="engine_capacity" value="{{$ads->engine_capacity}}">
                    </div>
                  </div>

                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="exampleFormControlInput1">engine_power</label>
                            <input type="form-control" class="form-control" name="engine_power" value="{{$ads->engine_power}}">
                         </div>

                         <div class="col-md-3 mb-3">
                            <label for="exampleFormControlInput1">weight</label>
                            <input type="form-control" class="form-control" name="weight" value="{{$ads->weight}}">

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="exampleFormControlInput1">Color</label>
                        <input type="form-control" class="form-control" name="color" value="{{$ads->color}}">
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Choose Images</label>
                    <input type="file"  name="advertisement_photo_path[]"id="exampleFile" type="file" accept="image/*" multiple>
                    </div>

                 </div>

                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">drivetrain</label>

                        <select class="form-control" name="drivetrain"  >
                            @foreach($drivetrainArray as $item)
                            <option value="{{$item}}" {{($ads->drivetrain == $item)?'selected':'' }}> {{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">gearbox</label>
                        <select class="form-control" name="gearbox"  >
                            @foreach($gearboxArray as $item)
                            <option value="{{$item}}" {{($ads->gearbox == $item)?'selected':'' }}> {{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">entertainment_equipment</label>
                        <textarea class="form-control" name="entertainment_equipment" >{{$ads->entertainment_equipment}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">Basic_equipment</label>
                        <textarea class="form-control" name="equipment" >{{$ads->equipment}}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    @if(Auth::user()->type=='admin')
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">dealership</label>

                        <select class="form-control" name="dealership_id">
                            @foreach($dealerships as $item)
                            <option value="{{$item->id}}" {{($ads->dealership_id == $item->id)?'selected':'' }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                        <div class="form-row">

                            <p>if you want to edit current model " {{$ads->model->name}} " select from dropdown below</p>
                            <div class="col-md-6 mb-3">

                        {{-- <livewire:edit/> --}}
                        @livewire('make-makeyears-model-dropdown', ['id' => $id]);
                        {{-- <livewire:make-makeyears-model-dropdown/> --}}
                        </div>
                        {{--
                    <label for="exampleFormControlInput1" >model</label>

                    <select class="form-control" name="model_id">
                        @foreach($models as $item)
                        <option value="{{$item->id}}" {{($ads->model_id == $item->id)?'selected':'' }}>{{$item->name}}</option>
                        @endforeach
                    </select> --}}

                    </div>
                  </div>
                 </div>
            </div>
        </div>
    </div>
                 </div>
                  <button class="btn btn-primary" type="submit">Submit </button>
                 </form>


                 </div>
    </div>
@stop


{{--
/////////////////
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
  </form> --}}
