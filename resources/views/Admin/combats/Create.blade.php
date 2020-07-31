@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/Admin/combats/Create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="First_pokemon">First_pokemon</label>
                        <input class="form-control" type="text" name="First_pokemon" id="First_pokemon">
                    </div>
                    <div class="form-group">
                        <label for="Second_pokemon">Second_pokemon</label>
                        <input class="form-control" type="int" name="Second_pokemon" id="Second_pokemon">
                    </div>
                    <div class="form-group">
                        <label for="Winner">Winner</label>
                        <input class="form-control" type="int" name="Winner" id="Winner">
                    </div>
                   
                    <a href="/Admin/combats/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection