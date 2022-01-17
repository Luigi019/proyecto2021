

    <style>
        .slick-track {
            float: left !important;
        }
        /* Contact Section
--------------------------------*/
#contact {
 background: #f7f7f7!important;
 padding: 80px 0!important;
}

#contact .info {
 color: #333333!important;
}

#contact .info i {
 font-size: 32px!important;
 color: #E42613!important;
 float: left!important;
}

#contact .info p {
 padding: 0 0 10px 50px!important;
 line-height: 24px!important;
}

#contact .form #sendmessage {
 color: #E42613!important;
 border: 1px solid #E42613!important;
 display: none!important;
 text-align: center!important;
 padding: 15px!important;
 font-weight: 600!important;
 margin-bottom: 15px!important;
}

#contact .form #errormessage {
 color: red!important;
 display: none!important;
 border: 1px solid red!important;
 text-align: center!important;
 padding: 15px!important;
 font-weight: 600!important;
 margin-bottom: 15px!important;
}

#contact .form #sendmessage.show, #contact .form #errormessage.show, #contact .form .show {
 display: block!important;
}

#contact .form .validation {
 color: red!important;
 display: none!important;
 margin: 0 0 20px!important;
 font-weight: 400!important;
 font-size: 13px!important;
}

#contact .form input, #contact .form textarea {
 border-radius: 0!important;
 box-shadow: none!important;
}

#contact .form button[type="submit"] {
 background: #E42613!important;
 border: 0!important;
 padding: 10px 24px!important;
 color: #fff!important;
 transition: 0.4s!important;
}

#contact .form button[type="submit"]:hover {
 background: #ffffff!important;
 color:rgba(0, 0, 0, 0.8)!important;
}

    </style>

<section id="contact" class="mt-4 mb-4 col-md-12">
    <div class="container wow fadeInUp mb-4">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title" style="text-align: center!important; text-transform: uppercase!important;">¿QUIERES CONTACTAR CON {{Auth::user()->name}}?</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-push-2 mr-3">
          <div class="info">

            <div>
              <i class="fa fa-envelope"></i>
              <p><a href="mailto:{{Auth::user()->email}}" title="glorythemes" class="mr-4">{{Auth::user()->email}}</a></p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>{{Auth::user()->phone}}</p>
            </div>

          </div>
        </div>

        <div class="col-md-7 col-md-push-2">
          <div class="form">
            <form action="{{ route('public.studentToTeacher' , $user) }}" id="contactForm" method="post" role="form" class="contactForm">
                @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre completo" required data-rule="minlen:4" data-msg="Por favor ingrese al menos 4 caracteres" />

              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo" required data-rule="email" data-msg="Ingresa un Correo Valido" />

              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required data-rule="minlen:4" data-msg="Por favor ingrese al menos 8 caracteres del tema" />

              </div>
              <div class="form-group">
                <textarea class="form-control" id="message" name="message" rows="5" required data-rule="required" data-msg="Por favor escribe algo para nosotros" placeholder="Mensaje..."></textarea>

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
