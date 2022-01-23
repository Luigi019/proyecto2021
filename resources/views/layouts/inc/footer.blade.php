   <section class="main-footer">
   <footer id="footer" class="footer-1">
    <div class="main-footer widgets-dark typo-light">
    <div class="container">
    <div class="row">

    <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="widget subscribe no-box">
    <h5 class="widget-title"> <img src="{{asset('img/logo-blanco.png')}}" alt="" style="max-height: 110px; max-width: 180px;"><span></span></h5>
    <div class="mt-4">
    <p class="mt-4 float-left">Inmobiliaria es una auténtica explosión de energía positiva, una elevación emocional de la mente y del cuerpo, basado en un sistema muy aeróbico y súper dinámico.</p>
    </div></div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="widget no-box">
    <h5 class="widget-title">Enlaces Rápidos<span></span></h5>
    <ul class="thumbnail-widget">
    <li>
    <div class="thumb-content"><a href="#."><i class="fas fa-chevron-right"></i> Formaciones</a></div>
    </li>
    <li>
    <div class="thumb-content"><a href="#."><i class="fas fa-chevron-right"></i> Eventos</a></div>
    </li>
    <li>
    <div class="thumb-content"><a href="#."><i class="fas fa-chevron-right"></i> Acerca de nosotros</a></div>
    </li>
    <li>
    <div class="thumb-content"><a href="#."><i class="fas fa-chevron-right"></i> Galería</a></div>
    </li>
    @can('teacher.request')
    <li>
    <div class="thumb-content"><a href="{{route('public.teacherContactForm')}}"><i class="fas fa-chevron-right"></i> Conviertete en un Profesor</a></div>
    </li>
    @endcan
    <li>
    <div class="thumb-content"><a href="{{route('public.supportContactForm')}}"><i class="fas fa-chevron-right"></i> Contactar a soporte </a></div>
    </li>
{{--    @foreach($pages as $key => $pages)--}}
{{--       <li>--}}
{{--    <div class="thumb-content"><a href="{{route('public.pages.detail',$pages->id)}}"><i class="fas fa-chevron-right"></i> {{$pages->page}} </a></div> --}}
{{--    </li>--}}
{{--    @endforeach--}}
    </ul>
    </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">

    <div class="widget no-box">
    <h5 class="widget-title">Contactanos<span></span></h5>

    <p><a href="mailto:info@Inmobiliaria.com" title="glorythemes">info@Inmobiliaria.com</a></p>
    <ul class="social-footer2">
    <li class=""><a title="youtube" target="_blank" href="https://www.youtube.com/channel/UCGrq24-RmTecRJl69Qox8tg"><i  class="fab fa-youtube"></i></a></li>
    <li class=""><a title="whatsapp" target="_blank" href="https://web.whatsapp.com/send?phone=34625949396&text=Hola.%20He%20visto%20vuestra%20web%20y%20me%20interesa%20mucho%20este%20nuevo%20m%C3%A9todo%20de%20Inmobiliaria,%20%C2%BFpodr%C3%ADas%20responderme%20a%20algunas%20dudas%20por%20favor?." target="_blank"><i class="fab fa-whatsapp"></i></a></li>
    <li class=""><a title="facebook" target="_blank" href="#"><i  class="fab fa-facebook-square"></i></a></li>
    <li class=""><a title="instagram" target="_blank" href="#"><i  class="fab fa-instagram"></i></a></li>
    <li class=""><a title="twitter" target="_blank" href="#"><i  class="fab fa-twitter-square"></i></a></li>
    </ul>
    </div>
    </div>

    </div>
    </div>
    </div>

    <div class="footer-copyright">
    <div class="container">
    <div class="row">
    <div class="col-md-12 text-center">
    <p>Copyright &copy;  {{ date('Y') }}  Inmobiliaria, Todos los derechos reservados. </p>
    </div>
    </div>
    </div>
    </div>
    </footer>


   </section>
