@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/Admin/classifications/Create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="abilities">abilities</label>
                        <input class="form-control" type="text" name="abilities" id="abilities">
                    </div>
                    <div class="form-group">
                        <label for="fication">fication</label>
                        <input class="form-control" type="int" name="fication" id="fication">
                    </div>
                    <div class="form-group">
                        <label for="japanese_name">japanese_name</label>
                        <input class="form-control" type="int" name="japanese_name" id="japanese_name">
                    </div>
                    <div class="form-group">
                        <label for="type2">type2</label>
                        <input class="form-control" type="int" name="type2" id="type2">
                   
                    <a href="/Admin/classifications/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection