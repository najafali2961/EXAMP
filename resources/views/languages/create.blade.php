<!-- resources/views/languages/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Language
        </div>
        <div class="card-body">
            <form action="{{ route('languages.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
