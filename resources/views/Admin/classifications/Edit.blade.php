@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/Admin/classifications/Edit" method= "POST">
                @csrf
                <input type="hidden" name="cameraid" id="cameraid" value="{{ $classification->_id }}">
                <div class="form-group">
                        <label for="abilities">abilities</label>
                        <input class="form-control" type="text" name="abilities" id="abilities" value="{{ $classification->abilities }}">
                    </div>
                    <div class="form-group">
                        <label for="fication">fication</label>
                        <input class="form-control" type="int" name="fication" id="fication" value="{{ $classification->fication }}">
                    </div>
                    <div class="form-group">
                        <label for="japanese_name">japanese_name</label>
                        <input class="form-control" type="int" name="japanese_name" id="japanese_name" value="{{ $classification->japanese_name }}">
                    </div>
                    <div class="form-group">
                        <label for="type2">type2</label>
                        <input class="form-control" type="int" name="type2" id="type2" value="{{ $classification->type2 }}">
                    </div>
                <a href="/Admin/classifications/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection