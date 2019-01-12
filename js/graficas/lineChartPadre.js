$(document).ready(function(){

  new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["Actividad 1", "Actividad 2", "Actividad 3", "Actividad 4", "Actividad 5"],
    datasets: [{
        data: [8,7,10,10,8,12],
        label: "Español",
        borderColor: "#3e95cd",
        fill: false
      }, {
        data: [10,10,10,9,10,12],
        label: "Matematicas",
        borderColor: "#8e5ea2",
        fill: false
      }, {
        data: [9,9,10,10,10,12],
        label: "Geografia",
        borderColor: "#3cba9f",
        fill: false
      }, {
        data: [4,7,5,6,5,12],
        label: "Historia",
        borderColor: "#e8c3b9",
        fill: false
      }, {
        data: [9,10,9,10,9,12],
        label: "Ciencias naturales",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Rendiemiento por materia a lo largo del trimestre'
    }
  }
});

});
