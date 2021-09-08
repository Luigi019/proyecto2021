
@extends("layout.layoutMaster")
<link rel="stylesheet" href="{{ asset('css/noticias.css') }}">
@section("title", "Gestión de usuarios")
@section("content")
@include("include.side-bar-menu")
<main>
  @include("include.header")
  <section id="gestion-usuarios">
    <div class="form-container">
      <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles">
            <i class="zmdi zmdi-account zmdi-hc-fw"></i> Gestion de Usuarios
            <small>Sistema Intranet de la Inmobiliaria Nacional, S.A.</small>
          </h1>
        </div>
        <p class="lead">
          ¡Bienvenido al módulo para la gestión de usuarios! En este apartado podrá encontrar toda la informacion relevante a los usuarios registrados.
        </p>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px">
              <li>
                <a href="#add" data-toggle="tab">Nuevo Usuario</a>
              </li>
              <li class="active"><a href="#lista" data-toggle="tab">Lista</a></li>
              <li><a href="#">Generar PDF</a></li>
              <li class="text-right" id="search_content"><a href="#"><i class="zmdi zmdi-search"> Buscar</i></a></li>
              <div class="bar" style="display: none;">
              </div>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade" id="add">
                <div class="container-fluid">
                  <div class="row">
                    <div class="text-titles">
                      <h3 class="page">Registrar usuario</h3>
                    </div>
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                      <form action="">
                        <div class="form-group label-floating">
                          <label class="control-label">Nombres</label>
                          <input
                            class="form-control"
                            name="nombres"
                            type="text"
                            required
                          />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Apellidos</label>
                          <input
                            class="form-control"
                            name="apellidos"
                            type="text"
                            required
                          />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label"
                            >Cédula de identidad</label
                          >
                          <input
                            class="form-control"
                            name="cedula"
                            type="text"
                            required
                          />
                        </div>
                        <div class="form-group">
                          <label class="control-label"
                            >Fecha de Nacimiento</label
                          >
                          <input
                            class="form-control"
                            name="f_nac"
                            type="date"
                            required
                          />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Teléfono</label>
                          <input
                            class="form-control"
                            name="tlf"
                            type="text"
                            required
                          />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label"
                            >Correo Electrónico</label
                          >
                          <input
                            class="form-control"
                            name="correo"
                            type="email"
                            required
                          />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Nombre de Usuario</label>
                          <input
                            class="form-control"
                            name="usuario"
                            type="text"
                            required
                          />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Contraseña</label>
                          <input
                            class="form-control"
                            name="pass"
                            type="password"
                            required
                          />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label"
                            >Confirmar Contraseña</label
                          >
                          <input
                            class="form-control"
                            name="confirm_pass"
                            type="password"
                            required
                          />
                        </div>
                        <p class="text-center">
                          <input type="submit" class="btn btn-success btn-raised btn-sm" value="Guardar">
                        </p>
                        <p class="text-center">
                          <a href=""><input type="button" class="btn btn-info btn-raised btn-sm" value="Volver"></a>
                        </p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade active in" id="lista">
                <div class="table-responsive">
                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Cédula de identidad</th>
                        <th class="text-center">Fecha de Nacimiento</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Nombre de Usuario</th>
                        <th class="text-center">Actualizar</th>
                        <th class="text-center">Borrar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Carlos</td>
                        <td>Alfaro</td>
                        <td>13.123.456</td>
                        <td>13-06-1978</td>
                        <td>+58 412-3456728</td>
                        <td>carlos@gmail.com</td>
                        <td>C_alfaro</td>
                        <td>
                          <a
                            href="#edit_"
                            data-toggle="tab"
                            class="btn btn-success btn-raised btn-xs"
                            ><i class="zmdi zmdi-refresh"></i
                          ></a>
                        </td>
                        <td>
                          <a href="#delete_" data-toggle="tab" class="btn btn-danger btn-raised btn-xs"
                            ><i class="zmdi zmdi-delete"></i
                          ></a>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Alicia</td>
                        <td>Melendez</td>
                        <td>17.123.456</td>
                        <td>01-01-1999</td>
                        <td>+58 414-4759820</td>
                        <td>alicia@gmail.com</td>
                        <td>A_melendez</td>
                        <td>
                          <a
                            href="#edit_"
                            data-toggle="tab"
                            class="btn btn-success btn-raised btn-xs"
                            ><i class="zmdi zmdi-refresh"></i
                          ></a>
                        </td>
                        <td>
                          <a href="#delete_" data-toggle="tab" class="btn btn-danger btn-raised btn-xs"
                            ><i class="zmdi zmdi-delete"></i
                          ></a>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Sarai</td>
                        <td>Lopez</td>
                        <td>12.123.456</td>
                        <td>06-07-1995</td>
                        <td>+58 414-4759820</td>
                        <td>sarai@gmail.com</td>
                        <td>S_Lopez</td>
                        <td>
                          <a
                            href="#edit_"
                            data-toggle="tab"
                            class="btn btn-success btn-raised btn-xs"
                            ><i class="zmdi zmdi-refresh"></i
                          ></a>
                        </td>
                        <td>
                          <a href="#delete_" data-toggle="tab" class="btn btn-danger btn-raised btn-xs"
                            ><i class="zmdi zmdi-delete"></i
                          ></a>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Alba</td>
                        <td>Bonilla</td>
                        <td>11.123.456</td>
                        <td>07-07-1989</td>
                        <td>+58 414-4759820</td>
                        <td>alba@gmail.com</td>
                        <td>A_bonilla</td>
                        <td>
                          <a
                            href="#edit_"
                            data-toggle="tab"
                            class="btn btn-success btn-raised btn-xs"
                            ><i class="zmdi zmdi-refresh"></i
                          ></a>
                        </td>
                        <td>
                          <a href="#delete_" data-toggle="tab" class="btn btn-danger btn-raised btn-xs"
                            ><i class="zmdi zmdi-delete"></i
                          ></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <ul class="pagination pagination-sm">
                    <li class="disabled"><a href="#!">«</a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li><a href="#!">2</a></li>
                    <li><a href="#!">3</a></li>
                    <li><a href="#!">4</a></li>
                    <li><a href="#!">5</a></li>
                    <li><a href="#!">»</a></li>
                  </ul>
                </div>
              </div>
              <div class="tab-pane fade" id="edit_">
                <div class="container-fluid">
                  <div class="row">
                    <div class="text-titles">
                      <h3 class="page">Editar</h3>
                    </div>
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                      <form action="">
                        <div class="form-group label-floating">
                          <label class="control-label">Nombres</label>
                          <input class="form-control" name="nombres" value="Carlos" type="text" required />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Apellidos</label>
                          <input class="form-control" name="apellidos" value="Alfaro" type="text" required />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Cédula de identidad</label>
                          <input class="form-control" name="cedula" value="13.123.456" type="text" required />
                        </div>
                        <div class="form-group">
                          <label class="control-label">Fecha de Nacimiento</label>
                          <input class="form-control" name="f_nac" type="date" required>
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Teléfono</label>
                          <input class="form-control" name="tlf" value="+58 412-3456728" type="text" required />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Correo Electrónico</label>
                          <input class="form-control" name="correo" value="carlos@gmail.com" type="email" required />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Nombre de Usuario</label>
                          <input class="form-control" name="usuario" value="C_alfaro" type="text" required />
                        </div>

                        <p class="text-center">
                          <input type="submit" class="btn btn-success btn-raised btn-sm" value="Actualizar">
                        </p>
                        <p class="text-center">
                          <a href=""><input type="button" class="btn btn-info btn-raised btn-sm" value="Volver"></a>
                        </p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="delete_">
                <div class="container-fluid">
                  <div class="row">
                    <div class="text-titles">
                      <h3 class="page">Eliminar</h3>
                    </div>
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                      <form action="">
                        <div class="form-group label-floating">
                          <label class="control-label">Nombres</label>
                          <input class="form-control" name="nombres" value="Carlos" type="text" disabled />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Apellidos</label>
                          <input class="form-control" name="apellidos" value="Alfaro" type="text" disabled />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Cédula de identidad</label>
                          <input class="form-control" name="cedula" value="13.123.456" type="text" disabled />
                        </div>
                        <div class="form-group>
                          <label class="control-label">Fecha de Nacimiento</label>
                          <input class="form-control" name="f_nac" type="date" disabled>
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Teléfono</label>
                          <input class="form-control" name="tlf" value="+58 412-3456728" type="text" disabled />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Correo Electrónico</label>
                          <input class="form-control" name="correo" value="carlos@gmail.com" type="email" disabled />
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label">Nombre de Usuario</label>
                          <input class="form-control" name="usuario" value="C_alfaro" type="text" disabled />
                        </div>

                        <p class="text-center">
                          <input type="submit" class="btn btn-danger btn-raised btn-sm" value="Borrar">
                        </p>
                        <p class="text-center">
                          <a href=""><input type="button" class="btn btn-info btn-raised btn-sm" value="Volver"></a>
                        </p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Footer -->
    @include("include.footer")
  </main>  
  <script>
    $.material.init();
  </script>

@endsection


