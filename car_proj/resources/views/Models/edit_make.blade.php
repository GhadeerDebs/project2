@extends('template')
@section('title', ' Edit make')

@section('content')
<form action="{{route('Models.update_make',$make->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Brand</label>
            <input type="text" class="form-control is-valid"  name="make_name" value="{{$make->name}}" required>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
