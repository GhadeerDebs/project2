@extends('template')
@section('title', 'Brands')

@section('content')
    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">

                    <h1 class="display-4">Brands of cars</h1>

                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">

                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" type="get" action="{{ route('Models.search') }}">
                        <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search Brand"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    @php
    $i = 0;
    @endphp
    <div>

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
        </table>{{ $makes->links() }}
        <button><a href="{{ route('Models.create') }}">Add</a></button>
    </div>
@stop
