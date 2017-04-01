<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=lacriee;charset=utf8', 'root', '');



$nomScient = addslashes($_POST['nomScient']);
$nomComm = addslashes($_POST['nomComm']);
$codeE = addslashes($_POST['codeE']);

$fileName=$_FILES["fileToUpload"]["name"];

$separation = explode(".", $fileName);
$fileName = $separation[0];



try {
    if ($bdd != null) {

        $requete = "insert into espece(nomComm,codeEsp,nomScient,nomImg) values ('".$nomComm."','".$codeE."','".$nomScient."','".$fileName."')";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();


        header('Location: gestion.php');



        $target_dir = "../Images/Poissons/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }



} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>