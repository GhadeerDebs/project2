@extends('template')
@section('title', 'Ads')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Result of search</h1>
                    </div>
                </div>

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

                                    <td>{{ $item->model->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>{{ $item->gearbox }}</td>
                                    <td>
                                        <div class="row">
                                            @foreach ($images as $image)
                                                @if ($image->adv_id == $item->id)
                                                    <div class="col">
                                                        <img src="  {{ $image->advertisement_photo_path }}"
                                                            alt="  {{ $item->advertisement_photo_path }}"
                                                            class="img-tumbnail" width="100" height="100">
                                                    </div>
                                                @endif
                                            @endforeach

                                            {{-- {{$item->pictures->adv_id}} --}}
                                            {{-- {{$item->pictures->id}} --}}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="row">
                                            <div class="col"> <a href="{{ route('ads.show', $item->id) }}"><i
                                                        class="fas fa-eye" style="color:rgb(47, 136, 252)"></i></a></div>
                                            <div class="col"> <a href="{{ route('ads.edit', $item->id) }}">
                                                    <i class="fas fa-edit" style="color:rgb(149, 196, 32)"></i></a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('ads.destroy', $item->id) }}"
                                                    onsubmit="return confirm('Are you sure?');" method="POST">
                                                    @csrf
                                                    @method('GET')
                                                    <a href="{{ route('ads.destroy', $item->id) }}"> <i class="fas fa-trash"
                                                            style="color:rgb(232, 27, 0)"></i></a>
                                            </div>

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
