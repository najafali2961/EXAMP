 <?php
 use App\Models\Language;
 
 $languages = Language::all();
 ?>
 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MCQ App</title>

     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <style>
         .container {
             max-width: 430px;
             height: 100%;
             display: flex;
             flex-direction: column;
             justify-content: space-between;
             padding: 20px;
         }
     </style>
 </head>

 <body>
     <div class="container mt-5">
         <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
             <a class="navbar-brand" href="/">MCQ App</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                 aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav ms-auto">
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                             data-bs-toggle="dropdown" aria-expanded="false">
                             Select Languages
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                             <form action="{{ url('change-languages') }}" method="POST">
                                 @csrf
                                 @foreach ($languages as $language)
                                     <li>
                                         <label class="dropdown-item">
                                             <input type="checkbox" name="languages[]" value="{{ $language->id }}"
                                                 @if (in_array($language->id, session('language_ids', []))) checked @endif>
                                             {{ $language->name }}
                                         </label>
                                     </li>
                                 @endforeach
                                 <li class="dropdown-item">
                                     <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                                 </li>
                             </form>
                         </ul>
                     </li>
                 </ul>
             </div>
         </nav>

         @yield('content')
     </div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="{{ asset('js/app.js') }}"></script>
 </body>

 </html>
