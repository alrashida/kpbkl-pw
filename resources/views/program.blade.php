<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <title>Program</title>
</head>
<body>
  @include('fonts')
    @include('navbar')

      <div class="programbanner">
        {{-- <img src="image/tapislampung.png" alt="program" class="program-image"> --}}
            <h1>PROGRAM</h1>
            <h2>PROGRAM KAMI</h2>
      </div>

      <div class="program-container">
        @foreach ($programs as $program)
          <div class="program-item">
            <img src="{{ asset('programimages/'. $program->image) }}" alt="program-image" class="">        
            <div class="program-content">
              <h3>{{$program->title}}</h3>
                <p><strong>Created at:</strong> {{ $program->created_at->format('Y-m-d') }}</p>
              <p>{{ $program->content }}</p>
              <a href="{{ route('program.show', $program->id) }}" class="btn btn-primary">View Details</a>
            </div>
          </div>
        @endforeach
      </div>

    @include('footer')
</body>
</html>