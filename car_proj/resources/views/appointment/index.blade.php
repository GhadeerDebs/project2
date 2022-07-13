@extends('template')
@section('title', 'Free time for today')

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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hours as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        @php
                        $time_in_12_hour_format  = date("g:i a", strtotime($item->startTime));
                        echo  $time_in_12_hour_format ;
                        @endphp
                        </td>
                    <td>@php
                    $timestamp = strtotime($item->startTime ) + 60*60;
                    $time = date('g:i a', $timestamp);
                    echo $time;
                    @endphp
                    </td>
                    <td>
                        <a href="{{route('appointment.book',$item->id)}}"> Book</i></a>&nbsp;&nbsp;

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@stop
