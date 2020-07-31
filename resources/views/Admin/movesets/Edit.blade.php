@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/Admin/movesets/Edit" method= "POST">
                @csrf
                <input type="hidden" name="cameraid" id="cameraid" value="{{ $moveset->_id }}">
                <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name" value="{{ $moveset->Name }}">
                    </div>
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <input class="form-control" type="int" name="Type" id="Type" value="{{ $moveset->Type }}">
                    </div>
                    <div class="form-group">
                        <label for="Effect">Effect</label>
                        <input class="form-control" type="int" name="Effect" id="Effect" value="{{ $moveset->Effect }}">
                    </div>
           
                <a href="/Admin/movesets/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection