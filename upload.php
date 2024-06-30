<?php
include 'config.php';

$response = ['success' => false, 'message' => '', 'files' => []];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['files']['name'][0])) {
        $uploadDir = 'D:/Downloads/server/';  // Ensure this directory exists and is writable
        $note = isset($_POST['note']) ? $_POST['note'] : '';

        // Prepare the SQL query to insert file details into the database
        $stmt = $conn->prepare("INSERT INTO uploads (filename, note, time) VALUES (?, ?, NOW())");
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM uploads WHERE filename = ?");

        foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $uploadDir . $fileName;

            // Check for duplicate filenames
            $checkStmt->bind_param("s", $fileName);
            $checkStmt->execute();
            $checkStmt->bind_result($count);
            $checkStmt->fetch();
            $checkStmt->reset();

            if ($count > 0) {
                error_log("Duplicate file detected: " . $fileName);
                $response['message'] = 'Duplicate file: ' . $fileName;
                continue;  // Skip to the next file
            }

            if (move_uploaded_file($tmpName, $targetFilePath)) {
                // Bind the parameters and execute the query
                $stmt->bind_param("ss", $fileName, $note);

                if ($stmt->execute()) {
                    $response['success'] = true;
                    $response['files'][] = [
                        'filename' => $fileName,
                        'note' => $note,
                        'time' => date('Y-m-d H:i:s')
                    ];
                } else {
                    error_log("Failed to insert file details into the database: " . $stmt->error);
                    $response['message'] = 'Failed to insert file details into the database.';
                    break;
                }
            } else {
                error_log("Failed to upload file: " . $fileName);
                $response['message'] = 'Failed to upload file ' . $fileName;
                break;
            }
        }

        // Close the statements
        $stmt->close();
        $checkStmt->close();
    } else {
        $response['message'] = 'No files uploaded.';
    }

    // Close the database connection
    $conn->close();

    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
