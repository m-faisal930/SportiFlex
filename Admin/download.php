<?php
$file_path = $_GET['file'];  // Get the file path from the query parameter

// Check if the file exists
if (file_exists($file_path)) {
    // Set the appropriate headers for file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));
    ob_clean();
    flush();
    
    // Read the file and output it to the browser
    readfile($file_path);
    exit;
} else {
    echo 'File not found.';
}
?>
