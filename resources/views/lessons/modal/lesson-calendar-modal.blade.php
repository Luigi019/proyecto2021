<div class="modal fade" id="lessonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 800px ;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold text-danger text-center" id="exampleModalLabel"><b>Bienvenidos a la clase  <i class="fa fa-graduation-cap"></i></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-12">
                                <img style="width:100%; height: 280px;" id="imagenLesson">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a id="title" href="#">Aqui va el link con el titulo de la clase</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <small id="teacher"></small>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <p class="card-text mr-3"><i class="fas fa-clock text-danger mr-1"></i>1 hora</p>
                            <p class="card-text mr-3"><i class="fas fa-book-reader text-danger mr-1"></i>
                                @if (isset($collect->lessons))
                                    {{ $collect->lessons->count() }}
                                @endif
                            </p>
                            <p class="card-text mr-3"><i class="fas fa-users text-danger mr-1"></i> 15 participantes
                            </p>
                        </div> --}}
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 text-center" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation" style="width:33%">
                                      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-home" aria-selected="true">Descripción</a>
                                    </li>
                                    <li class="nav-item" role="presentation" style="width:33%">
                                      <a class="nav-link" id="pills-teacher-tab" data-toggle="pill" href="#pills-teacher" role="tab" aria-controls="pills-teacher" aria-selected="false">Instructor</a>
                                    </li>
                                    <li class="nav-item" role="presentation" style="width:33%">
                                      <a class="nav-link" id="pills-startlesson-price-tab" data-toggle="pill" href="#pills-startlesson-price" role="tab" aria-controls="pills-startlesson-price" aria-selected="false">Fecha y precio</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p id="lessonDescription"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p id="instructorDescription">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore reiciendis laborum odio obcaecati qui magni ipsum iste repellat libero. In hic quod a aliquam eos adipisci recusandae dolore minima enim!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-startlesson-price" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 d-flex">
                                                    <label class="form-control-label pt-2"><b>Fecha: </b></label>
                                                    <div class="col-md-9">
                                                        <input  id="startDate" name="startDate" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12 d-flex">
                                                        <label class="form-control-label pt-2"><b>Precio: </b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="precio" id="precio" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  id='btn-next' data-dismiss="modal">Siguiente paso</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: #e30613 !important;
    }
</style>

