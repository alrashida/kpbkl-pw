  
    <div class="navbar-e">

        <img src="{{ asset('image/logo.png') }}" alt="logo"  height="100px" width="78px">
    
        <a href="{{url('/program')}}" class="{{ Request::is('program')? 'active' : '' }}">Program</a>
        <a href="{{url('/kontak')}}" class="{{ Request::is('kontak')? 'active' : '' }}">Kontak</a>
        <a href="{{url('/visi&misi')}}" class="{{ Request::is('visi&misi')? 'active' : '' }}">Visi</a>
        <a href="{{url('/')}}" class="{{ Request::is('/')? 'active' : '' }}">Home</a>
      </div>

