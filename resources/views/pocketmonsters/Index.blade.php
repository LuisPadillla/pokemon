@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>pocketmonster</h1>
                <div class="row">
                        @foreach($pocketmonsters as $pocketmonster)
                        <div class="card col-md-3">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> {{$pocketmonster->name}}</h5>
                                <p class="card-text">Pokedex Number: {{$pocketmonster->pokedex_number}}</p>
                                <p class="card-text">Generation: {{$pocketmonster->generation}}</p>
                                <a href="/pocketmonsters/{{ $pocketmonster->_id}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 ">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mx-auto" role="group" aria-label="First group">
                                    @php 
                                        $cpage = request('pg') == 0 ? 1 : request('pg');
                                    @endphp

                                    <a href ="/pocketmonsters?pg={{ $cpage - 1 }}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                    @for ($i = 1; $i <= ceil($pocketmonsterCount/12); $i++)
                                    <a href="/pocketmonsters?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : ''}}">{{$i}}</a>
                                    @endfor
                                    <a href="/pocketmonsters?pg={{ $cpage + 1}}" class="btn btn-secondary {{$cpage == ceil($pocketmonsterCount/12) ? 'disabled' : '' }}">&gt</a>
                                </div>
                          </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
