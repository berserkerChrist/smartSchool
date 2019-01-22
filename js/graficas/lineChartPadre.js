//datos de graficas
$(document).ready(function(){
  $('#materiaGraficas').change(function(){
    var periodoGraficas = $('#periodoGraficas').val();
    var materiaGraficas = $(this).val();

    $.ajax({
      url:"src/drivers/datos/graficas.php",
      method:"POST",
      data: {periodoGraficas: periodoGraficas, materiaGraficas:materiaGraficas},
      success: function(data){
          console.log(data);
          var actividades = [];
          var calificaciones = [];
          var json = JSON.parse(data);
          var descripcion = [];

          for (var i in json){
            calificaciones.push(json[i].calificacion);
            actividades.push(json[i].titulo);
          }

          var datosGrafica = {
            labels: actividades,
            datasets: [{
                    label: "Actividades del periodo de evaluacion",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: '#ff0000',
                    borderColor: '#ffbbbb',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: calificaciones
                }],
          };
          var grafica = $("#line-chart");
          var linechart = new Chart(grafica, {
              type: 'line',
              data: datosGrafica
          });
      }
    });
  });
});
//datos de graficas
