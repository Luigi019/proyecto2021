<section id="main-header">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    @foreach ($gallery as $key =>$gallery)
    
    <div class="carousel-item {{$key === 0 ? 'active' : ''}} "> 
      <img src="{{asset($gallery->getFile("gallery" , "first"))}}"  class="d-block w-100 " style='max-height:700px' alt="{{ $gallery->name }}">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
  <div class="mt-4"></div>
  <div class="mt-4"></div>
  <div class="mt-4"></div>
  <div class="mt-4"></div>
  <div class="animated-arrow justify-content-center">
    <a href="#feature"><i class="fa fa-angle-down"></i></a>
    </div>
</section>
