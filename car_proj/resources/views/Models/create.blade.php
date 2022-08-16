@extends('template')
@section('title', ' Create model')

@section('content')
<div class="container" style="padding-top: 4%">
    @if (session('status'))
    <div class=" alert alert-success" id='box'>
            {{ session('status') }}
        </div>
    @endif
    </div>
<form action="{{route('Models.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationServer01">Brand name</label>
        <input type="text" class="form-control is-valid"  name="make_name" required >
        @if ($errors->has('make_name'))
        <span style="color: red">{{$errors->first('make_name')}}</span>
    @endif
      </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Year</label>
          <input type="text" class="form-control is-valid"  name="year" required>
          @if ($errors->has('year'))
          <span style="color: red">{{$errors->first('year')}}</span>
      @endif
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Model name</label>
          <input type="text" class="form-control is-valid"  name="model_name" required>
          @if ($errors->has('model_name'))
          <span style="color: red">{{$errors->first('model_name')}}</span>
      @endif
        </div>
      </div>

    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
