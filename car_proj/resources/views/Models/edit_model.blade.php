@extends('template')
@section('title', ' Edit model')

@section('content')
<div class="container" style="padding-top: 4%">
    @if (session('status'))
    <div class=" alert alert-success" id='box'>
            {{ session('status') }}
        </div>
    @endif
    </div>
<form action="{{route('Models.update_model',$model->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">model name</label>
            <input type="text" class="form-control is-valid"  name="model_name" value="{{$model->name}}" required>
            @if ($errors->has('model_name'))
            <span style="color: red">{{$errors->first('model_name')}}</span>
        @endif
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
@stop
