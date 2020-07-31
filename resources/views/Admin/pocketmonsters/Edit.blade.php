@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/Admin/pocketmonsters/Edit" method= "POST">
                @csrf
                <input type="hidden" name="cameraid" id="cameraid" value="{{ $pocketmonster->_id }}">
                <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $pocketmonster->name }}">
                    </div>
                    <div class="form-group">
                        <label for="pokedex_number">pokedex_number</label>
                        <input class="form-control" type="int" name="pokedex_number" id="pokedex_number" value="{{ $pocketmonster->pokedex_number }}">
                    </div>
                    <div class="form-group">
                        <label for="generation">generation</label>
                        <input class="form-control" type="int" name="generation" id="generation" value="{{ $pocketmonster->generation }}">
                    </div>
           
                <a href="/Admin/pocketmonsters/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection