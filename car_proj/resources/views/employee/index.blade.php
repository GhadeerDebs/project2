@extends('template')
@section('title', 'users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">All Employees</h1>
                    </div>
                </div>
                <a href="{{ route('Employee.create') }} ">
                    <button type="button" class="btn btn-success">Create Employee</button></a> &nbsp; &nbsp; &nbsp;

                    @if(Auth::user()->type=='admin')
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
                            <th scope="col">#</th>
                            <th scope="col">user name</th>
                            <th scope="col">user email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <th scope="row">{{ $id++ }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    {{-- <form action="{{ route('Employee.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>&nbsp;&nbsp; --}}

                                            <form action="{{ route('Employee.destroy', $item->id) }}"
                                                onsubmit="return confirm('Are you sure?');" method="POST">
                                                @csrf
                                                @method('GET')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form> &nbsp;&nbsp;
                                    <a href="{{ route('Employee.edit', $item->id) }}"><button
                                            class="btn btn-success">Edit</button></a>&nbsp;&nbsp;
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
