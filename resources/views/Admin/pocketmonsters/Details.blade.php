@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $pocketmonster->name}}</b></h4>
                        
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>pokedex number </b> {{ $pocketmonster->pokedex_number }}</li>
                        <li class="list-group-item"><b>generation </b> {{ $pocketmonster->generation }}</li>
                  
                      
                    </ul>
                    <div class="card-body">
                        <a href="/Admin/pocketmonsters/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/Admin/pocketmonsters/Edit/{{ $pocketmonster->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/Admin/pocketmonsters/Delete/{{ $pocketmonster->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
