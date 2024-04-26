<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  
  @include('fonts')
  @include('navbar')

<!-- Navbar -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block-h-100" src="image/slideshow1.jpeg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block-h-100" src="image/slideshow2.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block-h-100" src="image/slideshow3.jpeg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="banner">
    <h1 style="font-family: 'Dancing Script', cursive;">Put Motto here</h1>
  </div>

  <div class="latest-program">
    <div class="latest-program-container">
      @foreach ($Programs->take(5) as $program)
        <div class="program-item">
          <img src="{{ asset('programimages/'. $program->image) }}" alt="program-image" class="">        
          <div class="program-content">
            <h3>{{$program->title}}</h3>
              <p><strong>Created at:</strong> {{ $program->created_at->format('Y-m-d') }}</p>
            <p class="isi-program">{{ $program->content }}</p>
            <a href="{{ route('program.show', $program->id) }}" class="btn btn-primary">View Details</a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="text-center">
      <a href="{{ route('program')}}" class="button-program">Lihat Semua Program</a>
    </div>
  </div>

  
  <h2 class="gallery-title">Gallery</h2>
  
  <div class="gallery-area">
    <div class="gallery">
      @foreach ($Gallerys as $gallery) 
          <div class="container">
            <a href="{{ route('gallery.show', $gallery->id) }}">
              <img src="{{ asset('galleryimages/'. $gallery->image) }}" alt="Image 1" data-description="Description for Image 1" class="image">
            </a>
              <div class="overlay">              
                <div class="text">
                  <h5><b>{{ $gallery->title}}</b></h5>
                  <p>{{ $gallery->description }}</p>
              </div>
              </div>
          </div>
      @endforeach
      <!-- Repeat for more images -->
    </div>
  </div>


@include('footer')

{{-- script --}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>