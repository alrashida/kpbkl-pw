<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <title>Tambah Program</title>
</head>
<body>
  @include('fonts')
    @include('navbar')
    <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data" onsubmit="addNewLines();">
        @csrf
      
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required>
      <br><br><br>
        <label for="title">title:</label>
        <textarea name="title" id="title" rows="4" required></textarea>
      <br><br><br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="4" style="white-space: pre-wrap;"required></textarea>
      <br><br><br>
        <button type="submit">Add Program</button>
      </form>

      <script>
        function addNewLines()
        {
          text = document.getElementById('content').value;
          text = text.replace(/  /g,"[sp][sp]");
          text = text.replace(/\n/g,"[nl]");
          document.getElementById(' ')
        }
        
      </script>

      @include('footer')
</body>
</html>