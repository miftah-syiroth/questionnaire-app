@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" required name="question[question]"
                                class="form-control @error('question') is-invalid @enderror" id="question"
                                placeholder="Enter question" value="{{old('question.question')}}">
                            @error('question.question')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">choice 1</label>
                                        <input type="text" required name="answers[][answer]"
                                            class="form-control @error('answers.0.answer') is-invalid @enderror"
                                            id="answer1" placeholder="Enter choice 1"
                                            value="{{old('answers.0.answer')}}">
                                        @error('answers.0.answer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="answer2">choice 2</label>
                                        <input type="text" required name="answers[][answer]"
                                            class="form-control @error('answers.1.answer') is-invalid @enderror"
                                            id="answer2" placeholder="Enter choice 2"
                                            value="{{old('answers.1.answer')}}">
                                        @error('answers.1.answer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="answer3">choice 3</label>
                                        <input type="text" required name="answers[][answer]"
                                            class="form-control @error('answers.2.answer') is-invalid @enderror"
                                            id="answer3" placeholder="Enter choice 3"
                                            value="{{old('answers.2.answer')}}">
                                        @error('answers.2.answer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="answer4">choice 4</label>
                                        <input type="text" required name="answers[][answer]"
                                            class="form-control @error('answers.3.answer') is-invalid @enderror"
                                            id="answer4" placeholder="Enter choice 4"
                                            value="{{old('answers.3.answer')}}">
                                        @error('answers.3.answer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection