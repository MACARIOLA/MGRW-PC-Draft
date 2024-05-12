<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mgwrpc dtb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Remove previous file from database
    $delete_previous_query = "DELETE FROM others_pricelist_tbl";
    $conn->query($delete_previous_query);

    // File upload handling
    $target_dir = "uploads/"; // Directory where uploaded files will be stored
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow only certain file formats
    if($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, upload file to the uploads folder
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Save details to database
            $sql = "INSERT INTO others_pricelist_tbl (filename, filepath) VALUES ('". basename( $_FILES["fileToUpload"]["name"]) ."', '". $target_file ."')";
            if ($conn->query($sql) === TRUE) {
                // Display alert box
                echo '<script>alert("The file '. htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). ' has been uploaded and saved to the database.");</script>';
                // Refresh the page
                echo '<script>setTimeout(function(){ location.reload(); }, 1000);</script>';
                // Redirect to another page
                echo '<script>window.location.href = "cms.html";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}
?>
