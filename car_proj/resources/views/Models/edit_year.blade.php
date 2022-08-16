@extends('template')
@section('title', ' Edit year')

@section('content')
<div class="container" style="padding-top: 4%">
    @if (session('status'))
    <div class=" alert alert-success" id='box'>
            {{ session('status') }}
        </div>
    @endif
    </div>
<form action="{{route('Models.update_year',$year->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Year</label>
            <input type="text" class="form-control is-valid"  name="year" value="{{$year->year}}" required>
            @if ($errors->has('year'))
            <span style="color: red">{{$errors->first('year')}}</span>
        @endif
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
