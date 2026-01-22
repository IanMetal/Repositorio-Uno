<?php
if (!isset($_FILES['pdf'], $_POST['seccion'])) {
    die("Error al subir el archivo");
}

$archivo = $_FILES['pdf'];
$seccion = $_POST['seccion'];

if ($archivo['type'] !== 'application/pdf') {
    die("Solo se permiten archivos PDF");
}

$carpeta = "uploads/";
if (!is_dir($carpeta)) {
    mkdir($carpeta, 0755, true);
}

$nombreFinal = $seccion . ".pdf";
$rutaFinal = $carpeta . $nombreFinal;

move_uploaded_file($archivo['tmp_name'], $rutaFinal);

// Abrir el PDF guardado en otra pestaña
header("Content-Type: application/pdf");
header("Content-Disposition: inline; filename=\"$nombreFinal\"");
readfile($rutaFinal);
exit;
