@extends('template')
@section('title', ' Create Dealerships')

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
    <form action="{{ route('dealership.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Name</label>
                <input type="text" class="form-control is-valid" name="name" required>
                @if ($errors->has('name'))
                    <span style="color: red">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Location</label>
                <input type="text" class="form-control is-valid" name="location" required >
                @if ($errors->has('location'))
                    <span style="color: red">{{$errors->first('location')}}</span>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Phone</label>
                <input type="text" class="form-control is-valid" name="phone" required>
                @if ($errors->has('phone'))
                    <span style="color: red">{{$errors->first('phone')}}</span>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Photo</label>
                <input type="file" class="form-control is-valid" name="dealer_photo_path" required>
                @if ($errors->has('dealer_photo_path'))
                <span style="color: red">{{$errors->first('dealer_photo_path')}}</span>
            @endif
            </div>
        </div>
        {{-- //// --}}
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Start Time</label>
                <input type="time" class="form-control is-valid" name="startTime" required>
                @if ($errors->has('startTime'))
                <span style="color: red">{{$errors->first('startTime')}}</span>
            @endif
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">End Time</label>
                <input type="time" class="form-control is-valid" name="endTime" required>
                @if ($errors->has('endTime'))
                <span style="color: red">{{$errors->first('endTime')}}</span>
            @endif
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Workdays</label>
                <select class="selectpicker" multiple data-live-search="true" name="workdays[]" required>
                    <option value="0">Sunday</option>
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Saturday</option>
                </select>
                @if ($errors->has('workdays'))
                <span style="color: red">{{$errors->first('workdays')}}</span>
            @endif
            </div>
            <div>
                <label for="validationServer01">Duration</label>
                <select class="selectpicker"  name="duration">
                    @foreach ($duration as $d)
                    <option value="{{$d}}" >{{$d}} minute</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Save</button>
    </form>
@stop
