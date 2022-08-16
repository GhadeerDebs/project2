@extends('template')
@section('title', 'employee')

@section('content')
    <div class="container" style="padding-top: 4%">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
     @endif

@if (session('status'))
    <div class="classname alert alert-success">
        {{ session('status') }}
    </div>
@endif

        <form method="POST" action="{{ route('Employee.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
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
