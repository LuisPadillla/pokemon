@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/Admin/pocketmonsters/Create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="pokedex_number">pokedex_number</label>
                        <input class="form-control" type="int" name="pokedex_number" id="pokedex_number">
                    </div>
                    <div class="form-group">
                        <label for="generation">generation</label>
                        <input class="form-control" type="int" name="generation" id="generation">
                    </div>
                   
                    <a href="/Admin/pocketmonsters/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection