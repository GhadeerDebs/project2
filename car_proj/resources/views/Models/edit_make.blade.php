@extends('template')
@section('title', ' Edit make')
@section('content')
<div class="container" style="padding-top: 4%">
    @if (session('status'))
    <div class=" alert alert-success" id='box'>
            {{ session('status') }}
        </div>
    @endif
    </div>
<form action="{{route('Models.update_make',$make->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Brand</label>
            <input type="text" class="form-control is-valid"  name="make_name" value="{{$make->name}}" required>
            @if ($errors->has('make_name'))
            <span style="color: red">{{$errors->first('make_name')}}</span>
        @endif
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
