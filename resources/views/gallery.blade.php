<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Gallery</title>
</head>
<body>
    @include('fonts')
    @include('navbar')

      <div class="programbanner">
        {{-- <img src="image/tapislampung.png" alt="program" class="program-image"> --}}
            <h1>GALLERY</h1>
            <h2>BERANDA/GALLERY</h2>
      </div>

      <div class="program-container">
        @foreach ($Gallery as $Gallery)
          <div class="program-item">
            <img src="{{ asset('galleryimages/'. $Gallery->image) }}" alt="program-image" class="">        
            <div class="program-content">
              <h3>{{$Gallery->title}}</h3>
                <p><strong>Created at:</strong> {{ $Gallery->created_at->format('Y-m-d') }}</p>
              <p>{{ $Gallery->description }}</p>
              <a href="{{ route('gallery.show', $Gallery->id) }}" class="btn btn-primary">View Details</a>
            </div>
          </div>
        @endforeach
      </div>

    @include('footer')
</body>
</html>