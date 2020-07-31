@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>pocketmonsters</h1>
                <a class="text-right" href="/Admin/pocketmonsters/Create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">pokedex_number</th>
                        <th scope="col">generation</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pocketmonsters as $pocketmonster)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $pocketmonster->name}}</td>
                        <td>{{ $pocketmonster->pokedex_number}}</td>
                        <td>{{ $pocketmonster->generation}}</td>
                        
                        <td>
                            <a href="/Admin/pocketmonsters/{{ $pocketmonster->_id }}">Details</a> |
                            <a href="/Admin/pocketmonsters/Edit/{{ $pocketmonster->_id }}">Edit</a> |
                            <a href="/Admin/pocketmonsters/Delete/{{ $pocketmonster->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection