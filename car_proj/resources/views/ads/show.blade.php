@extends('template')
@section('title', ' Show Advertise')

@section('content')

    <div class="form-group">
        <label for="exampleFormControlInput1">type :</label>
        <label for="exampleFormControlInput1">{{ $ads->type }}</label>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">engine_capacity :</label>
        <label for="exampleFormControlInput1">{{ $ads->engine_capacity }}</label>

    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">engine_power :</label>
        <label for="exampleFormControlInput1">{{ $ads->engine_power }}</label>

    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">weight :</label>
        <label for="exampleFormControlInput1">{{ $ads->weight }}</label>

    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">drivetrain :</label>
        <label for="exampleFormControlInput1">{{ $ads->drivetrain }}</label>

    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">gearbox :</label>
        <label for="exampleFormControlInput1">{{ $ads->gearbox }}</label>

    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">dealership_id :</label>
        <label for="exampleFormControlInput1">{{ $ads->dealership_id }}</label>

    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">color :</label>
        <label for="exampleFormControlInput1">{{ $ads->color }}</label>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">model_id :</label>
        <label for="exampleFormControlInput1">{{ $ads->model_id }}</label>

    </div>
                <br>
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1">equipment :</label>
                    <label for="exampleFormControlInput1">{{$ads->equipment}}</label>

                </div>
                <br>
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1">entertatment equipment :</label>
                    <label for="exampleFormControlInput1">{{$ads->entertainment_equipment}}</label>

                </div>
                <br>
</div>
<div class="form-row">
    @foreach ($images as $image)
    @if($image->adv_id==$ads->id)
    <div class="col-md-6">
        <img src="  {{ URL::asset($image->advertisement_photo_path) }}" alt="  {{$image->advertisement_photo_path }}"
        class="img-tumbnail" width="100" height="100">
    </div>

    @endif
    @endforeach
</div>
<br>



    </div>
@stop
