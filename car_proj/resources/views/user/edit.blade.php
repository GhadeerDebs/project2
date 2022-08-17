@extends('template')
@section('title', 'users')

@section('content')

 @if (session('msg'))
           <div class="row ">
               <div id="box"class="classname alert alert-success container">
                 {{session('msg')}}
                </div>
           </div>
        @endif

    <div class="container" style="padding-top: 4%">
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                 @if ($errors->has('name'))
                  <span  style="color: red">{{ $errors->first('name') }}</span>
            @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                @if ($errors->has('email'))
                <span  style="color: red">{{ $errors->first('email') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                      <span  style="color: red">{{ $errors->first('password') }}</span>
                 @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Coniform Password</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@stop
