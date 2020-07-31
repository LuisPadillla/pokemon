@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $combat->First_pokemon}}</b></h4>
                
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Release Date: </b> {{ $combat->Second_pokemon }}</li>
                        <li class="list-group-item"><b>Max Resolution: </b> {{ $combat->Winner }}</li>
                      
                 
                    </ul>
                    <div class="card-body">
                        <a href="/Admin/combats/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/Admin/combats/Edit/{{ $combat->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/Admin/combats/Delete/{{ $combat->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
