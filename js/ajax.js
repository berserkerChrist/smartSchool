function cerrarMsg() {
    $(function(){
        $('#msg').click(function(){
            $('#msg').hide();
        })
    })
}

//subir excel
$(document).ready(function(){
      $('#excelPlaneacion').change(function(){
           $('#subirExcel').submit();
      });
      $('#subirExcel').on('submit', function(event){
           event.preventDefault();
           $.ajax({
                url:"src/pluginExcel/procesarInfo.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                     $('#result').html(data);
                     $('#excelPlaneacion').val('');
                }
           });
      });
 });
//subir excel

//select para alumnos
$(document).ready(function(){
  $('#selectGrupo').change(function(){
      var selectGrupo = $(this).val();
      $.ajax({
        type: "POST",
        url: "src/select.php",
        data: {grupo:selectGrupo},
        success: function(resp) {
            if(resp != "") {
                $('#selectRespuesta').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
            }
        }
      });
  });
});
//select para alumnos

//select para calificacion actividades
$(document).ready(function(){
  $('#selectMateria').change(function(){
      var selectPeriodo = $('#selectPeriodo').val();
      var materia = $(this).val();
      $.ajax({
        type: "POST",
        url: "src/drivers/driverCalActividades.php",
        data: {periodo:selectPeriodo, materia:materia},
        success: function(resp) {
            if(resp != "") {
                $('#formCalificacionesAct').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
            }else {
              $('#formCalificacionesAct').html(' ');
            }
        }
      });
  });
});
//select para calificacion actividades
function insertarCalificacion(idAct) {
  var alumno = $('#selectAlumno').val();
  var calificacion = $('#'+idAct+'cal').val();
  var materia = $('#'+idAct+'materia').val();
  var periodo = $('#'+idAct+'periodo').val();

  $.ajax({

    url: 'src/insertCalificacionActividades.php',
    method: 'POST',
    data: {id:idAct, alumno:alumno, calificacion:calificacion, materiaCalActividades:materia, periodoCalActividades:periodo},
    success: function (resp){
      if(resp != "") {
          $('#captura').html(resp); //Muestra la consulta en el div con el id="verDivStock"
      }
    }
  })
}

//select para calificacion tareas
$(document).ready(function(){
  $('#selectMateriaTareas').change(function(){
      var selectPeriodoTareas = $('#selectPeriodoTareas').val();
      var materiaTareas = $(this).val();
      $.ajax({
        type: "POST",
        url: "src/drivers/driverCalTareas.php",
        data: {periodoTareas:selectPeriodoTareas, materia:materiaTareas},
        success: function(resp) {
            if(resp != "") {
                $('#formCalificacionesTareas').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
            }else {
              $('#formCalificacionesTareas').html(' ');
            }
        }
      });
  });
});
//select para calificacion tareas
function insertarCalificacionTareas(idTarea) {
  var alumno = $('#selectAlumnoTareas').val();
  var calificacion = $('#'+idTarea+'cal').val();
  var periodo = $('#'+idTarea+'periodo').val();
  var materia = $('#'+idTarea+'materia').val();

  $.ajax({

    url: 'src/insertCalificacionTareas.php',
    method: 'POST',
    data: {id:idTarea, alumno:alumno, calificacion:calificacion, periodoCalTarea:periodo, materiaCalTarea:materia},
    success: function (resp){
      if(resp != "") {
          $('#capturaTarea').html(resp); //Muestra la consulta en el div con el id="verDivStock"
      }
    }
  })
}

//select para calificacion proyecto
$(document).ready(function(){
  $('#selectPeriodoProyecto').change(function(){
      var selectPeriodoProyecto = $(this).val();
      $.ajax({
        type: "POST",
        url: "src/drivers/driverCalProyecto.php",
        data: {periodoProyectoshi:selectPeriodoProyecto},
        success: function(resp) {
            if(resp != "") {
                $('#formCalificacionesProyecto').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
            }else {
              $('#formCalificacionesProyecto').html(' ');
            }
        }
      });
  });
});
//select para calificacion proyecto
function insertarCalificacionProyecto(idProyecto) {
  var calificacion = $('#'+idProyecto+'calProyecto').val();
  var idAlumno = $('#'+idProyecto+'Nombre').val();

  $.ajax({

    url: 'src/insertCalificacionProyecto.php',
    method: 'POST',
    data: {id:idProyecto, alumno:idAlumno, calificacion:calificacion},
    success: function (resp){
      if(resp != "") {
          $('#capturaProyecto').html(resp); //Muestra la consulta en el div con el id="verDivStock"
      }
    }
  })
}

//calificacion proyecto

//buscar docente para darle de baja
function buscarDocente() {
    $(function(){
        $('#buscar-docente').submit(function(e){
            e.preventDefault(); //Se previene el envio del formulario
        })

        $('#deleteDocente').keyup(function(){
            var envio = $('#deleteDocente').val(); //Se obtiene el valor del input

            $.ajax({
                type: 'POST', //Metodo de envio
                url: 'src/eliminarDocente.php', //Lugar a donde se envia la variable
                data: ('buscarDocente='+envio), //Variable que recive el PHP
                success: function(resp) {
                    if(resp != "") {
                        $('#ver-buscarProv').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
                    }
                }
            })
        })
    })
}
$(document).ready(function(){
  $(document).on('click', '.baja-docente', function(){
    var nomina = $(this).attr("id");
    alert(nomina);
    $.ajax({
      url: "src/updateMaestro.php",
      method: "POST",
      data:{nominaBaja:nomina},
      success:function(data){
        if(data != "") {
            $('#ver-buscarProv').html(data); //Muestra la consulta en el div con el id="ver-buscar"
        }
      }
    });
  });
});
//buscar docente para darle de baja

//buscar alumno para darle de baja
function buscarAlumno() {
    $(function(){
        $('#buscar-alumno').submit(function(e){
            e.preventDefault(); //Se previene el envio del formulario
        })

        $('#deleteAlumno').keyup(function(){
            var envio = $('#deleteAlumno').val(); //Se obtiene el valor del input

            $.ajax({
                type: 'POST', //Metodo de envio
                url: 'src/eliminarAlumno.php', //Lugar a donde se envia la variable
                data: ('buscarAlumno='+envio), //Variable que recive el PHP
                success: function(resp) {
                    if(resp != "") {
                        $('#ver-buscarAlumno').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
                    }
                }
            })
        })
    })
}
$(document).ready(function(){
  $(document).on('click', '.baja-alumno', function(){
    var nick = $(this).attr("id");
    $.ajax({
      url: "src/updateAlumno.php",
      method: "POST",
      data:{nickBaja:nick},
      success:function(data){
        if(data != "") {
            $('#ver-buscarAlumno').html(data); //Muestra la consulta en el div con el id="ver-buscar"
        }
      }
    });
  });
});
//buscar alumno para darle de baja

//modificar datos del docente
function modificarDocente() {
    $(function(){
        $('#modificar-docente').submit(function(e){
            e.preventDefault(); //Se previene el envio del formulario
        })

        $('#modDocente').keyup(function(){
            var envio = $('#modDocente').val(); //Se obtiene el valor del input

            $.ajax({
                type: 'POST', //Metodo de envio
                url: 'src/modificarDocente.php', //Lugar a donde se envia la variable
                data: ('modificarDocente='+envio), //Variable que recive el PHP
                success: function(resp) {
                    if(resp != "") {
                        $('#ver-buscarDocente').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
                    }
                }
            })
        })
    })
}
$(document).ready(function(){
      $(document).on('click', '.edit_data', function(){
           var nomina= $(this).attr("id");
           $.ajax({
                url:"src/fetch/fetchDocente.php",
                method:"POST",
                data:{nomina:nomina},
                dataType:"json",
                success:function(data){
                     $('#nominaDocente').val(data.nomina);
                     $('#nombreDoc').val(data.nombre);
                     $('#apPaternoDocente').val(data.ap_paterno);
                     $('#apMaternoDocente').val(data.ap_materno);
                     $('#grupofk').val(data.grupo_fk);
                     $('#nominaDoc').val(data.nomina);
                     $('#insert').val("Actualizar");
                     $('#modalModificarDocente').modal('show');
                }
           });
      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
                 $.ajax({
                     url:"src/updateMaestro.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Actualizando");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#modalModificarDocente').modal('hide');
                          $('#ver-buscarDocente').html(data);
                     }
                });

      });
 });
//modificar datos del docente

//Modificar datos del alumno
function modificarAlumno() {
    $(function(){
        $('#modificar-alumno').submit(function(e){
            e.preventDefault(); //Se previene el envio del formulario
        })

        $('#modAlumno').keyup(function(){
            var envio = $('#modAlumno').val(); //Se obtiene el valor del input

            $.ajax({
                type: 'POST', //Metodo de envio
                url: 'src/modificarAlumno.php', //Lugar a donde se envia la variable
                data: ('modificarAlumno='+envio), //Variable que recive el PHP
                success: function(resp) {
                    if(resp != "") {
                        $('#ver-buscarAlumnoMod').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
                    }
                }
            })
        })
    })
}
$(document).ready(function(){
      $(document).on('click', '.edit_data_alumno', function(){
           var nickname= $(this).attr("id");
           $.ajax({
                url:"src/fetch/fetchAlumno.php",
                method:"POST",
                data:{nickname:nickname},
                dataType:"json",
                success:function(data){
                     $('#nicknameAlumno').val(data.nickname);
                     $('#nombreAl').val(data.nombre);
                     $('#apPaternoAlumno').val(data.ap_paterno);
                     $('#apMaternoAlumno').val(data.ap_materno);
                     $('#grupofkAl').val(data.grupo_fk);
                     $('#nickAlumno').val(data.nickname);
                     $('#insert').val("Actualizar");
                     $('#modalModificarAlumno').modal('show');
                }
           });
      });
      $('#insert_form_alumno').on("submit", function(event){
           event.preventDefault();
                 $.ajax({
                     url:"src/updateAlumno.php",
                     method:"POST",
                     data:$('#insert_form_alumno').serialize(),
                     beforeSend:function(){
                          $('#insertAl').val("Actualizando");
                     },
                     success:function(data){
                          $('#insert_form_alumno')[0].reset();
                          $('#modalModificarAlumno').modal('hide');
                          $('#ver-buscarAlumnoMod').html(data);
                     }
                });

      });
 });
//Modificar datos del alumno

//modificar datos de Grupos
function buscarGrupo() {
    $(function(){
        $('#buscar-grupo').submit(function(e){
            e.preventDefault(); //Se previene el envio del formulario
        })

        $('#modGrupo').keyup(function(){
            var envio = $('#modGrupo').val(); //Se obtiene el valor del input

            $.ajax({
                type: 'POST', //Metodo de envio
                url: 'src/verGrupo.php', //Lugar a donde se envia la variable
                data: ('buscarGrupo='+envio), //Variable que recive el PHP
                success: function(resp) {
                    if(resp != "") {
                        $('#ver-buscarGrupo').html(resp); //Muestra la consulta en el div con el id="ver-buscar"
                    }
                }
            })
        })
    })
}
$(document).ready(function(){
  $(document).on('click', '.edit_data_grupo', function(){

    var idGrupo = $(this).attr("id");
    $.ajax({
      url:"src/fetch/fetchGrupo.php",
      method: "POST",
      data:{idGr:idGrupo},
      dataType: "json",
      success:function(data){
        $('#idAntiguoGrupo').val(data.id_grupo);
        $('#grupoAnterior').val(data.grupo);
        $('#cicloEscolarAnterior').val(data.ciclo_escolar);
        $('#insertGr').val("Actualizar");
        $('#modalModificarGrupo').modal('show');
      }
    });
  });
  $('#insert_form_grupo').on("submit", function(event){
       event.preventDefault();
             $.ajax({
                 url:"src/updateGrupo.php",
                 method:"POST",
                 data:$('#insert_form_grupo').serialize(),
                 beforeSend:function(){
                      $('#insertGr').val("Actualizando");
                 },
                 success:function(data){
                      $('#insert_form_grupo')[0].reset();
                      $('#modalModificarGrupo').modal('hide');
                      $('#ver-buscarGrupo').html(data);
                 }
            });
  });
});
//modificar datos de Grupos

//definir Retro
$(document).ready(function(){
  $('#escalaRetro').on("submit", function(event){
    event.preventDefault();
    $.ajax({
        url:"src/drivers/driverProyecto.php",
        method:"POST",
        data:$('#escalaRetro').serialize(),
        beforeSend:function(){
             $('#insertProyecto').val("Creando");
        },
        success:function(data){
             $('#escalaRetro')[0].reset();
             $('#resProyecto').html(data);
        }
    });
  });
});
//definir Retro

//fetch docente
$(document).ready(function(){
      $(document).on('click', '#fetch_docente', function(){
           var nomina= $('#nominaReg').val();
           $.ajax({
                url:"src/fetch/fetchDocente.php",
                method:"POST",
                data:{nomina:nomina},
                dataType:"json",
                success:function(data){
                     $('#nominaReg').val(data.nomina);
                     $('#nombreDocente').val(data.nombre);
                     $('#apellidoPatDocente').val(data.ap_paterno);
                     $('#apellidoMatDocente').val(data.ap_materno);
                     $('#grupofkD').val(data.grupo_fk);
                     $('#nominaReg').val(data.nomina);
                     $('#insertDocente').val("Registrar");
                }
           });
      });
      $('#regDocente').on("submit", function(event){
           event.preventDefault();
                 $.ajax({
                     url:"src/registroMaestro.php",
                     method:"POST",
                     data:$('#regDocente').serialize(),
                     beforeSend:function(){
                          $('#insertDocente').val("Registrando");
                     },
                     success:function(data){
                          $('#regDocente')[0].reset();
                          $('#modalRegistro').modal('hide');
                     }
                });

      });
 });
//fetch docente

//cargar proyecto
$(document).ready(function(){
  $('#selectShowProyecto').change(function(){
    var showProyecto = $(this).val();
    $.ajax({
      url:"src/fetch/fetchProyecto.php",
      method:"POST",
      data:{periodoShowProyecto: showProyecto},
      success:function(data){
        if (data != "") {
          $('#mostrarProyecto').html(data);
        }else {
          $('#mostrarProyecto').html("<button type='button' class='btn btn-info'>Aun no hay proyecto :O</button>");
        }
      }
    });
  });
});
//cargar proyecto

//onScrollPadreTareas
$(document).ready(function() {

  var limite = 12;
  var inicio = 0;
  var action = 'inactive';

  function cargarTareas(limite, inicio) {
    $.ajax({
      url: "src/fetch/fetchTareasPadre.php",
      type: "POST",
      data: {
        limite: limite,
        inicio: inicio
      },
      cache: false,
      success: function(data) {
        $('#mostrarTareas').append(data);
        if (data == '') {
          $('#cargando').html("<button type='button' class='btn btn-info'>No hay más tareas :D</button>");
          action = 'active';
        } else {
          $('#cargando').html("<button type='button' class='btn btn-warning'>Espera un momento...</button>");
          action = 'inactive';
        }
      }
    });
  }

  if (action == 'inactive') {
    action = 'active';
    cargarTareas(limite, inicio);
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $("#mostrarTareas").height() && action == 'inactive') {
      action = 'active';
      inicio = inicio + limite;
      setTimeout(function() {
        cargarTareas(limite, inicio);
      }, 1000);
    }
  });


});
//onScrollPadreTareas

//onScrollPadreActividades
$(document).ready(function() {

  var limiteAct = 12;
  var inicioAct = 0;
  var actionAct = 'inactive';

  function cargarTareas(limiteAct, inicioAct) {
    $.ajax({
      url: "src/fetch/fetchActividadesPadre.php",
      type: "POST",
      data: {
        limiteAct: limiteAct,
        inicioAct: inicioAct
      },
      cache: false,
      success: function(data) {
        $('#mostrarActividades').append(data);
        if (data == '') {
          $('#cargandoAct').html("<button type='button' class='btn btn-info'>No hay más actividades :D</button>");
          actionAct = 'active';
        } else {
          $('#cargandoAct').html("<button type='button' class='btn btn-warning'>Espera un momento...</button>");
          actionAct = 'inactive';
        }
      }
    });
  }

  if (actionAct == 'inactive') {
    actionAct = 'active';
    cargarTareas(limiteAct, inicioAct);
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $("#mostrarActividades").height() && actionAct == 'inactive') {
      actionAct = 'active';
      inicioAct = inicioAct + limiteAct;
      setTimeout(function() {
        cargarTareas(limiteAct, inicioAct);
      }, 1000);
    }
  });


});
//onScrollPadreActividades

//onScrollAlumnoTareas
$(document).ready(function() {

  var limiteA = 12;
  var inicioA = 0;
  var actionA = 'inactive';

  function cargarTareas(limiteA, inicioA) {
    $.ajax({
      url: "src/fetch/fetchTareasAlumno.php",
      type: "POST",
      data: {
        limite: limiteA,
        inicio: inicioA
      },
      cache: false,
      success: function(data) {
        $('#mostrarTareasA').append(data);
        if (data == '') {
          $('#cargandoA').html("<button type='button' class='btn btn-info'>No hay más tareas :D</button>");
          actionA = 'active';
        } else {
          $('#cargandoA').html("<button type='button' class='btn btn-warning'>Espera un momento...</button>");
          actionA = 'inactive';
        }
      }
    });
  }

  if (actionA == 'inactive') {
    actionA = 'active';
    cargarTareas(limiteA, inicioA);
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $("#mostrarTareas").height() && actionA == 'inactive') {
      actionA = 'active';
      inicioA = inicioA + limiteA;
      setTimeout(function() {
        cargarTareas(limiteA, inicioA);
      }, 1000);
    }
  });


});
//onScrollAlumnoTareas

//onScrollAlumnoActividades
$(document).ready(function() {

  var limiteActA = 12;
  var inicioActA = 0;
  var actionActA = 'inactive';

  function cargarTareas(limiteActA, inicioActA) {
    $.ajax({
      url: "src/fetch/fetchActividadesAlumno.php",
      type: "POST",
      data: {
        limiteActA: limiteActA,
        inicioActA: inicioActA
      },
      cache: false,
      success: function(data) {
        $('#mostrarActividadesAlumno').append(data);
        if (data == '') {
          $('#cargandoActAlumno').html("<button type='button' class='btn btn-info'>No hay más actividades :D</button>");
          actionActA = 'active';
        } else {
          $('#cargandoActAlumno').html("<button type='button' class='btn btn-warning'>Espera un momento...</button>");
          actionActA = 'inactive';
        }
      }
    });
  }

  if (actionActA == 'inactive') {
    actionActA = 'active';
    cargarTareas(limiteActA, inicioActA);
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $("#mostrarActividades").height() && actionActA == 'inactive') {
      actionActA = 'active';
      inicioActA = inicioActA + limiteActA;
      setTimeout(function() {
        cargarTareas(limiteActA, inicioActA);
      }, 1000);
    }
  });


});
//onScrollalumnoActividades
