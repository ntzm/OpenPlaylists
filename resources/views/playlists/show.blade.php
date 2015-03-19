@extends('app')

@section('content')
<div class="container">
    <div class="row" data-playlist-id="{{ $playlist->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="page-header">
                    <h1>{{ $playlist->name }} <small>By {{ $playlist->user->name }}</small></h1>
                </div>
                @if (!is_null($playlist->forkParent))
                    <p class="text-muted">
                        <i class="fa fa-code-fork"></i>
                        Fork of <a href="{{ route('playlists.show', [$playlist->forkParent]) }}">
                            {{ $playlist->forkParent->name }}
                        </a> by {{ $playlist->forkParent->user->name }}
                    </p>
                @endif
                @if (Auth::check())
                    <a href="{{ route('playlists.fork', [$playlist]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Fork this playlist">
                        <i class="fa fa-code-fork fa-lg"></i>
                        <span class="sr-only">Fork this playlist</span>
                    </a>
                @endif
            </div>
            <div class="col-md-6 well">
                <div id="player"></div>
                <hr>
                <div class="text-center">
                    <div class="btn-group btn-group-lg" role="group" aria-label="Playlist controls">
                        <button type="button" class="btn btn-default" id="previous">
                            <i class="fa fa-fast-backward"></i>
                            <span class="sr-only">Previous song</span>
                        </button>
                        <button type="button" class="btn btn-default" id="play">
                            <i class="fa fa-play"></i>
                            <span class="sr-only">Play/Pause song</span>
                        </button>
                        <button type="button" class="btn btn-default" id="next">
                            <i class="fa fa-fast-forward"></i>
                            <span class="sr-only">Next song</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="list-group row"></div>
    </div>
</div>
@stop

@section('scripts')
<script src="/js/playlists-show.js"></script>
@stop