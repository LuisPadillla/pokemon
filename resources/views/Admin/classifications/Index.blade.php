@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>classifications</h1>
                <a class="text-right" href="/Admin/classifications/Create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">abilities</th>
                        <th scope="col">fication</th>
                        <th scope="col">japanese_name</th>
                        <th scope="col">type2</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($classifications as $classification)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $classification->abilities}}</td>
                        <td>{{ $classification->fication}}</td>
                        <td>{{ $classification->japanese_name}}</td>
                        <td>{{ $classification->type2}}</td>
                        <td>
                            <a href="/Admin/classifications/{{ $classification->_id }}">Details</a> |
                            <a href="/Admin/classifications/Edit/{{ $classification->_id }}">Edit</a> |
                            <a href="/Admin/classifications/Delete/{{ $classification->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection