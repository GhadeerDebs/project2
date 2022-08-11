@extends('template')
@section('title', 'Dealerships')

@section('content')
    @php
    $i = 0;
    @endphp
    <table class="table table-striped table-hover"style="width:1000px">
        <thead>
            <tr>
                <th scope="col">Dealership </th>
                <th scope="col">Dealership Name</th>
                <th scope="col">Location</th>
                <th scope="col">phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dealerships as $item)
                <tr>
                    <td>
                        <img src="  {{ $item->dealer_photo_path }}" alt="  {{ $item->dealer_photo_path }}" class="img-tumbnail"
                            width="100" height="100">
                    </td>


                    <td>{{ $item->name }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="{{ route('dealership.edit', $item->id) }}"><i class="fas fa-edit"
                                style="color:rgb(149, 196, 32)"></i></a>
                        <a href="{{ route('dealership.destroy', $item->id) }}"><i class="fas fa-trash "
                                style="color:rgb(232, 27, 0)"></i></a>&nbsp;&nbsp;

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
    <p><button><a style="color:rgb(217, 16, 16)" href="{{ route('dealership.create') }}">Insert new dealership</a></button>
    </p>

@stop
