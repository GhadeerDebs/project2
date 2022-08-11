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
                        <h1 class="display-4">Create Advertise</h1>
                    </div>
                    <br>

                    <div class="row">
                        <div class="container">
                            <div class="col align-self-end">
                                <a href=" {{ route('ads') }} "><button type="button" class="btn btn-primary">
                                        All Avertisements</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @method('POST')
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                            <div class="col">
                                <label for="exampleFormControlInput1">Car Type</label>
                                <select class="form-control" name="type">
                                    @foreach ($typeArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlTextarea1">Engine_capacity</label>
                                <input type="form-control" class="form-control" name="engine_capacity">
                            </div>

                            <div class="col">
                                <label for="exampleFormControlInput1">Engine_power</label>
                                <input type="form-control" class="form-control" name="engine_power">
                            </div>


                            <div class="col">
                                <label for="exampleFormControlInput1">Color of car</label>
                                <input type="form-control" class="form-control" name="color">
                            </div>

                            <div class="col">
                                <label for="exampleFormControlInput1">weight</label>
                                <input type="form-control" class="form-control" name="weight">
                            </div>

                        </div>

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                            <div class="col">
                                <label for="exampleFormControlInput1">Drivetrain</label>

                                <select class="form-control" name="drivetrain">
                                    @foreach ($drivetrainArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Gearbox</label>

                                <select class="form-control" name="gearbox">
                                    @foreach ($gearboxArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Entertainment_equipment</label>
                                <textarea class="form-control" name="entertainment_equipment"></textarea>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Basic_equipment</label>
                                <textarea class="form-control" name="equipment"></textarea>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                            @if (Auth::user()->type == 'user')
                                <div class="col">
                                    <label for="exampleFormControlInput1">Dealership</label>

                                    <select class="form-control" name="dealership_id">
                                        @foreach ($dealerships as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            @if (Auth::user()->type == 'admin')

                                <div class="col">
                                    <label for="exampleFormControlInput1">Dealership</label>

                                    <select class="form-control" name="dealership_id">
                                        @foreach ($dealerships as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="col">
                                @livewire('make-makeyears-model-dropdown', ['id' => null])

                                <label for="exampleFormControlInput1">Model</label>

                                <select class="form-control" name="model_id">
                                    @foreach ($models as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <br>
                                <input type="file" name="advertisement_photo_path[]" id="exampleFile" type="file"
                                    accept="image/*" multiple>
                            </div>
                        </div>

                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Add </button>
        </form>


    </div>
    </div>
@stop


