@extends('template')
@section('title', 'users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">

                        <h1 class="display-4">{{ $who }}</h1>

                    </div>
                </div>
                <a href="{{ route('Employee.create') }} ">
                    <button type="button" class="btn btn-success">Create Employee</button></a> &nbsp; &nbsp; &nbsp;

                @if (Auth::user()->type == 'admin')
                    <a href="{{ route('Admin.create') }} ">
                        <button type="button" class="btn btn-success">Create Admin</button></a> &nbsp; &nbsp; &nbsp;
                @endif
            </div>
        </div>
    </div>
    <hr>
    <br>
    <br>
    @if ($users->count() > 0)
        @php
            $id = 1;
        @endphp
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">user name</th>
                            <th scope="col">user email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <form action="{{ route('Employee.destroy', $item->id) }}"
                                                    onsubmit="return confirm('Are you sure?');" method="POST">
                                                    @csrf
                                                    @method('GET') <a href="{{ route('Employee.destroy', $item->id) }}">
                                                        <i class="fas fa-trash" style="color:rgb(232, 27, 0)"></i></a>
                                                </form>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <a href="{{ route('Employee.edit', $item->id) }}"> <i class="fas fa-edit"
                                                        style="color:rgb(149, 196, 32)"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    @else
        <div class="col">
            <div class="alert alert-danger" role="alert">
                There is not Users
            </div>
        </div>
    @endif
@stop
