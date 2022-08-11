@extends('template')
@section('title', ' Edit')

@section('content')
<form action="{{route('appointment.update',$appointment->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @php
    $i = 0;
    @endphp
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
                        <input type="hidden" name="hour_id"  value="{{$item['id']}}">
                        <input type="hidden" name="start_time"  value="{{$item['startTime']}}">
                        @php
                            echo $item['startTime'];
                        @endphp
                    </td>
                    <td>
                        <input type="hidden" name="end_time"  value="{{$item['endTime']}}">
                        @php
                         echo $item['endTime'];
                        @endphp
                    </td>
                    <td>
                        <input type="hidden" name="user"  value="{{$item['user']}}">
                    </td>
                    <td>
                        <button class="btn btn-primary" type="submit">choose</button>
                    </td>
                </tr>
            @endforeach
            {{-- @dd($hours) --}}
        </tbody>
    </table>
  </form>
@stop
