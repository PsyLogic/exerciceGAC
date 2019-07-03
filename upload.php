<?php
session_start();
require_once('vendor/autoload.php');
$session_details = [];
if (isset($_FILES['file'])) {
    $file_ext = explode('.', $_FILES['file']['name']);
    $file_ext = strtolower(end($file_ext));

    //Check the right extension
    if ($file_ext === 'csv') {
        $uploadedFile = $_FILES['file']['tmp_name'];

        // Using move upload function because LOAD DATA query cannot recognize tmp files
        $newdirFileName = 'tmp/' . time() . $file_ext;
        if (!move_uploaded_file($uploadedFile, $newdirFileName)) {
            $session_details = ['status' => "danger", 'message' => "Error while uploading the file"];
        } else {
            $db = new MysqliDb('localhost', 'root', '', 'gac');
            $table = "detail_appels";


            $settings = array(
                "fieldChar" => ';',
                "lineChar" => "\n",
                "linesToIgnore" => 3,
                'fieldsToFill' => "(cpt_facture,n_facture,n_abonne,@date,heure,duree_vlm_reel,duree_vlm_fac,type) SET date=str_to_date(@date, '%d/%m/%Y')"
            );

            // USE LOAD DATA LOCAL
            $loadDataLocal = 'LOCAL';

            // Build SQL Syntax
            $sqlSyntax = sprintf(
                'LOAD DATA %s INFILE \'%s\' INTO TABLE %s',
                $loadDataLocal,
                $newdirFileName,
                $table
            );

            // FIELDS
            $sqlSyntax .= sprintf(' FIELDS TERMINATED BY \'%s\'', $settings["fieldChar"]);
            // LINES
            $sqlSyntax .= sprintf(' LINES TERMINATED BY \'%s\'', $settings["lineChar"]);
            // IGNORE LINES
            $sqlSyntax .= sprintf(' IGNORE %d LINES %s', $settings["linesToIgnore"], $settings["fieldsToFill"]);

            // check the query if it executed successfully
            if ($db->mysqli()->query($sqlSyntax))
                $session_details =  ['status' => "success", 'message' => "Date uploaded successfully"];
            else
                $session_details = ['status' => "danger", 'message' => sprintf('Query Failed, ERRNO: %u (%s)', $db->mysqli()->errno, $db->mysqli()->error)];

            // anyway, remove the uploaded file whatever the result
            unlink($newdirFileName);
        }
    } else {
        $session_details = ['status' => "danger", 'message' => "extension not allowed, please choose a CSV file."];
    }
} else {
    $session_details = ['status' => "danger", 'message' => "No File is provided, please select one."];
}

$_SESSION['details'] = $session_details;
header('Location: index.php');
exit;
