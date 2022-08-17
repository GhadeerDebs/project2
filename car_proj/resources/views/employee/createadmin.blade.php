@extends('template')
@section('title', 'Create Admin')

@section('content')
<div class="container" style="padding-top: 4%">
    @if (session('status'))
    <div class=" alert alert-success" id='box'>
            {{ session('status') }}
        </div>
    @endif
    </div>
    <form method="POST" action="{{ route('Admin.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name" value="{{ __('Name') }}">Admin Name</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
                  @if ($errors->has('name'))
                  <span  style="color: red">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="mt-4">
            <label for="email" value="{{ __('Email') }}">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
             @if ($errors->has('email'))
                <span  style="color: red">{{ $errors->first('email') }}</span>
             @endif
        </div>

        <div class="mt-4">
            <label for="phone" value="{{ __('phone') }}">Phone </label>
            <input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
            @if ($errors->has('phone'))
                 <span  style="color: red">{{ $errors->first('phone') }}</span>
             @endif
        </div>


        <div class="mt-4">
            <label for="password" value="{{ __('Password') }}">Password</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
                 @if ($errors->has('password'))
                      <span  style="color: red">{{ $errors->first('password') }}</span>
                 @endif
        </div>

        <div class="mt-4">
            <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password" />
        </div>
{{--
        <div class="mt-4">
            <label for="photo" value="{{ __('photo') }}">Photo</label>

            <input id="photo" type="file" class="form-control is-valid" name="photo" required>
        </div> --}}

        <br>
        <div class="mt-4">
            <button type="submit" class="btn btn-success"> Create Admin</button>
        </div>



        </div>
    </form>

@stop
