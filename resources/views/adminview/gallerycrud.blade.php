<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Gallery CRUD</title>
</head>
<body>
    @include('navbar')

    <div class="tabel-crud">
        <table>
        <tr>
            <th>ID Gallery</th>
            <th>Image Gallery</th>
            <th>Title Gallery</th>
            <th>Description Gallery</th>
            <th>Add Images</th>
            <th>Action</th>
        </tr>
        @foreach ($Gallery as $Gallery)

        <tr align="center">
            <td>{{$Gallery->id}}</td>
            <td><img height="auto" width="200" src="/galleryimages/{{$Gallery->image}}"> </td>
            <td>{{$Gallery->title}}</td>
            <td>{{$Gallery->description}}</td>
            <td> <a href="{{url('/addimages/'.$Gallery->id.'/upload')}}">Add</a></td>
            <td> <a href="{{url('/editgallery',$Gallery->id)}}">Edit</a>
                 {{-- <a href=""></a> --}}
            
            </td>
        </tr>
            
        @endforeach

        </table>

    </div>





    @include('fonts')
    @include('footer')
</body>
</html>