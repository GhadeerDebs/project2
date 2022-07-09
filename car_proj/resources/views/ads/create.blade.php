@extends('template')
@section('title', 'Advertisment')

@section('content')
    @php
    $typeArray = ['Sedan', 'Minivan', 'Jeep', 'MiniJeep', 'Coupe', 'SUV', 'Sports_sedan'];
    $drivetrainArray = ['frontWHeelDrive', 'rearwheelDrive'];
    $gearboxArray = ['automatic', 'manual'];
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
    @endphp
    <div class="container">

        <div class="row">
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors as $item)
                        <li>
                            {{ $item }}
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Create Advertise</h1>
                    </div>
                    <br>
<<<<<<< Updated upstream

                    <div class="container">
                        <a href=" {{ route('ads') }} "><button type="button" class="btn btn-primary">
                                All Avertisements</button></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @method('POST')
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlInput1">type</label>
                                <select class="form-control" name="type">
                                    @foreach ($typeArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlTextarea1">engine_capacity</label>
                                <input type="form-control" class="form-control" name="engine_capacity">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="exampleFormControlInput1">engine_power</label>
                                <input type="form-control" class="form-control" name="engine_power">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="exampleFormControlInput1">weight</label>
                                <input type="form-control" class="form-control" name="weight">

                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="exampleFormControlInput1">Color</label>
                                <input type="form-control" class="form-control" name="color">
                            </div>



                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlInput1">drivetrain</label>

                                <select class="form-control" name="drivetrain">
                                    @foreach ($drivetrainArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlInput1">gearbox</label>

                                <select class="form-control" name="gearbox">
                                    @foreach ($gearboxArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlInput1">entertainment_equipment</label>
                                <textarea class="form-control" name="entertainment_equipment"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlInput1">Basic_equipment</label>
                                <textarea class="form-control" name="equipment"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleFormControlInput1">dealership</label>

                                <select class="form-control" name="dealership_id">
                                    @foreach ($dealerships as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <livewire:make-makeyears-model-dropdown />
                                {{-- <label for="exampleFormControlInput1">model_id</label>
=======
                    <<<<<<< HEAD <<<<<<< HEAD <div class="container">
                        <a href=" {{ route('ads') }} "><button type="button" class="btn btn-primary">
                                All Avertisements</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    @method('POST')
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1">type</label>
                            <select class="form-control" name="type">
                                @foreach ($typeArray as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlTextarea1">engine_capacity</label>
                            <input type="form-control" class="form-control" name="engine_capacity">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="exampleFormControlInput1">engine_power</label>
                            <input type="form-control" class="form-control" name="engine_power">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="exampleFormControlInput1">weight</label>
                            <input type="form-control" class="form-control" name="weight">

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exampleFormControlInput1">Color</label>
                            <input type="form-control" class="form-control" name="color">
                        </div>



                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1">drivetrain</label>

                            <select class="form-control" name="drivetrain">
                                @foreach ($drivetrainArray as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1">gearbox</label>

                            <select class="form-control" name="gearbox">
                                @foreach ($gearboxArray as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1">entertainment_equipment</label>
                            <textarea class="form-control" name="entertainment_equipment"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1">Basic_equipment</label>
                            <textarea class="form-control" name="equipment"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1">dealership</label>

                            <select class="form-control" name="dealership_id">
                                @foreach ($dealerships as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

<<<<<<< HEAD
                        <div class="col-md-6 mb-3">
                            <livewire:make-makeyears-model-dropdown />
                            {{-- <label for="exampleFormControlInput1">model_id</label>
>>>>>>> Stashed changes
=======
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">entertainment_equipment</label>
                        <textarea class="form-control" name="entertainment_equipment" ></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">Basic_equipment</label>
                        <textarea class="form-control" name="equipment" ></textarea>
                    </div>
                  </div>
                  <div class="form-row">
                  @if(Auth::user()->type=='admin')

                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1">dealership</label>

                        <select class="form-control" name="dealership_id">
                            @foreach($dealerships as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                  @endif

                    <div class="col-md-6 mb-3">
                        @livewire('make-makeyears-model-dropdown', ['id' => null]);
                        {{-- <livewire:make-makeyears-model-dropdown/> --}}
                    {{-- <label for="exampleFormControlInput1">model_id</label>
>>>>>>> f8419bff38c69f3d5cbc79137ef3703c0bcf95f1

                    <select class="form-control" name="model_id">
                        @foreach ($models as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select> --}}
<<<<<<< Updated upstream
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Choose Images</label>
                                <input type="file" name="advertisement_photo_path[]" id="exampleFile" type="file"
                                    accept="image/*" multiple>
                            </div>

                        </div>
                </div>
=======
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Choose Images</label>
                            <input type="file" name="advertisement_photo_path[]" id="exampleFile" type="file"
                                accept="image/*" multiple>
                        </div>

                    </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>
    </div>
<<<<<<< Updated upstream
=======
    </div>
>>>>>>> Stashed changes
    <button class="btn btn-primary" type="submit">Submit </button>
    </form>


    </div>
    </div>

    {{-- <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Create Advertise</h1>
                    </div>
                    <br>
                    <br>
                    <div class="container"> <a href=" {{ route('ads') }} "><button type="button"
                                class="btn btn-primary">
                                All Avertisements</button></a></div>
                </div>
            </div>
        </div>


    <div class="row">
        <div class="col">
            <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                @method('POST')
                <div class="form-group">
                    <label for="exampleFormControlInput1">type</label>
                    <select class="form-control" name="type">
                        @foreach ($typeArray as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

<<<<<<< Updated upstream
                    {{ csrf_field() }}
                    @method('POST')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">type</label>
                        <select class="form-control" name="type">
                            @foreach ($typeArray as $item)
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">engine_capacity</label>
                        <input type="form-control" class="form-control" name="engine_capacity">
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

                        <select class="form-control" name="drivetrain">
                            @foreach ($drivetrainArray as $item)
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">gearbox</label>

                        <select class="form-control" name="gearbox">
                            @foreach ($gearboxArray as $item)
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">dealership</label>

                        <select class="form-control" name="dealership_id">
                            @foreach ($dealerships as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Color</label>
                        <input type="form-control" class="form-control" name="color">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">model_id</label>

                        <select class="form-control" name="model_id">
                            @foreach ($models as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div >
                        <label>Choose Images</label>
                        <input type="file"  name="advertisement_photo_path[]" multiple="true">


                        </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">Save</button>
                    </div>
                </form>
            </div>
=======
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

                    <select class="form-control" name="drivetrain">
                        @foreach ($drivetrainArray as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">gearbox</label>

                    <select class="form-control" name="gearbox">
                        @foreach ($gearboxArray as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">dealership</label>

                    <select class="form-control" name="dealership_id">
                        @foreach ($dealerships as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Color</label>
                    <input type="form-control" class="form-control" name="color">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">model_id</label>
>>>>>>> Stashed changes

                    <select class="form-control" name="model_id">
                        @foreach ($models as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Choose Images</label>
                    <input type="file" name="advertisement_photo_path" multiple>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">Save</button>
                </div>
            </form>
        </div>
<<<<<<< Updated upstream
    </div> --}}
=======

    </div>
    </div>
>>>>>>> Stashed changes
@stop
