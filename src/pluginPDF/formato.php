<?php

  include('vendor/autoload.php');

  use Spipu\Html2Pdf\Html2Pdf;

  if (isset($_POST['generarRepDocente'])) {
    ob_start();
    include('vistaFormatoDocente.php');
    $vista = ob_get_clean();

    $driver = new Html2Pdf();
    $driver->writeHTML($vista);
    $driver->output('reporte_tareas_actividades.pdf');
  }
  if (isset($_POST['generarRepPadre'])) {
    ob_start();
    include('vistaFormatoPadre.php');
    $vista = ob_get_clean();

    $driver = new Html2Pdf();
    $driver->writeHTML($vista);
    $driver->output('reporte_tareas_actividades.pdf');
  }

?>
