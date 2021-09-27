@extends("layout.documentos.layoutMasterDocs")

@section("title", "Catálogo de Documentos")
@section("content")
@include("include.side-bar-menu")
<main>
    @include("include.header")
    <section id="gestion_docs">
        <div class="form-container">
            <div class="container-fluid">
                <div class="page-header">
                <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i>Gestion de Documentos
                    <small>Sistema Intranet de la Inmobiliaria Nacional, S.A.</small></h1>
                </div>
            </div>
            <div class="container-fluid"  style="margin: 40px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="{{ asset ('img/checklist.png') }}" alt="pdf" class="img-responsive center-box" style="max-width: 110px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                        Bienvenido al catálogo, selecciona una categoría de la lista para empezar, si deseas buscar un documento por nombre o año has click en el icono &nbsp; <i class="zmdi zmdi-search"></i> &nbsp; que se encuentra en la barra superior
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="margin: 0 0 50px 0;">
                <h2 class="text-center" style="margin: 0 0 25px 0;">Categorías</h2>
                <ul class="list-unstyled text-center list-catalog-container">
                    <li class="list-catalog">Categoría</li>
                    <li class="list-catalog">Categoría</li>
                    <li class="list-catalog">Categoría</li>
                </ul>
            </div>
            <div class="container-fluid">
                <div class="media media-hover">
                    <div class="media-left media-middle">
                        <a href="#!" class="tooltips-general" data-toggle="tooltip" data-placement="right" title="Más información del libro">
                        <img class="media-object" src="{{ asset ('img/book.png') }}" alt="Libro" width="48" height="48">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">1 - Constitución de la República Bolivariana de Venezuela</h4>
                        <div class="pull-left">
                            <h4 class="media-heading">Descripción: <strong>Constitución de la República</strong></h4>
                            <h4>Pertenece a: <strong>Inmobiliaria Nacional S.A.</strong></h4>
                            <h4>Fecha de publicación: <strong>18/7/2021</strong></h4>
                        </div>
                            <form id="tk_options" method="post" action="documentos/getDocs">
                                @csrf
                                <input type="hidden" name="id" value="1">
                                <p class="text-center pull-right">
                                    <a href="#edit_" class="btn btn-success btn-raised btn-xs edit_doc"><i class="zmdi zmdi-refresh"></i> Actualizar</a>
                                    <a href="#delete_" documento="id_" class="btn btn-danger btn-raised btn-xs delete_doc"><i class="zmdi zmdi-delete"></i> Eliminar</a>
                                    <a href="#!" class="btn btn-info btn-xs" style="margin-right: 10px;"><i class="zmdi zmdi-info-outline"></i> Visualizar</a>
                                </p>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
    @include("include.footer")
</main>


@endsection


</div>