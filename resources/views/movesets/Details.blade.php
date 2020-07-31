@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h1 class="card-title"><b>{{ $moveset->Name}}</b></h1>
                    <h3 class="card-subtitle mb-2 text-muted">{{ $moveset->Type}}</h3>
                    <p class ="card-text">{{$moveset->Effect}}</p>
                </div>
                <div class="card-footer">
                    <p><b>Rating:</b></p>
                    <input type="radio" name="rating" id="rating">&nbsp1 </input>
                    <input type="radio" name="rating" id="rating">&nbsp2 </input>
                    <input type="radio" name="rating" id="rating">&nbsp3 </input>
                    <input type="radio" name="rating" id="rating">&nbsp4 </input>
                    <input type="radio" name="rating" id="rating">&nbsp5 </input>
                </div> 
            </div>
            <div class="col-md-12">
                <h3><br>Add comments</br></h3>
                <form action="/movesets/comment" method="POST">
                    @csrf
                    <input type="hidden" name="movesetid" id="movesetid" value="{{ $moveset->_id }}">
                    <div class="form-group">
                        <label for="userid">User ID</label>
                        <input type="text" class="form-control" name="userid" id="userid">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comments</label>
                        <textarea name="comment" id="comment" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Add comment</button>
                </form>
            </div>

            <div class="col-md-12">
                <h3> <br> User comments</br> </h3>
                @if (count($moveset->Comments) == 0 || $moveset->Comments == null || empty($moveset->Comments))
                    <h5 class="text-muted">No comments yet.</h5>
                @else
                    @foreach ($moveset->Comments as $comment)
                    <div class="card col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->user_id }}</h5>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <h6 class="card-subtitle mb-2 text-muted">Date Published: {{ $comment->date }} UTC</h6>
                        </div>
                        </div>
                    @endforeach
                @endif
            </div>
            &nbsp&nbsp&nbsp&nbsp<a href="/movesets/" class="btn btn-light btn-lg active">Back</a>
        </div>
    </div>
@endsection