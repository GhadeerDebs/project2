@extends('template')
@section('title', 'Appointments')

@section('content')
    @php
    $i = 0;
    @endphp
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Start time</th>
                <th scope="col">End time</th>
                <th scope="col">Date</th>
                <th scope="col">user email</th>
                <th scope="col">advertise id</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appoinments as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        @php
                            $time_in_12_hour_format = date('g:i a', strtotime($item->start_time));
                            echo $time_in_12_hour_format;
                        @endphp
                    </td>
                    <td>@php
                        $timestamp = strtotime($item->start_time) + 60 * 60;
                        $time = date('g:i a', $timestamp);
                        echo $time;
                    @endphp
                    </td>
                    <td>
                        {{$item->appoinment_date}}
                    </td>
                    <td>
                        {{$item->user->email}}
                    </td>
                    <td>
                        {{$item->adv_id}}
                    </td>
                    <td>
                        {{-- @php
                        $date=Carbon::parse($item->appoinment_date)->formate("Y-m-d");
                        $current= Carbon::now()->formate("Y-m-d");
                             if (Carbon::parse($date)->eq($current)){
                             echo "  <a href='{{ route('appointment.edit', $item->id) }}'><button
                            class='btn btn-success'>Edit</button></a>&nbsp;&nbsp";
                             }
                        @endphp --}}
                        {{-- @if ($item->appoinment_date == date('Y-m-d')) --}}
                        <a href="{{ route('appointment.edit', $item->id) }}"><button
                            class='btn btn-success'>Edit</button></a>&nbsp;&nbsp;
                        {{-- @endif --}}
                        <form action="{{ route('appointment.destroy', $item->id) }}"
                            onsubmit="return confirm('Are you sure?');" method="POST">
                            @csrf
                            @method('GET')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    @stop
