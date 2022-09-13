@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card border-top-warning border-bottom-warning">
                    @foreach($articles as $article)
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-journal-plus"></i>{{ $article->title }}</h5>
                            <div class="p-1">
                                {{ $article->body }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
