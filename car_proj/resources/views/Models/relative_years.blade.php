@extends('template')
@section('title', 'Years')

@section('content')
    @php
    $i = 0;
    $make = $years->first();
    @endphp
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Year</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($years as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->year }}</td>
                    <td>


                        <a href="{{ route('Models.edit_year', $item->id) }}"><i class="fas fa-edit"
                                style="color:rgb(149, 196, 32)"></i></a>
                        <a href="{{ route('Models.relative_models', $item->id) }}"><i class="fas fa-eye "
                                style="color:rgb(47, 136, 252)"></i></a>

                        <a href="{{ route('Models.destroy_year', $item->id) }}"><i class="fas fa-trash"
                                style="color:rgb(232, 27, 0)"></i></a>

                        {{-- <a href="{{ route('Models.destroy_year', $item->id) }}"><i
                                class="fas fa-trash "></i></a>&nbsp;&nbsp; --}}

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <button><a href="{{ route('Models.create_year', ['make' => $make]) }}">Add Year</a></button>
@stop
