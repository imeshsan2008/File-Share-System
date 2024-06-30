<?php
if (isset($_GET['filename'])) {
    $filePath = 'D:/Downloads/server/' . $_GET['filename'];

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        http_response_code(404);
        exit('File not found.');
    }
} else {
    http_response_code(400);
    exit('Filename parameter missing.');
}
?>
