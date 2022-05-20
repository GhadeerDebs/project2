@extends('template')
@section('title', 'Dealerships')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">All Advertisemints</h1>
                    </div>
                </div>
                <a href="{{ route('ads.create') }} ">
                    <button type="button" class="btn btn-success">Create advertise</button></a> &nbsp; &nbsp; &nbsp;

                </button></a>
            </div>
        </div>
        <hr>
        <br>
        <br>
        @if ($ads->count() > 0)
            @php
                $id = 1;
            @endphp
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">model</th>
                                <th scope="col">type</th>
                                <th scope="col">Color</th>
                                <th scope="col">gearbox</th>
                                <th scope="col">engine power</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $item)
                                <tr>
                                    <th scope="row">{{ $id++ }}</th>
                                    <td>{{ $item->model->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>{{ $item->gearbox }}</td>
                                    <td>{{ $item->engine_power }}</td>

                                    <td>
                                        <a href="{{ route('ads.show', $item->id) }}"><button
                                                class="btn btn-info">show</button></a>

                                        <a href="{{ route('ads.destroy', $item->id) }}"><button
                                                class="btn btn-danger">Delete</button></a>
                                        <a href="{{ route('ads.edit', $item->id) }}"><button
                                                class="btn btn-warning">Edit</button></a>&nbsp;&nbsp;
                                        &nbsp;&nbsp;

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
                    There is not posts
                </div>
            </div>
        @endif

    </div>
@stop
