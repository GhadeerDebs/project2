@extends('template')
@section('title', 'Dealerships')

@section('content')
    @php
    $i = 0;
    @endphp
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">phone</th>
                <th scope="col">image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dealerships as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <img src="  {{ $item->dealer_photo_path }}" alt="  {{ $item->dealer_photo_path }}"
                            class="img-tumbnail" width="100" height="100">
                    </td>
                    <td>
                        <a href="{{ route('dealership.edit', $item->id) }}"><i class="fas fa-edit"></i></a>

                        <form action="{{ route('dealership.destroy', $item->id) }}"
                            onsubmit="return confirm('Are you sure?');" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <button><a href="{{ route('dealership.create') }}">Add</a></button>
@stop
