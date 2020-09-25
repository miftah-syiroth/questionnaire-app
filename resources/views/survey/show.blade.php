@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$questionnaire->title}}</h1>

            <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                @csrf
                @foreach ($questionnaire->questions as $key => $question)
                <div class="card mt-3">
                    <div class="card-header @error('responses.'. $key . '.answer_id') is-invalid @enderror">
                        <strong>{{$key + 1 }}.
                        </strong>{{$question->question}}</div>
                    @error('responses.'. $key . '.answer_id')
                    <small class="alert alert-danger">{{$message}}</small>
                    @enderror
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input"
                                        {{(old('responses.'. $key . '.answer_id') == $answer->id) ? 'checked': ''}}
                                        type="radio" name="responses[{{$key}}][answer_id]" id="answer{{$answer->id}}"
                                        value="{{$answer->id}}">
                                    <label class="form-check-label" for="answer{{$answer->id}}">
                                        {{$answer->answer}}
                                    </label>
                                    <input type="hidden" name="responses[{{$key}}][question_id]"
                                        value="{{$question->id}}">
                                    @error('record')

                                    @enderror
                                </div>
                            </li>
                            @endforeach
                    </div>
                </div>
                @endforeach

                <div class="card mt-3">
                    <div class="card-header">Your Informations</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">your name</label>
                            <input type="text" required name="survey[name]"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Enter name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">your email</label>
                            <input type="email" required name="survey[email]"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Enter email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">save</button>
            </form>
        </div>
    </div>
</div>
@endsection