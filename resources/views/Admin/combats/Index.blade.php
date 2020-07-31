@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>combats</h1>
                <a class="text-right" href="/Admin/combats/Create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First_pokemon</th>
                        <th scope="col">Second_pokemon</th>
                        <th scope="col">Winner</th>
                        
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($combats as $combat)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $combat->First_pokemon}}</td>
                        <td>{{ $combat->Second_pokemon}}</td>
                        <td>{{ $combat->Winner}}</td>
                        <td>
                            <a href="/Admin/combats/{{ $combat->_id }}">Details</a> |
                            <a href="/Admin/combats/Edit/{{ $combat->_id }}">Edit</a> |
                            <a href="/Admin/combats/Delete/{{ $combat->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection