@extends('template')
@section('title', 'Models')

@section('content')
    @php
    $i = 0;
    $model = $models->first();
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
                        <a href="{{ route('Models.edit_model', $item->id) }}"><i class="fas fa-edit"
                                style="color:rgb(149, 196, 32)"></i></a>

                        <form action="{{ route('Models.destroy_model', $item->id) }}"
                            onsubmit="return confirm('Are you sure?');" method="POST">
                            @csrf
                            @method('GET')
                            <a href="{{ route('Models.destroy_model', $item->id) }}"><i class="fas fa-trash "
                                    style="color:rgb(232, 27, 0)"></i></a>&nbsp;&nbsp;
                        </form>


                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- <p>{{$model->make_years_id}}</p> --}}
    <button><a href="{{ route('Models.create_model',['year'=>$model->make_years_id]) }}">Add model</a></button>
@stop
