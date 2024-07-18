 <!-- resources/views/subjects/create.blade.php -->
 @extends('layouts.app')

 @section('content')
     <div class="container">
         <h1 class="my-4">Create Subject</h1>
         <form action="{{ route('subjects.store') }}" method="POST">
             @csrf
             @foreach ($languages as $language)
                 <div class="form-group">
                     <label for="name_{{ $language->code }}">Name ({{ $language->name }})</label>
                     <input type="text" class="form-control" id="name_{{ $language->code }}"
                         name="name_{{ $language->code }}" required>
                 </div>
             @endforeach
             <button type="submit" class="btn btn-primary">Create</button>
         </form>
     </div>
 @endsection
