@include('layouts/header')
    <div class="wrapper">
    @include('layouts/sidebar')

      <div class="main-panel">
        <div class="main-header">
          
         @include('layouts/navbar')
        </div>

        <div class="container">
          <div class="page-inner">
           @yield('content')
          </div>
        </div>

       @include('layouts/footer')
      </div>

    
    </div>
 @include('layouts/js')