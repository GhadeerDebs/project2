@extends('template')
@section('title', ' Edit Dealerships')

@section('content')
<form action="{{route('dealership.update',$dealership->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Name</label>
            <input type="text" class="form-control is-valid"  name="name" value="{{$dealership->name}}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Location</label>
          <input type="text" class="form-control is-valid"  name="location" value="{{$dealership->location}}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Phone</label>
          <input type="text" class="form-control is-valid"  name="phone" value="{{$dealership->phone}}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Photo</label>
            <input type="file" class="form-control is-valid"  name="dealer_photo_path"  >
        </div>
      </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
