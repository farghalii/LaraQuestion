@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="h3">{{$question->title}}</h1>
                            <div>
                                <a href="{{route('questions.index')}}" class="btn btn-outline-primary">Questions</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media">
                            <vote :model="{{$question}}" name="question"></vote>
                            <div class="media-body">
                                {!! $question->body_html !!}
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <author-info :model="{{$question}}" label="Asked"></author-info>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Answers --}}
        <answers :question="{{$question}}"></answers>
        @auth
        @else
            <div class="row justify-content-center mt-2">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{route('register')}}"> Create an account</a> or <a
                                href="{{route('login')}}">login</a> to add your answer.
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
