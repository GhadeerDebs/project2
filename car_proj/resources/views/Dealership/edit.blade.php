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
          <label for="validationServer01">Start Time</label>
          <input type="time" class="form-control is-valid"  name="startTime" value="{{$dealership->startTime}}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">End Time</label>
          <input type="time" class="form-control is-valid"  name="endTime"  value="{{$dealership->endTime}}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">Workdays</label>
          <select class="selectpicker" multiple data-live-search="true" name="workdays[]">
            <option value="0" {{( $contains = str_contains($dealership->workdays,'0' )!= null)?'selected':''}}>Sunday</option>
            <option value="1" {{( $contains = str_contains($dealership->workdays,'1' )!= null)?'selected':''}}>Monday</option>
            <option value="2" {{( $contains = str_contains($dealership->workdays,'2' )!= null)?'selected':''}}>Tuesday</option>
            <option value="3" {{( $contains = str_contains($dealership->workdays,'3' )!= null)?'selected':''}}>Wednesday</option>
            <option value="4" {{( $contains = str_contains($dealership->workdays,'4' )!= null)?'selected':''}}>Thursday</option>
            <option value="5" {{( $contains = str_contains($dealership->workdays,'5' )!= null)?'selected':''}}>Friday</option>
            <option value="6" {{( $contains = str_contains($dealership->workdays,'6' )!= null)?'selected':''}} >Saturday</option>
          </select>
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
