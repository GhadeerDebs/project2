@extends('template')
@section('title', 'Create Admin')

@section('content')

    <form method="POST" action="{{ route('Admin.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name" value="{{ __('Name') }}">Admin Name</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus
                autocomplete="name" />
        </div>

        <div class="mt-4">
            <label for="email" value="{{ __('Email') }}">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <div class="mt-4">
            <label for="phone" value="{{ __('phone') }}">Phone </label>
            <input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
        </div>

        <div class="mt-4">
            <label for="password" value="{{ __('Password') }}">Password</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required
                autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <label for="photo" value="{{ __('photo') }}">Photo</label>
            {{-- <label for="photo">Photo</label> --}}
            <input id="photo" type="file" class="form-control is-valid" name="photo" required>
        </div>

        <br>
        <div class="mt-4">
            <button type="submit" class="btn btn-success"> Create Admin</button>
        </div>



        </div>
    </form>

@stop
