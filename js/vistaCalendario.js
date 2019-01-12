$(document).ready(function() {
   var calendar = $('#calendarView').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    lang: 'es',
    events: 'src/calendario/cargarEventos.php',
    selectable:true,
    selectHelper:true,
    editable:false,

   });
  });
