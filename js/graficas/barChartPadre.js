$(document).ready(function(){
  new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Español", "Matematicas", "Geografía", "Historia", "Ciencias naturales"],
      datasets: [
        {
          label: "Calificacion",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [8,10,9,6,9, 12,0]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Calificaciones del trimestre'
      }
    }
});
});
