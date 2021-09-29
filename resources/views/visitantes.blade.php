@extends("layout.visits_and_users.layoutMasterV&U")

@section("title", "Catálogo de Documentos")
@section("content")
@include("include.side-bar-menu")
<main>
    @include("include.header")
      <section class="gestion-visitantes">
        <div class="form-container">
          <div class="container-fluid">
            <div class="page-header">
              <h1 class="text-titles">
                <i class="zmdi zmdi-account zmdi-hc-fw"></i> Gestion de Visitantes
                <small>Sistema Intranet de la Inmobiliaria Nacional, S.A.</small>
              </h1>
            </div>
            <p class="lead">
              ¡Bienvenido al módulo para la gestión de visitantes! En este apartado
              podrá encontrar toda la informacion relevante a los visitantes
              registrados.
            </p>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12">
                <ul class="nav nav-tabs" style="margin-bottom: 15px">
                  <li>
                    <a href="#add" data-toggle="tab">Nuevo Visitante</a>
                  </li>
                  <li class="active"><a href="">Lista</a></li>
                  <li><a href="#">Generar PDF</a></li>
                  <li class="text-right" id="search_content"><a href="#"><i class="zmdi zmdi-search"> Buscar</i></a></li>
                  <div class="bar" style="display: none;">
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade" id="add">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="text-titles">
                          <h3 class="page">Registrar visita</h3>
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
                            <div class="form-group label-floating">
                              <label class="control-label">Motivo</label>
                              <input
                                class="form-control"
                                name="motivo"
                                type="text"
                                required
                              />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Fecha de visita</label>
                              <input
                                class="form-control"
                                name="f_visita"
                                type="date"
                                required
                              />
                            </div>
                            <div class="form-group">
                              <label class="control-label"
                                >Hora de ingreso al edificio</label
                              >
                              <input
                                class="form-control"
                                name="h_in"
                                type="time"
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
                            <p class="text-center">
                              <input
                                type="submit"
                                class="btn btn-success btn-raised btn-sm"
                                value="Guardar"
                              />
                            </p>
                            <p class="text-center">
                              <a href=""
                                ><input
                                  type="button"
                                  class="btn btn-info btn-raised btn-sm"
                                  value="Volver"
                              /></a>
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
                            <th class="text-center">Motivo</th>
                            <th class="text-center">Fecha de Visita</th>
                            <th class="text-center">Hora de ingreso al edificio</th>
                            <th class="text-center">Hora de salida del edificio</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Actualizar</th>
                            <th class="text-center">Borrar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Lorena</td>
                            <td>Mendez</td>
                            <td>7.123.456</td>
                            <td>Visita a personal</td>
                            <td>18-07-2021</td>
                            <td>10:32 AM</td>
                            <td>10:45 AM</td>
                            <td>+58 412-3456728</td>
                            <td>
                              <a
                                href="#edit_"
                                data-toggle="tab"
                                class="btn btn-success btn-raised btn-xs"
                                ><i class="zmdi zmdi-refresh"></i
                              ></a>
                            </td>
                            <td>
                              <a
                                href="#delete_"
                                data-toggle="tab"
                                class="btn btn-danger btn-raised btn-xs"
                                ><i class="zmdi zmdi-delete"></i
                              ></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Alicia</td>
                            <td>Melendez</td>
                            <td>24.123.456</td>
                            <td>Reunion ejecutiva</td>
                            <td>18-07-2021</td>
                            <td>11:00 AM</td>
                            <td>12:05 PM</td>
                            <td>+58 414-4759820</td>
                            <td>
                              <a
                                href="#edit_"
                                data-toggle="tab"
                                class="btn btn-success btn-raised btn-xs"
                                ><i class="zmdi zmdi-refresh"></i
                              ></a>
                            </td>
                            <td>
                              <a
                                href="#delete_"
                                data-toggle="tab"
                                class="btn btn-danger btn-raised btn-xs"
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
                              <input
                                class="form-control"
                                name="nombres"
                                value="Lorena"
                                type="text"
                                required
                              />
                            </div>
                            <div class="form-group label-floating">
                              <label class="control-label">Apellidos</label>
                              <input
                                class="form-control"
                                name="apellidos"
                                value="Mendez"
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
                                value="7.123.456"
                                type="text"
                                required
                              />
                            </div>
                            <div class="form-group label-floating">
                              <label class="control-label">Motivo</label>
                              <input
                                class="form-control"
                                name="motivo"
                                value="Visita a personal"
                                type="text"
                                required
                              />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Fecha de visita</label>
                              <input
                                class="form-control"
                                name="f_visita"
                                type="date"
                                required
                              />
                            </div>
                            <div class="form-group">
                              <label class="control-label"
                                >Hora de ingreso al edificio</label
                              >
                              <input
                                class="form-control"
                                name="h_in"
                                type="time"
                                required
                              />
                            </div>
                            <div class="form-group">
                              <label class="control-label"
                                >Hora de salida del edificio</label
                              >
                              <input
                                class="form-control"
                                name="h_out"
                                type="time"
                                required
                              />
                            </div>
                            <div class="form-group label-floating">
                              <label class="control-label">Teléfono</label>
                              <input
                                class="form-control"
                                name="tlf"
                                value="+58 412-3456728"
                                type="text"
                                required
                              />
                            </div>

                            <p class="text-center">
                              <input
                                type="submit"
                                class="btn btn-success btn-raised btn-sm"
                                value="Actualizar"
                              />
                            </p>
                            <p class="text-center">
                              <a href=""
                                ><input
                                  type="button"
                                  class="btn btn-info btn-raised btn-sm"
                                  value="Volver"
                              /></a>
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
                                    <input class="form-control" name="nombres" value="Lorena" type="text" disabled />
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Apellidos</label>
                                    <input class="form-control" name="apellidos" value="Mendez" type="text" disabled />
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Cédula de identidad</label>
                                    <input class="form-control" name="cedula" value="7.123.456" type="text" disabled />
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Motivo</label>
                                    <input class="form-control" name="motivo" value="Visita a personal" type="text" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fecha de visita</label>
                                    <input class="form-control" name="f_visita" type="date" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Hora de ingreso al edificio</label>
                                    <input class="form-control" name="h_in" type="time" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Hora de salida del edificio</label>
                                    <input class="form-control" name="h_out" type="time" disabled />
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono</label>
                                    <input class="form-control" name="tlf" value="+58 412-3456728" type="text" disabled />
                                </div>

                                <p class="text-center">
                                    <input type="submit" class="btn btn-danger btn-raised btn-sm" value="Eliminar">
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
    <script defer>
      $.material.init();
    </script>
@endsection
