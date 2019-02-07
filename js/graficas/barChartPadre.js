$(document).ready(function(){
  $('#periodoGraficasProm').change(function(){

    var periodo = $('#periodoGraficasProm').val();

    $.ajax({
        url:"src/drivers/datos/graficasPromedios.php",
        method: "POST",
        data:{periodoGraficasPromedios:periodo},
        success:function(data){
          console.log(data);
          var materias = [];
          var promedios = [];
          json = JSON.parse(data);

          for(var i in json){
            materias.push(json[i].nombre);
            promedios.push(json[i].calificacion);
          }

          var datosGrafica = {
            labels: materias,
            datasets: [{
                    label: "Promedios del periodo de evaluaciónn",
                    backgroundColor: '#ff0000',
                    borderColor: '#ffbbbb',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: promedios
                }],
          };
          var graficaPromedios = $('#bar-chart');

          var barchart = new Chart(graficaPromedios, {
              type: 'bar',
              data: datosGrafica,
              options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
          });

        }
    });
  });
});
