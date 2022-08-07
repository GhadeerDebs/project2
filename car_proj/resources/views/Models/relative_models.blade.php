@extends('template')
@section('title', 'Models')

@section('content')
    @php
    $i = 0;
    $year=$models->first();
    @endphp
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Model</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('Models.edit_model', $item->id) }}"><i class="fas fa-edit"></i></a>

                        <form action="{{ route('Models.destroy_model', $item->id) }}"
                            onsubmit="return confirm('Are you sure?');" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                        {{-- <a href="{{ route('Models.destroy_model', $item->id) }}"><i
                                class="fas fa-trash "></i></a>&nbsp;&nbsp; --}}

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- <button><a href="{{ route('Models.create_model',['year'=>$year]) }}">Add model</a></button> --}}
@stop
