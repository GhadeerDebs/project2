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
                        <a href="{{ route('Models.edit_make', $item->id) }}"><i class=" fas fa-edit"
                                style="color:rgb(149, 196, 32)"></i></a>
                        <a href="{{ route('Models.relative_years', $item->id) }}"><i class="fas fa-eye "
                                style="color:rgb(47, 136, 252)"></i></a>&nbsp;&nbsp;
                        <a href="{{ route('Models.destroy_make', $item->id) }}"><i class="fa fa-trash"
                                style="color:rgb(232, 27, 0)"></i></a>&nbsp;&nbsp;

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <button><a href="{{ route('Models.create') }}">Add</a></button>
@stop
