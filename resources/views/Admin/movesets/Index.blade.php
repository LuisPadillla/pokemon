@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>movesets</h1>
                <a class="text-right" href="/Admin/movesets/Create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Effect</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($movesets as $moveset)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $moveset->Name}}</td>
                        <td>{{ $moveset->Type}}</td>
                        <td>{{ $moveset->Effect}}</td>
                        
                        <td>
                            <a href="/Admin/movesets/{{ $moveset->_id }}">Details</a> |
                            <a href="/Admin/movesets/Edit/{{ $moveset->_id }}">Edit</a> |
                            <a href="/Admin/movesets/Delete/{{ $moveset->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection