<?php

// Create the new file
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $YouName = $_POST['youName'];
    $title = $_POST['title'];
    // Path and name for the new file
    $new_file = $YouName.'.txt';

    // Content for the new file
    $file_content = $title;
if (file_put_contents($new_file, $file_content) !== false) {
    echo "New file created successfully.<br>";
    
    // Path to the destination folder
    $destination_folder = "upload/";

    // Check if the destination folder exists, if not, create it
    if (!file_exists($destination_folder)) {
        mkdir($destination_folder, 0777, true);
    }

    // Path to the new file in the destination folder
    $destination_file = $destination_folder . basename($new_file);

    // Copy the file to the destination folder
    if (copy($new_file, $destination_file)) {
        echo "File copied successfully to $destination_file.";
    } else {
        echo "Error copying file to $destination_file.";
    }
} else {
    echo "Error creating new file.";
}
}
?>
