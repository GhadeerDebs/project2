@extends('template')
@section('title', 'Brands')

@section('content')
    @php
    $i = 0;
    @endphp
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($makes as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('Models.edit_make', $item->id) }}"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('Models.relative_years', $item->id) }}"><i
                            class="fas fa-eye "></i></a>&nbsp;&nbsp;
                        {{-- <form action="{{ route('dealership.destroy', $item->id) }}"
                            onsubmit="return confirm('Are you sure?');" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash"></i></button>
                        </form> --}}
                        <a href="{{ route('Models.destroy_make', $item->id) }}"><i
                                class="fas fa-trash "></i></a>&nbsp;&nbsp;

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <button><a href="{{ route('Models.create') }}">Add</a></button>
@stop
