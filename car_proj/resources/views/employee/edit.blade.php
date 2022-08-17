@extends('template')
@section('title', 'employee')

@section('content')

<div class="container" style="padding-top: 4%">
    @if (session('status'))
    <div class=" alert alert-success" id='box'>
            {{ session('status') }}
        </div>
    @endif
    </div>

    <div class="container" style="padding-top: 4%">
        <form method="POST" action="{{ route('Employee.update', $user->id) }}">
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

            @if(Auth::user()->type=='admin')
            <div class="mt-4">
                <label >Dealership</label>
                <select class="form-control" name="dealership_id">
                    @foreach($dealerships as $item)
                    <option value="{{$item->id}}" {{($user->dealership_id == $item->id)?'selected':'' }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
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
            {{-- <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" class="form-control" name="photo">
            </div> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@stop
