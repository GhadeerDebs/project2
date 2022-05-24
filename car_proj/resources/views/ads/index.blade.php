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
                                <th scope="col">image</th>
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
                                    <td>
                                        @foreach ($images as $image)
                                        @if($image->adv_id==$item->id)
                                        <img src="  {{ $image->advertisement_photo_path }}" alt="  {{$item->advertisement_photo_path }}"
                                        class="img-tumbnail" width="100" height="100">
                                        @endif
                                        @endforeach

                                            {{-- {{$item->pictures->adv_id}} --}}
                                            {{-- {{$item->pictures->id}} --}}
                                    </td>

                                    <td>
                                        <a href="{{ route('ads.show', $item->id) }}"><button
                                                class="btn btn-info">show</button></a>
                                        <a href="{{ route('ads.edit', $item->id) }}"><button
                                                class="btn btn-warning">Edit</button></a>&nbsp;&nbsp;
                                        &nbsp;&nbsp;
                                       <div>
                                        <form action="{{ route('ads.destroy', $item->id) }}"
                                            onsubmit="return confirm('Are you sure?');" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button  class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>Delete</button>
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
                    There is not posts
                </div>
            </div>
        @endif

    </div>
@stop
