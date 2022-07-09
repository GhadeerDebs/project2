@extends('template')
@section('title', 'Advertisment')

@section('content')
    @php
    $typeArray = ['Sedan', 'Minivan', 'Jeep', 'MiniJeep', 'Coupe', 'SUV', 'Sports_sedan'];
    $drivetrainArray = ['frontWHeelDrive', 'rearwheelDrive'];
    $gearboxArray = ['automatic', 'manual'];

    @endphp
    <div class="container">
        <div class="row">
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors as $item)
                        <li>
                            {{ $item }}

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
                        <a href=" {{ route('ads') }} "><button type="button" class="btn btn-primary">
                                All Avertisements</button></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{ route('ads.update', $ads) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlInput1">type</label>
                                <select class="form-control" name="type">
                                    @foreach ($typeArray as $item)
                                        <option value="{{ $item }}" {{ $ads->type == $item ? 'selected' : '' }}>
                                            {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlTextarea1">engine_capacity</label>
                                <input type="form-control" class="form-control" name="engine_capacity"
                                    value="{{ $ads->engine_capacity }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="exampleFormControlInput1">engine_power</label>
                                <input type="form-control" class="form-control" name="engine_power"
                                    value="{{ $ads->engine_power }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="exampleFormControlInput1">weight</label>
                                <input type="form-control" class="form-control" name="weight"
                                    value="{{ $ads->weight }}">

                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="exampleFormControlInput1">Color</label>
                                <input type="form-control" class="form-control" name="color" value="{{ $ads->color }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Choose Images</label>
                                <input type="file" name="advertisement_photo_path[]" id="exampleFile" type="file"
                                    accept="image/*" multiple>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1">drivetrain</label>

                                    <select class="form-control" name="drivetrain">
                                        @foreach ($drivetrainArray as $item)
                                            <option value="{{ $item }}"
                                                {{ $ads->drivetrain == $item ? 'selected' : '' }}> {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1">gearbox</label>
                                    <select class="form-control" name="gearbox">
                                        @foreach ($gearboxArray as $item)
                                            <option value="{{ $item }}"
                                                {{ $ads->gearbox == $item ? 'selected' : '' }}>
                                                {{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1">entertainment_equipment</label>
                                    <textarea class="form-control" name="entertainment_equipment">{{ $ads->entertainment_equipment }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1">Basic_equipment</label>
                                    <textarea class="form-control" name="equipment">{{ $ads->equipment }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1">dealership</label>
                                    <select class="form-control" name="dealership_id">
                                        @foreach ($dealership as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $ads->dealership_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-row">

                                    <p>if you want to edit current model " {{ $ads->model->name }} " select from dropdown
                                        below
                                    </p>
                                    <div class="col-md-6 mb-3">

                                        <livewire:make-makeyears-model-dropdown />


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            @if (count($ads->pictures) > 0)
                                <p>Images:</p>
                                @foreach ($images as $img)
                                    @if ($img->adv_id == $ads->id)
                                        <a href="{{ route('deleteimage', $img->id) }}"><i class="fas fa-trash "></i>
                                            {{-- <form action="{{ route('deleteimage', $img->id) }}" method="POST">
                                            <button class="btn text-danger">X</button>
                                            @csrf
                                            @method('delete')
                                        </form> --}}


                                            <img src="{{ URL::asset($img->advertisement_photo_path) }}"
                                                class="img-responsive" style="max-height: 100px; max-width: 100px;" alt=""
                                                srcset="">
                                    @endif
                                @endforeach
                            @endif
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

{{-- {{-- /////////////////
<form action="{{route('ads.update',$ads->id)}}" method="POST" >
    @csrf
    @method('POST')
                <div class="form-group">
                    <label for="exampleFormControlInput1">type</label>
                    <select class="form-control" name="type"  >
                        @foreach ($typeArray as $item)
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
                        @foreach ($drivetrainArray as $item)
                        <option value="{{$item}}" {{($ads->drivetrain == $item)?'selected':'' }}> {{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">gearbox</label>

                    <select class="form-control" name="gearbox"  >
                        @foreach ($gearboxArray as $item)
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




--}}











{{-- <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel CRUD With Multiple Image Upload</title>

      <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Font-awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>
    <body>

        <div class="container" style="margin-top: 50px;">
            <div class="row">


                <div class="col-lg-3">
                    <p>Cover:</p>
                    <form action="/deletecover/{{ $posts->id }}" method="post">
                    <button class="btn text-danger">X</button>
                    @csrf
                    @method('delete')
                    </form>
                    <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                    <br>



                     @if (count($posts->images) > 0)
                     <p>Images:</p>
                     @foreach ($posts->images as $img)
                     <form action="/deleteimage/{{ $img->id }}" method="post">
                         <button class="btn text-danger">X</button>
                         @csrf
                         @method('delete')
                         </form>
                     <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                     @endforeach
                     @endif

                </div>


                <div class="col-lg-6">
                    <h3 class="text-center text-danger"><b>Udate Post</b> </h3>
				    <div class="form-group">
                        <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                         <input type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $posts->title }}">
        				 <input type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $posts->author }}">
                         <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body">{{ $posts->body }}</Textarea>
                         <label class="m-2">Cover Image</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                         <label class="m-2">Images</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>
                   </div>
                </div>
            </div>



         </body>
</html> --}}
