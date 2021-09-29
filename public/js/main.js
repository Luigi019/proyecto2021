$(document).ready(function(){
    // Boton de buscar en usuarios y visitantes
    $('#search_content').click(function(event){
        event.preventDefault();
        var button  = this;
        var changed = '<input type="text" name="search" class="search_bar" onblur="show_again()" placeholder="Buscar...">';
        // Para hacer que empiece a buscar resultados al escribir las palabras agregar a la line de arriba el atributo (onkeyup="search()")
        // Y luego escribir la funcion despues del Fin Ready

        $(button).hide("slow","swing");
        $('.bar').html(changed);
        $('.bar').show("slow","swing");

    });

    // Modal editar Documento 
    $('.edit_doc').click(function(event){
        event.preventDefault();
    
        var get_token = $('input[name="_token"]').val();
        var documento = $(this).attr('documento');
        var action   = 'infoDoc';

        $.ajax({
            url: 'documentos/getDocs',
            type: 'POST',
            async: true,
            data: {
            _token:get_token,
            action:action,
            documento:documento
        },

            success: function(response){
                if (response != 'Error') {
                    // var info = JSON.parse(response);
                    $('.bodyModal').html('<form action="" method="post" name="form_modal" id="form_modal" onsubmit="event.preventDefault(); sendDataProduct();">'+
                                            '<h1 style="color: #256c78;">Editar documento</h1>'+
                                            '<h2 class="nameTitle" style="display: block ruby; font-size: 20pt;">Lorem ipsum</h2><br>'+//info.descripcion+'</h2><br>'+
                                            '<p align="left">Título</p>'+
                                            '<input type="text" name="titulo" id="textTitulo" placeholder="Título del documento" value="Constitución de la República Bolivariana de Venezuela" required><br>'+
                                            '<p align="left">Descripción</p>'+
                                            '<input type="text" name="descripcion" id="textDescripcion" placeholder="Descripción" value="Constitución de la República" required><br>'+//+info.precio_venta_s+'" required><br>'+
                                            '<p align="left">Perteneciente a</p>'+
                                            '<input type="text" name="oficina" id="textOficina" placeholder="Oficina" value="Inmobiliaria Nacional S.A." required>'+//+info.costo_producto_s+'" required>'+
                                            '<p align="left">Fecha de públicación</p>'+
                                            '<input type="text" name="fecha_publish" id="textFecha_publish" placeholder="Oficina" value="18/7/2021" required>'+
                                            '<input type="hidden" name="documento_id" id="documento_id" value="id_1" required>'+
                                            '<input type="hidden" name="action" value="editProduct" required>'+
                                            '<div class="alert-document alertEditDocument"></div><br>'+
                                            '<input type="submit" class="btn btn-success btn-raised btn-xs" value="Actualizar">'+
                                            '<br>'+
                                            '<input type="button" class="btn btn-danger btn-raised btn-xs" onclick="closeModal();" value="Regresar">'+
                                          '</form>');
                }
            },
            error: function(error){
                console.log(error);
            }

        });


       
        $('.modal').fadeIn(); 
    });

    // Modal Borrar Documento 
    $('.delete_doc').click(function(event){
        event.preventDefault();
       
        var documento = $(this).attr('documento');
        var action   = 'infoDoc';

        $.ajax({
            url: 'documentos/getDocs',
            type: 'POST',
            async: true,
            data: {action:action,producto:documento},

            success: function(response){
                if (response != 'Error') {
                    // var info = JSON.parse(response);
                    $('.bodyModal').html('<form action="" method="post" name="form_modal" id="form_modal" onsubmit="event.preventDefault(); sendDataProduct();">'+
                                            '<h1 style="color: #256c78;">Eliminar documento</h1>'+
                                            '<h2 class="nameTitle" style="display: block ruby; font-size: 20pt;">Lorem ipsum</h2><br>'+//info.descripcion+'</h2><br>'+
                                            '<p align="left">Título</p>'+
                                            '<input type="text" name="titulo" id="textTitulo" placeholder="Título del documento" value="Constitución de la República Bolivariana de Venezuela" disabled><br>'+
                                            '<p align="left">Descripción</p>'+
                                            '<input type="text" name="descripcion" id="textDescripcion" placeholder="Descripción" value="Constitución de la República" disabled><br>'+//+info.precio_venta_s+'" required><br>'+
                                            '<p align="left">Perteneciente a</p>'+
                                            '<input type="text" name="oficina" id="textOficina" placeholder="Oficina" value="Inmobiliaria Nacional S.A." disabled>'+//+info.costo_producto_s+'" required>'+
                                            '<p align="left">Fecha de públicación</p>'+
                                            '<input type="text" name="fecha_publish" id="textFecha_publish" placeholder="Oficina" value="18/7/2021" disabled>'+
                                            '<input type="hidden" name="documento_id" id="documento_id" value="id_1" required>'+
                                            '<input type="hidden" name="action" value="editProduct" required>'+
                                            '<div class="alert-document alertEditDocument"></div><br>'+
                                            '<input type="submit" class="btn btn-danger btn-raised btn-xs" value="Eliminar">'+
                                            '<br>'+
                                            '<input type="button" class="btn btn-success btn-raised btn-xs" onclick="closeModal();" value="Regresar">'+
                                          '</form>');
                }
            },
            error: function(error){
                console.log(error);
            }

        });


       
        $('.modal').fadeIn(); 
    });

}); // Fin ready
function show_again(){
    $('.bar').html('');
    $('.bar').hide("slow","swing");
    $('#search_content').show("slow","swing");
}
function closeModal(){
    $('.alert-document').html('');
    $('.modal').fadeOut();
}