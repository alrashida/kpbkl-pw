<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Gallery Images</title>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('navbar')
    @include('fonts')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Gambar Galeri Baru</h2>
    <div class="card-body">

        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <table>
            <tr>
                <td>Title Galeri : {{$Gallery->title}}</td>
            </tr>
        </table>

            @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
                @endforeach
            </ul>
            @endif
            <form action="{{ url('/addimages/'.$Gallery->id.'/upload')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
            <div class="mb-3"></div>
                <label>Upload Images (Max : 20 Images) : </label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
                
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-4"> 
    @foreach ($GalleryImages as $GalleryImages)
    <img src="{{asset($GalleryImages->images)}}" class="border p-2 m-3" style="width: 100px; height: 100px;" alt="">
    <a href="{{url('galleryimage/'.$GalleryImages->id.'/delete')}}">Delete</a>
    @endforeach
</div>
</form>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        
        
    @include('footer')
</body>
</html>