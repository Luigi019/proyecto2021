<!-- Modal -->
@php
    $route = [$collect];
      if($collect->lessons){
        $lesson = $collect->lessons->first();
        // $route []=  $lesson ;
      }

@endphp

<section class="modal-trailer">
    <div class="modal  fade" id="staticBackdrop-{{$collect->id}}" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <button type="button" style="color: #fff; font-family: Times New Roman;  font-size: 1rem;"
                    class="close mb-1" data-dismiss="modal" aria-label="Close">
                CERRAR <span aria-hidden="true">X</span>
            </button>
            <div class="modal-content">

                @if($collect->getTable() === 'courses')
                    <video width="200" height="" controls="controls"
                           type="video/mp4" class="card-img-top">
                        <source src='{{ asset(storage::get($collect , 'trailer' , 'first')) }}'
                                autostart="false">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <img src='{{ asset(storage::get($collect , 'photo' , 'first')) }}' width="100%" height="400"/>
                @endif


                <div class="modal-body">
                    <div class="">
                        <div class="card-body">
                            <a href="{{$collect->getTable() !== 'lessons' ? route('public.courses.details' , $route) : route('public.streaming.stream.show' , $route)}}">
                                <h5 class="card-title">{{$collect->title}}</h5></a>
                            <small>Por: @if($collect->teacher)
                                    {{$collect->teacher->name}}
                                @endif</small>
                            <div class="row">
                                <p class="card-text mr-3"><i class="fas fa-clock text-danger mr-1"></i>1 hora</p>
                                <p class="card-text mr-3"><i
                                        class="fas fa-book-reader text-danger mr-1"></i>@if (isset($collect->lessons))
                                        {{$collect->lessons->count()}}
                                    @endif</p>
                                <p class="card-text mr-3"><i class="fas fa-users text-danger mr-1"></i> 15 participantes
                                </p>
                            </div>
                            <hr>
                            <div class="">
                                <div class="row justify-content-left">
                                    <ul class="nav nav-pills nav-pills-primary nav-justified"
                                        style="font-size: .95rem;">
                                        <li class="nav-item">
                                            <a href="javascript:void();" data-target="#description-{{$collect->id}}"
                                               data-toggle="pill" class="nav-link active show"><span class="hidden-xs"><div
                                                        class="mt-1"></div>Descripción</span></a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="javascript:void();" data-target="#instructor-{{$collect->id}}"
                                               data-toggle="pill" class="nav-link"><span class="hidden-xs"><div
                                                        class="mt-1"></div>Instructor</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void();" data-target="#comments-{{$collect->id}}"
                                               data-toggle="pill" class="nav-link mt-1"><span class="hidden-xs"
                                                                                              style="width: 100%; display: ruby;"><div
                                                        class="mt-1"></div>Puntuación y Comentarios</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content p-3" width>
                                    <div class="tab-pane active show" id="description-{{$collect->id}}">
                                        <h5 class="mb-3">Descripción</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="card-text">
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci
                                                    recusandae placeat quos hic, necessitatibus optio aliquid doloribus
                                                    magnam pariatur molestiae? Ab excepturi neque accusamus, dicta fuga
                                                    corrupti aperiam vero! Modi!Impedit fugit veritatis, ipsum quam
                                                    dolorem ad dolor officia! Reiciendis ut soluta vel, architecto unde
                                                    voluptas error minus suscipit quam quas deleniti commodi magni rerum
                                                    deserunt exercitationem, sapiente incidunt molestias.
                                                </p>

                                            </div>


                                        </div>
                                        <!--/row-->
                                    </div>

                                    <div class="tab-pane" id="instructor-{{$collect->id}}">
                                        <h5 class="mb-3">Instructor</h5>
                                        <div class="container" style="height: 100%;">

                                            <p>Nombre: @if($collect->teacher)
                                                    {{$collect->teacher->name}}
                                                @endif</p>
                                            <p>Descripción: Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                Iusto, quia dignissimos sit provident sequi facilis delectus accusamus
                                                molestiae repudiandae cupiditate commodi dicta obcaecati, officia
                                                tempora libero sed quos a quisquam.</p>


                                        </div>
                                    </div>
                                    <div class="tab-pane" id="comments-{{$collect->id}}">
                                        <h5 class="mb-3">Puntuación y comentarios</h5>
                                        <div class="container" style="height: 100%;">

                                            @foreach ( $collect->commentable()->limit(3) as $key => $data)
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item list-group-item-action">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">{{$data->user_id}}</h5>
                                                            <small class="text-muted">{{$data->created_at}}</small>
                                                        </div>
                                                        <p class="mb-1">{{$data->comment}}</p>

                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p style="color:  #e30613;">$ {{$collect->price}} EUR </p>

                    @if(!Auth::check() || !Auth::user()->hasProduct($collect , 'Course')->count() )
                        <a href="{{route('public.payment.checkout' , [
    'isCourse'=>$collect->getTable() === 'courses' ? true : false,
    'collect'=>$collect
])}}" class="btn btn-danger institucional" style="">
                            Comprar ahora
                        </a>
                    @else
                        <a class="btn btn-danger institucional"

                           href="{{$collect->getTable() !=='lessons'? route('public.courses.details' , $route) : route('public.streaming.stream.show' , $route)}}">
                            Ver ahora
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('staticBackdrop-{{$collect->id}}').modal('show')
</script>

