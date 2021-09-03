<section id="news" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="service-title pad-bt15">Novedades</h2>
          <hr class="bottom-line">
        </div>
        @foreach ($news as $news)
        <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
          <div class="blog-sec">
            
            <div class="blog-img">
              <a href="{{ route('detail',$news->id) }}">
                <img src="{{asset($news->getFile("new" , "first"))}}" class="img-responsive" alt="{{$news->title}}" >
              </a>
            </div>
            <div class="blog-info">
              <h2>{{$news->title}}</h2>
              <div class="mb-4"></div>
              <p class="p-justify">{!! Str::limit($news->body,200) !!}</p>
              <a href="{{ route('detail',$news->id) }}" class="read-more">Ver más →</a>
            </div>
           
          </div>
        </div>
        @endforeach
      </div>
      <div class="booth-margins mt-4">
         <a href="{{route('news')}}" class=" blue-white btn btn-primary btn-submit justify-content-center">Ver Más</a>
      </div>
     
    </div>
    
  </section>
  <!---->