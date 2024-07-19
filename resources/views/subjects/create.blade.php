 <!-- resources/views/subjects/create.blade.php -->
 @extends('layouts.app')

 @section('content')
     <div class="card">
         <div class="card-header">
             Create Subject
         </div>
         <div class="card-body">
             <form action="{{ route('subjects.store') }}" method="POST">
                 @csrf
                 @foreach ($languages as $language)
                     <div class="mb-3">
                         <label class="form-label" for="name_{{ $language->code }}">Name ({{ $language->name }})</label>
                         <input type="text" class="form-control" id="name_{{ $language->code }}"
                             name="name_{{ $language->code }}" required>
                     </div>
                 @endforeach
                 <button type="submit" class="btn btn-primary">Create</button>
             </form>
         </div>
     </div>
 @endsection
