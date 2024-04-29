<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{$Gallery->title}}</title>
</head>

<style>  
  .program-show {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px; 
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .program-show img {
    width: auto;
    height: 300px;
    object-fit: cover;
    border-radius: 5px 5px 0 0;
  }
  </style>

<body>
  @include('fonts')
  @include('navbar')
  <div class="program-show">
    <h1>{{ $Gallery->title }}</h1>
    <img src="/galleryimages/{{$Gallery->image}}" alt="program image">
    <div class="program-content">
        <p>{{ $Gallery->description }}</p>
    </div>
    @if (!is_null($GalleryImages) && count($GalleryImages) > 0)
        <div class="gallery-images">
            @foreach ($GalleryImages as $GalleryImages)
                <img src="{{asset($GalleryImages->images)}}" alt="gallery image">
            @endforeach
        </div>
    @endif
</div>

  @include('footer')
</body>
</html>