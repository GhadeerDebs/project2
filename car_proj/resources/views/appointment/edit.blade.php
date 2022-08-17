@extends('template')
@section('title', ' Edit')

@section('content')
    @php
    $i = 0;
    @endphp
    <div class="container" style="padding-top: 4%">
        @if (session('status'))
        <div class=" alert alert-success" id='box'>
                {{ session('status') }}
            </div>

        </div>
        @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Start time</th>
                <th scope="col">End time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hours as $item)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>

                        @php
                            echo $item['startTime'];
                        @endphp
                    </td>
                    <td>

                        @php
                         echo $item['endTime'];
                        @endphp
                    </td>
                    <td>

                        <form action="{{ route('appointment.update',$appointment->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="hour_id"  value="{{$item['id']}}">
                            <input type="hidden" name="start_time"  value="{{$item['startTime']}}">
                            <input type="hidden" name="end_time"  value="{{$item['endTime']}}">
                            <input type="hidden" name="user"  value="{{$item['user']}}">
                            <button class="btn btn-primary" type="submit">choose </button>
                    </form>
                    </td>
                </tr>
            @endforeach
            {{-- @dd($hours) --}}
        </tbody>
    </table>
@stop
