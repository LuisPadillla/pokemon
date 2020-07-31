@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/Admin/movesets/Delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="movesetid" id="movesetid" value="{{ $moveset->_id }}">
                <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name" value="{{ $moveset->Name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <input class="form-control" type="int" name="Type" id="Type" value="{{ $moveset->Type }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Effect">Effect</label>
                        <input class="form-control" type="int" name="Effect" id="Effect" value="{{ $moveset->Effect }}" disabled>
                    </div>
                   
                   
                    <a href="/Admin/movesets/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection