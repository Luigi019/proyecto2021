@can('teacher.request')

@extends('layouts.app')
@section('title', 'Solicitar ser profesor')

@section('header')

    <div class="mt-4"></div>
    <div class="mt-4"></div>
    <div class="mt-4"></div>
    <div class="mt-4"></div>

@endsection

@section('css')

    <style>
        .slick-track {
            float: left !important;
        }
        /* Contact Section
--------------------------------*/
#contact {
 background: #f7f7f7;
 padding: 80px 0;
}

#contact .info {
 color: #333333;
}

#contact .info i {
 font-size: 32px;
 color: #E42613;
 float: left;
}

#contact .info p {
 padding: 0 0 10px 50px;
 line-height: 24px;
}

#contact .form #sendmessage {
 color: #E42613;
 border: 1px solid #E42613;
 display: none;
 text-align: center;
 padding: 15px;
 font-weight: 600;
 margin-bottom: 15px;
}

#contact .form #errormessage {
 color: red;
 display: none;
 border: 1px solid red;
 text-align: center;
 padding: 15px;
 font-weight: 600;
 margin-bottom: 15px;
}

#contact .form #sendmessage.show, #contact .form #errormessage.show, #contact .form .show {
 display: block;
}

#contact .form .validation {
 color: red;
 display: none;
 margin: 0 0 20px;
 font-weight: 400;
 font-size: 13px;
}

#contact .form input, #contact .form textarea {
 border-radius: 0;
 box-shadow: none;
}

#contact .form button[type="submit"] {
 background: #E42613;
 border: 0;
 padding: 10px 24px;
 color: #fff;
 transition: 0.4s;
}

#contact .form button[type="submit"]:hover {
 background: #ffffff;
 color:rgba(0, 0, 0, 0.8);
}

    </style>
@endsection

@section('content')
<section id="contact" class="mt-4 mb-4">
    <div class="container wow fadeInUp mb-4">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title" style="text-align: center; text-transform: uppercase;">¿QUIERES SER PROFESOR {{Auth::user()->name}}?</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-push-2 mr-3">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>	<a href="#">
        Ubicación
      </a></p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              
              <p><a href="mailto:support@xtromba.webanagrama.com" title="glorythemes" class="mr-4">support@xtromba.webanagrama.com</a></p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+34 6259 493 96</p>
            </div>

          </div>
        </div>

        <div class="col-md-7 col-md-push-2">
          <div class="form">
            <form action="{{ route('public.teacherContact') }}" id="contactForm" method="post" role="form" class="contactForm">
                @csrf
                <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre completo" required data-rule="minlen:4" data-msg="Por favor ingrese al menos 4 caracteres" />
                
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" required data-rule="email" data-msg="Ingresa un Correo Valido" value="{{Auth::user()->email}}" readonly/>
                 
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required data-rule="minlen:4" data-msg="Por favor ingrese al menos 8 caracteres del tema" />
                
              </div>
              <div class="form-group">
                <textarea class="form-control" id="message" name="message" rows="5" required data-rule="required" data-msg="Por favor escribe algo para nosotros" placeholder="Mensaje..."></textarea>
                
              </div>
              <div class="form-group" style="opacity: 0; height: 0px; width: 0px;">
                <input type="text" class="" name="userid" id="userid" aria-describedby="userid" value="{{auth()->id();}}" readonly>
              </div>
              <div class="float-left"><button type="submit">Enviar mensaje</button></div>
             
            </form>
          </div>
        </div>

      </div>
    </div>
    <div class="mb-4"></div>
    <div class="mb-4"></div>
    <div class="mb-4"></div>
  </section>
  

  @endsection
  @endcan