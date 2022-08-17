@extends('template')
@section('title', 'users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">All Users</h1>
                    </div>
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
                                        <div>
                                            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fas fa-trash "
                                                        style="color:rgb(232, 27, 0)"></i></button> <a
                                                    href="{{ route('user.edit', $item->id) }}"><i class="fas fa-edit"
                                                        style="color:rgb(149, 196, 32)"></i></a>
                                            </form>
                                        </div>
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
