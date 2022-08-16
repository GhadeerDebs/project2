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
<form action="{{route('Models.store_year')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationServer01">Brand name</label>
        <p></p>
        <label for="validationServer01" >{{$make->name}}</label>
        <input type="hidden" class="form-control is-valid"  name="make_id" value="{{$make->id}}">
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

    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
