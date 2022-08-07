@extends('template')
@section('title', 'Free time for today')

@section('content')
    <link rel="stylesheet" href="{{ 'css/appointement.css' }}">
    {{-- @php
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


                </tr>
            @endforeach

        </tbody>
    </table> --}}
    {{-- <div class="container">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Time
                        </th>
                        <th class="text-uppercase">Today</th>

                    </tr>
                </thead>
                <tbody>
                    <tr> @php
                        $i = 0;
                    @endphp
                        <td class="align-middle">
                            @foreach ($appoinments as $item)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            <span
                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                            <div class="margin-10px-top font-size14">@php
                                $time_in_12_hour_format = date('g:i a', strtotime($item->startTime));
                                echo $time_in_12_hour_format;
                            @endphp</div>
                            <div class="font-size13 text-light-gray"></div>
                        </td>

                        <td>
                            <span
                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                            <div class="margin-10px-top font-size14">@php
                                $time_in_12_hour_format = date('g:i a', strtotime($item->start_time));
                                echo $time_in_12_hour_format;
                            @endphp</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>


                        <td>
                            @php
                                $time_in_12_hour_format = date('g:i a', strtotime($item->start_time));
                                echo $time_in_12_hour_format;
                            @endphp
                        </td>
                        <td>
                            <span
                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                            <div class="margin-10px-top font-size14">@php
                                $time_in_12_hour_format = date('g:i a', strtotime($item->end_time));
                                echo $time_in_12_hour_format;
                            @endphp</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>@php
                            $timestamp = strtotime($item->startTime) + 60 * 60;
                            $time = date('g:i a', $timestamp);
                            echo $time;
                        @endphp
                        </td>
                </tbody>
            </table>
        </div>
    </div> --}}
    <div class="container">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Time
                        </th>


                        <th class="text-uppercase">Start time</th>
                        <th class="text-uppercase">End time</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($appoinments as $item)
                        <tr>
                            <td class="align-middle">{{ ++$i }}</td>
                            <td>
                                <span
                                    class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                                <div class="margin-10px-top font-size14"> @php
                                    $time_in_12_hour_format = date('g:i a', strtotime($item->start_time));
                                    echo $time_in_12_hour_format;
                                @endphp</div>
                                {{-- <div class="font-size13 text-light-gray">Ivana Wong</div> --}}
                            </td>
                            <td>
                                <span
                                    class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                                <div class="margin-10px-top font-size14">@php
                                    $timestamp = strtotime($item->start_time) + 60 * 60;
                                    $time = date('g:i a', $timestamp);
                                    echo $time;
                                @endphp</div>
                                {{-- <div class="font-size13 text-light-gray">Marta Healy</div> --}}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
