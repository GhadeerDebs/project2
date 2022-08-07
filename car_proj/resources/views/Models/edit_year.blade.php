@extends('template')
@section('title', ' Edit year')

@section('content')
<form action="{{route('Models.update_year',$year->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Year</label>
            <input type="text" class="form-control is-valid"  name="year" value="{{$year->year}}" required>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
