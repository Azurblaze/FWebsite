<?php

// FTP server credentials
$ftpServer = 'j8513369.eero.online:21';
$ftpUsername = 'HomeServer';
$ftpPassword = '69278701Mike!';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the FTP server and log in
    $ftpConn = ftp_connect($ftpServer);
    ftp_login($ftpConn, $ftpUsername, $ftpPassword);

    // Get the uploaded file information
    $fileInfo = $_FILES["fileToUpload"];

    // Construct the target file path
    $targetDir = "/HomeServer@j8513369.eero.online/Website Pictures/";
    $targetFile = $targetDir . basename($fileInfo["name"]);

    // Upload the file to the FTP server
    if (ftp_put($ftpConn, $targetFile, $fileInfo["tmp_name"], FTP_BINARY)) {
        echo "The file " . basename($fileInfo["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Close the FTP connection
    ftp_close($ftpConn);
}

?>