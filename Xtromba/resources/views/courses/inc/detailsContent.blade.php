<style>
    .nav-link.active {
        background-color: #dc3545 !important;
    }

    #classCalendar {
        height: 500px;
    }
    @media(max-width:768){
    .textResponsive{
        font-size: 22px;
    }
}
    .logoIcon {
        display: inline;
        height: 1em;
    }


</style>

<section class="details">
    <div class="row mb-4">
        <div class="col-xs-12 col-md-12 col-lg-6">
            <div class="jumbotron col-xs-12 jumbotron-fluid h-100 w-100">
                <div class="col-xs-12 col-md-12 textResponsive">
                    <h1>{{$data->title}}</h1>
                    <hr class="my-4 bg-danger">
                    <p class="lead">Profesor: <span>{{$data->teacher->name}}</span></p>
                    <p>{!! $data->description !!}</p>
        
                    @if(!Auth::user()->hasProduct($data , 'Course' , 'course')->count() > 0)
                        <a href="{{route('public.payment.checkout' , [$data])}}" class="btn btn-danger mt-4"><i
                                class="fas fa-cash-register"></i>&nbsp; Comprar
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-6">
            <video class="h-100 w-100" controls src='{{$data->getFile('trailer' , 'first')}}' />
        </div>
    </div>

    @if(Auth::user()->hasProduct($data , 'Course' , 'course')->count() > 0 || Auth::user()->role('ADMINISTRADOR'))
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab course-contents" role="tablist"
                     aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-contenido-tab" data-toggle="pill" href="#v-pills-contenido"
                       role="tab"
                       aria-controls="v-pills-contenido" aria-selected="true">CONTENIDO</a>
                    <a class="nav-link" id="v-pills-clases-tab" data-toggle="pill" href="#v-pills-clases" role="tab"
                       aria-controls="v-pills-clases" aria-selected="false">XPERIENCES</a>
                    <a class="nav-link" id="v-pills-eventos-tab" data-toggle="pill" href="#v-pills-eventos" role="tab"
                       aria-controls="v-pills-eventos" aria-selected="false" onclick="classCalendarRender()">EVENTOS</a>
                    <a class="nav-link" id="v-pills-extras-tab" data-toggle="pill" href="#v-pills-extras" role="tab"
                       aria-controls="v-pills-extras" aria-selected="false">MATERIALES EXTRAS</a>
                </div>
            </div>
            <div class="col-12 col-md-9 mt-4 mt-md-0">
                {{--Contenido--}}
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-contenido" role="tabpanel"
                         aria-labelledby="v-pills-contenido-tab">
                        <div class="row textResponsive">
                            <div class="col-12 ">
                                <h1>Contenido de la clase</h1>
                                <hr class="bg-danger">
                                <p class="lead">
                                    {!! $data->content !!}
                                </p>

                            </div>
                        </div>
                    </div>
                    {{--Fin contenido--}}
                    {{--Clases--}}
                    <div class="tab-pane fade" id="v-pills-clases" role="tabpanel" aria-labelledby="v-pills-clases-tab">
                        <div class="row">

                            @foreach($data->lessons as $lesson)
                                <div class="col-xs-1 col-md-6 col-lg-4">
                                    <div class="card border-0 mb-4">
                                        <img src="{{ asset($lesson->getFile('photo' , 'first')) }}" class="card-img-top"
                                             alt="...">
                                        <div class="card-body p-0">
                                            <h5 class="card-title mt-3 text-danger">{{$data->title}}</h5>
                                            <p class="card-text">{!! Str::limit($data->description , 25) !!}</p>
                                            <a href="{{route('public.course.lessons.show' , [$data,$lesson])}}"
                                               class="btn btn-danger"><i class="fas fa-tv"></i>&nbsp; Ver
                                            </a>
                                            <a href="{{route('public.download.lesson' , [$lesson])}}"
                                               class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                               title="Decargar Xperience"><i class="fas fa-download"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{--Fin clases--}}
                    {{--Eventos--}}
                    <div class="tab-pane fade" id="v-pills-eventos" role="tabpanel"
                         aria-labelledby="v-pills-eventos-tab"
                         style="height:500px;">
                        <div class="tab-pane" id="calendar">
                            <div class="row p-0">
                                <div class="container p-0">
                                    <div class="col-md-12 p-0" id="classCalendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Fin eventos--}}
                    {{--Extras--}}
                    <div class="tab-pane fade" id="v-pills-extras" role="tabpanel" aria-labelledby="v-pills-extras-tab">
                        <div class="row">
                            <div class="col-xs-1 col-md-4 col-lg-3">
                                <div class="card text-white bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Volante de los eventos</h5>
                                        <button href="#" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Decargar archivo"><i class="fas fa-download"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1 col-md-4 col-lg-3">
                                <div class="card text-white bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Logo</h5>
                                        <button href="#" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Decargar archivo"><i class="fas fa-download"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1 col-md-4 col-lg-3">
                                <div class="card text-white bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Audio de la clase</h5>
                                        <button href="#" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Decargar archivo"><i class="fas fa-download"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1 col-md-4 col-lg-3">
                                <div class="card text-white bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Volante de los eventos</h5>
                                        <button href="#" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Decargar archivo"><i class="fas fa-download"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1 col-md-4 col-lg-3">
                                <div class="card text-white bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Logo</h5>
                                        <button href="#" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Decargar archivo"><i class="fas fa-download"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1 col-md-4 col-lg-3">
                                <div class="card text-white bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Audio de la clase</h5>
                                        <button href="#" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Decargar archivo"><i class="fas fa-download"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Fin extras--}}
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="eventModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventTitle">Título evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row col-6">
                                <label class="label col-3">Publicado</label>
                                <div class="col-9">
                                    <input id="eventPublic" type="datetime-local" class="form-control" disabled/>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label class="label col-3">Realizacion</label>
                                <div class="col-9">
                                    <input id="eventRelesse" type="datetime-local" class="form-control" disabled/>
                                </div>
                            </div>
                            <div class="col-12"><b>Contenido</b></div>
                            <div class="col-12" id="eventContent"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.7/dayjs.min.js"
        integrity="sha512-bwD3VD/j6ypSSnyjuaURidZksoVx3L1RPvTkleC48SbHCZsemT3VKMD39KknPnH728LLXVMTisESIBOAb5/W0Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function classCalendarRender() {
        setTimeout(() => {
            var calendarEl = document.getElementById('classCalendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: JSON.parse('{{ $data->events()->get() }}'.replace(/&quot;/g, '"')),
                dateClick: function () {
                    let formData = document.getElementById('formPersonalLesson');
                    formData.reset();
                    $("#lessonModal").modal("show");
                    showFieldByPreference();
                    $('#description').val('');
                    $('#city_id').val('0');
                    $('#preference_id').val('1');
                    $('#id').val('');
                    $('#btnSave').css('display', 'block');
                    $('#btnDelete').css('display', 'none');
                    $('#btnEdit').css('display', 'none');
                    $('#btnShow').css('display', 'none');
                },
                eventClick: function (info) {
                    $('#eventModal').modal('show')
                    console.log(dayjs(info.event.extendedProps.created_at).format('YYYY-MM-DDTHH:mm'))
                    document.getElementById('eventTitle').innerHTML = info.event.title;
                    document.getElementById('eventContent').innerHTML = info.event.extendedProps.content.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
                    document.getElementById('eventPublic').value = dayjs(info.event.extendedProps.created_at).format('YYYY-MM-DDTHH:mm');
                    document.getElementById('eventRelesse').value = dayjs(info.event.start).format('YYYY-MM-DDTHH:mm');
                }
            });
            calendar.render();
        }, 500)
    };
</script>

