@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire->title}}</div>
                <div class="card-body">

                    <a href="/questionnaires/{{$questionnaire->id}}/questions/create" class="btn btn-primary">Create
                        Question</a>
                    <a href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}"
                        class="btn btn-primary ml-2">Take Survey</a>
                </div>
            </div>
            @forelse ($questionnaire->questions as $question)
            <div class="card mt-3">
                <div class="card-header">{{$question->question}}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($question->answers as $answer)
                        <li class="list-group-item">
                            <div>{{$answer->answer}}</div>
                            @if ($question->responses->count() > 0)
                            <div class="justify-content-between">
                                {{intval($answer->responses->count() * 100 / $question->responses->count())}}%</div>
                            @endif

                        </li>
                        @endforeach
                </div>
                <div class="card-footer">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm btn">Delete Question</button>
                    </form>
                </div>
            </div>
            @empty
            <h5>No Questions</h5>
            @endforelse
        </div>
    </div>
</div>
@endsection