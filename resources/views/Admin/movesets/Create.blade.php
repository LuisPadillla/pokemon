@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/Admin/movesets/Create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name">
                    </div>
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <input class="form-control" type="int" name="Type" id="Type">
                    </div>
                    <div class="form-group">
                        <label for="Effect">Effect</label>
                        <input class="form-control" type="int" name="Effect" id="Effect">
                    </div>
        
                   
                    <a href="/Admin/movesets/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection