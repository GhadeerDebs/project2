@extends('template')
@section('title', ' Edit model')

@section('content')
<form action="{{route('Models.update_model',$model->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">model name</label>
            <input type="text" class="form-control is-valid"  name="model_name" value="{{$model->name}}" required>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
