<?php
include 'config.php'; // Assuming config.php contains the database connection details

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['file_ids'])) {
        $fileIds = $_POST['file_ids']; // Array of file IDs

        // Prepare the response array
        $response = ['success' => false, 'message' => '', 'errors' => []];

        // Validate file IDs and delete files
        $validFileIds = [];
        foreach ($fileIds as $id) {
            $sanitizedId = intval($id); // Sanitize and validate the ID
            $query = $conn->prepare("SELECT filename FROM uploads WHERE id = ?");
            $query->bind_param("i", $sanitizedId);
            $query->execute();
            $result = $query->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $filePath = 'D:/Downloads/server/' . basename($row['filename']);
                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                        $deleteQuery = $conn->prepare("DELETE FROM uploads WHERE id = ?");
                        $deleteQuery->bind_param("i", $sanitizedId);
                        $deleteQuery->execute();
                        $validFileIds[] = $sanitizedId;
                    } else {
                        $response['errors'][] = "Error deleting file: " . $filePath;
                    }
                } else {
                    $response['errors'][] = "File not found: " . $filePath;
                }
            } else {
                $response['errors'][] = "Invalid file ID: " . $sanitizedId;
            }
        }

        if (empty($response['errors'])) {
            $response['success'] = true;
            $response['message'] = "Selected files deleted successfully.";
        } else {
            $response['message'] = implode('<br>', $response['errors']); // Combine error messages
        }

        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'No file IDs provided for deletion.']);
    }
} else {
    // Handle invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

$conn->close();
?>
