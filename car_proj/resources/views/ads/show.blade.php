@extends('template')
@section('title', ' Show Advertise')

@section('content')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Type :</label>
            <label for="exampleFormControlInput1">{{ $ads->type }}</label>
        </div>
        <br>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Engine_capacity :</label>
            <label for="exampleFormControlInput1">{{ $ads->engine_capacity }}</label>

        </div>
        <br>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Engine_power :</label>
            <label for="exampleFormControlInput1">{{ $ads->engine_power }}</label>

        </div>
        <br>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Weight :</label>
            <label for="exampleFormControlInput1">{{ $ads->weight }}</label>

        </div>
        <br>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Drivetrain :</label>
            <label for="exampleFormControlInput1">{{ $ads->drivetrain }}</label>

        </div>
        <br>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Gearbox :</label>
            <label for="exampleFormControlInput1">{{ $ads->gearbox }}</label>

        </div>
        <br>

        <div class=" col-md-6 mb-3">
            <label for="exampleFormControlInput1">Color :</label>
            <label for="exampleFormControlInput1">{{ $ads->color }}</label>
        </div>
        <br>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Model_id :</label>
            <label for="exampleFormControlInput1">{{ $ads->model_id }}</label>

        </div>
        <br>


        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Equipment :</label>
            <label for="exampleFormControlInput1">{{ $ads->equipment }}</label>

        </div>
        <br>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlInput1">Entertatment equipment :</label>
            <label for="exampleFormControlInput1">{{ $ads->entertainment_equipment }}</label>

        </div>
        <br>
    </div>
    <div class="form-row">
        @foreach ($images as $image)
            @if ($image->adv_id == $ads->id)
                <div class="col-md-6">
                    <img src="  {{ URL::asset($image->advertisement_photo_path) }}"
                        alt="  {{ $image->advertisement_photo_path }}" class="img-tumbnail" width="100" height="100">
                </div>
            @endif
        @endforeach
    </div>
    <br>

    </div>
    <br>

@stop
