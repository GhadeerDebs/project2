@extends('template')
@section('title', ' show Dealership')

@section('content')
@php
$duration = [15,30,45,60];

@endphp

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">Name :</label>
            <span class="form-control "  name="name" >{{$dealership->name}}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">Location :</label>
          <span class="form-control  "  name="location" >{{$dealership->location}}</span>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">Phone :</label>
          <span class="form-control  "  name="phone" >{{$dealership->phone}}</span>

        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">Start Time :</label>
          <span class="form-control  "  name="startTime" >{{$dealership->startTime}}</span>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">End Time :</label>
          <span class="form-control  "  name="endTime" >{{$dealership->endTime}}</span>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">Workdays :</label>
          <div>
          @if (str_contains($dealership->workdays,'0' )!= null)
              <span> Sunday </span>
          @endif
          @if (str_contains($dealership->workdays,'1' )!= null)
          <span> Monday </span>
          @endif
          @if (str_contains($dealership->workdays,'2' )!= null)
          <span> Tuesday </span>
          @endif
          @if (str_contains($dealership->workdays,'3' )!= null)
          <span> Wednesday </span>
          @endif
          @if (str_contains($dealership->workdays,'4' )!= null)
          <span> Thursday </span>
          @endif
          @if (str_contains($dealership->workdays,'5' )!= null)
          <span> Friday </span>
          @endif
          @if (str_contains($dealership->workdays,'6' )!= null)
          <span> Saturday </span>
          @endif
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">Duration :</label>
            <span  class="form-control  " >{{$dealership->duration}} min</span>
        </div>

      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01"  style=" font-weight: bold; color:darkslategray">Image :</label>
            <img src="    {{ URL::asset($dealership->dealer_photo_path	) }}"
            alt="  {{ $dealership->dealer_photo_path }}"
            class="img-tumbnail" width="100" height="100">

        </div>
      </div>
@stop
