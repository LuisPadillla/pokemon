@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/Admin/combats/Edit" method= "POST">
                @csrf
                <input type="hidden" name="combatid" id="combatid" value="{{ $combat->_id }}">
                <div class="form-group">
                        <label for="First_pokemon">First_pokemon</label>
                        <input class="form-control" type="text" name="First_pokemon" id="First_pokemon" value="{{ $combat->First_pokemon }}">
                    </div>
                    <div class="form-group">
                        <label for="Second_pokemon">Second_pokemon</label>
                        <input class="form-control" type="int" name="Second_pokemon" id="Second_pokemon" value="{{ $combat->Second_pokemon }}">
                    </div>
                    <div class="form-group">
                        <label for="Winner">Winner</label>
                        <input class="form-control" type="int" name="Winner" id="Winner" value="{{ $combat->Winner }}">
                    </div>
                  
                <a href="/Admin/combats/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection