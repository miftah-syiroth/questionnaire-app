@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="titel">Title</label>
                            <input type="text" required name="title"
                                class="form-control @error('title') is-invalid @enderror" id="title"
                                placeholder="Enter Title">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" required name="purpose"
                                class="form-control @error('purpose') is-invalid @enderror" id="purpose"
                                placeholder="Enter Purpose">
                            @error('purpose')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection