@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/Admin/pocketmonsters/Delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="pocketmonsterid" id="pocketmonsterid" value="{{ $pocketmonster->_id }}">
                <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $pocketmonster->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="pokedex_number">pokedex_number</label>
                        <input class="form-control" type="int" name="pokedex_number" id="pokedex_number" value="{{ $pocketmonster->pokedex_number }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="generation">generation</label>
                        <input class="form-control" type="int" name="generation" id="generation" value="{{ $pocketmonster->generation }}" disabled>
                    </div>
                   
                   
                    <a href="/Admin/pocketmonsters/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection