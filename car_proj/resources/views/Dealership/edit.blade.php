@extends('template')
@section('title', ' Edit Dealership')

@section('content')
@php
$duration = [15,30,45,60];
@endphp
<div class="container" style="padding-top: 4%">
@if (session('status'))
<div class=" alert alert-success" id='box'>
        {{ session('status') }}
    </div>
@endif
</div>
<form action="{{route('dealership.update',$dealership->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Name</label>
            <input type="text" class="form-control is-valid"  name="name" value="{{$dealership->name}}" required>
            @if ($errors->has('name'))
            <span style="color: red">{{$errors->first('name')}}</span>
        @endif
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Location</label>
          <input type="text" class="form-control is-valid"  name="location" value="{{$dealership->location}}" required>
          @if ($errors->has('location'))
          <span style="color: red">{{$errors->first('location')}}</span>
      @endif
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Phone</label>
          <input type="text" class="form-control is-valid"  name="phone" value="{{$dealership->phone}}" required>
          @if ($errors->has('phone'))
          <span style="color: red">{{$errors->first('phone')}}</span>
      @endif
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Start Time</label>
          <input type="time" class="form-control is-valid"  name="startTime" value="{{$dealership->startTime}}" required>
          @if ($errors->has('startTime'))
          <span style="color: red">{{$errors->first('startTime')}}</span>
      @endif
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">End Time</label>
          <input type="time" class="form-control is-valid"  name="endTime"  value="{{$dealership->endTime}}" required>
          @if ($errors->has('workdays'))
          <span style="color: endTime">{{$errors->first('endTime')}}</span>
      @endif
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Workdays</label>
          <select class="selectpicker" multiple data-live-search="true" name="workdays[]">
            <option value="0" {{( $contains = str_contains($dealership->workdays,'0' )!= null)?'selected':''}}>Sunday</option>
            <option value="1" {{( $contains = str_contains($dealership->workdays,'1' )!= null)?'selected':''}}>Monday</option>
            <option value="2" {{( $contains = str_contains($dealership->workdays,'2' )!= null)?'selected':''}}>Tuesday</option>
            <option value="3" {{( $contains = str_contains($dealership->workdays,'3' )!= null)?'selected':''}}>Wednesday</option>
            <option value="4" {{( $contains = str_contains($dealership->workdays,'4' )!= null)?'selected':''}}>Thursday</option>
            <option value="5" {{( $contains = str_contains($dealership->workdays,'5' )!= null)?'selected':''}}>Friday</option>
            <option value="6" {{( $contains = str_contains($dealership->workdays,'6' )!= null)?'selected':''}} >Saturday</option>
          </select>
          @if ($errors->has('workdays'))
          <span style="color: red">{{$errors->first('workdays')}}</span>
      @endif
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Duration</label>
            <select class="selectpicker"  name="duration">
                @foreach ($duration as $d)
                <option value="{{$d}}" {{ $dealership->duration == $d ? 'selected' : '' }} >{{$d}} minute</option>
                @endforeach
            </select>
            @if ($errors->has('duration'))
            <span style="color: red">{{$errors->first('duration')}}</span>
        @endif

        </div>
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Photo</label>
            <input type="file" class="form-control is-valid"  name="dealer_photo_path"  >

        </div>
      </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
