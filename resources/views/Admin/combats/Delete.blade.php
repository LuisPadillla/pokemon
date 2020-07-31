@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/Admin/combats/Delete" method= "POST">
                @csrf
                @method('Delete')
                <input type="hidden" name="combatid" id="combatid" value="{{ $combat->_id }}">
                <div class="form-group">
                        <label for="First_pokemon">First_pokemon</label>
                        <input class="form-control" type="text" name="First_pokemon" id="First_pokemon" value="{{ $combat->First_pokemon }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Second_pokemon">Second_pokemon</label>
                        <input class="form-control" type="int" name="Second_pokemon" id="Second_pokemon" value="{{ $combat->Second_pokemon }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Winner">Winner</label>
                        <input class="form-control" type="int" name="Winner" id="Winner" value="{{ $combat->Winner }}" disabled>
                    </div>
                   
                    <a href="/Admin/combats/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection