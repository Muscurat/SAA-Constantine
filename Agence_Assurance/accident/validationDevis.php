<?php

  try {
        
        $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (Exception $e) {

        die ('Erreur : ' . $e->getMessage());

  }

$imat = $_POST['immat2'];
$imat_b = $_POST['imat_b'];
$source = $_POST['source'];
$dest = $_POST['dest'];
$date_accid = $_POST['date_accid'];
$lieu = $_POST['lieu'];
$nom_cond = $_POST['nom_cond'];
$prenom_cond = $_POST['prenom_cond'];
$adr_cond = $_POST['adr_cond'];
$devis_rem = $_POST['devis_rem'];
$num_permit = $_POST['num_permit'];
$id_accident = $_POST['accident2'];
//$id_contrat = $_POST['contrat2'];

if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
{
	$UploadDirectory = '../htdocs/';
	
	//check if this is an ajax request
	/*if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}*/
	
	//Is file size is less than allowed size.
	if ($_FILES["FileInput"]["size"] > 5242880) {
		die("File size is too big!");
	}
	//allowed file type Server side check
	switch(strtolower($_FILES['FileInput']['type']))
		{
			//allowed file types

			case 'application/pdf':
			case 'application/x-pdf':
			case 'application/force-download':
				break;
			default:
				die('Unsupported File!'); //output error
	}
	
	$File_Name   = strtolower($_FILES['FileInput']['name']);
	$File_Ext    = substr($File_Name, strrpos($File_Name,'.')); //get file extention
	$NewFileName 	= $id_accident.$File_Ext; //new file name
	
    if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
       {
        // do other stuff
              
    }else{
       
    }
   
}
else
{
    die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
}

                    $date_accid = $_POST['date_accid'];
                    $date_accid = date("Y-m-d",strtotime($date_accid));

   $conn->query('UPDATE accident SET source="'.$_POST['source'].'",
     dest="'.$_POST['dest'].'",lieu="'.$_POST['lieu'].'",date_accid="'.$date_accid.'",
       nom_cond="'.$_POST['nom_cond'].'",
         prenom_cond="'.$_POST['prenom_cond'].'",adr_cond="'.$_POST['adr_cond'].'",
            num_permit="'.$_POST['num_permit'].'",imat_b="'.$_POST['imat_b'].'",
                devis_rem="'.$_POST['devis_rem'].'",
                    rapport="'.$NewFileName.'" WHERE id_accident="'.$id_accident.'"');

  // echo "ok"; //request ajax 

  header('location: ../list-accident.php');

?>