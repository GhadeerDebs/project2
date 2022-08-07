@extends('template')
@section('title', ' Create model')

@section('content')
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
        </div>
      </div>

    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
