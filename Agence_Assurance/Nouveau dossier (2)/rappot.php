<?php

$id_accident = $_GET['id_accid'];

$file = 'htdocs/'.$id_accident.'.pdf' ;
$filename = 'htdocs/'.$id_accident.'.pdf' ;
header ('Content-type: application/pdf');
header ('Content-Disposition: inline; filename="'.$filename.'"');
header ('Content-Transfer-Encoding: binary');
header ('Accept-ranges: bytes');
@readfile($file);

?>