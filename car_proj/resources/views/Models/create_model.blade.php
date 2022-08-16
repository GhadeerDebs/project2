@extends('template')
@section('title', ' Create model')

@section('content')
<div class="container" style="padding-top: 4%">
    @if (session('status'))
        <div class="classname alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    </div>
<form action="{{route('Models.store_model')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationServer01">Brand name</label>
        <p></p>
        <label for="validationServer01" >{{$make->name}}</label>
        <input type="hidden" class="form-control is-valid"  name="make_id" value="{{$make->id}}">
        @if ($errors->has('make_id'))
        <span style="color: red">The Brand name field is required.</span>
    @endif
      </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Year</label>
          <p></p>
          <label for="validationServer01" >{{$year->year}}</label>
          <input type="hidden" class="form-control is-valid"  name="year_id" value="{{$year->id}}">
          @if ($errors->has('year_id'))
          <span style="color: red">The year field is required.</span>
      @endif
        </div>
      </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Model</label>
          <input type="text" class="form-control is-valid"  name="model_name" required>
          @if ($errors->has('model_name'))
          <span style="color: red">The model name field is required.</span>
      @endif
        </div>
      </div>

    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
