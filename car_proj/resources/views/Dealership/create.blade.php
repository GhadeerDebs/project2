@extends('template')
@section('title', ' Create Dealerships')

@section('content')
<form action="{{route('dealership.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationServer01">Name</label>
        <input type="text" class="form-control is-valid"  name="name" required>
      </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Location</label>
          <input type="text" class="form-control is-valid"  name="location" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Phone</label>
          <input type="text" class="form-control is-valid"  name="phone" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Photo</label>
          <input type="file" class="form-control is-valid"  name="dealer_photo_path" required>
        </div>
      </div>
      {{-- //// --}}
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Start Time</label>
          <input type="time" class="form-control is-valid"  name="startTime" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">End Time</label>
          <input type="time" class="form-control is-valid"  name="endTime" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Workdays</label>
          <select class="selectpicker" multiple data-live-search="true" name="workdays[]">
            <option value="0">Sunday</option>
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
            <option value="6">Saturday</option>
          </select>
        </div>
      </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
