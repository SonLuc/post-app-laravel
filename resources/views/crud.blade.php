@extends('app')
@section('main')
<main class="main container">
  <div class="row">
    <section class="col-md-3">
    </section>
    <section class="col-md-6">
      @yield('content')
    </section>
    <section class="col-md-3">
    </section>
  </div>    
</main>
@endsection