<?php
include 'config.php';

$result = $conn->query("SELECT id, filename, note, time FROM uploads ORDER BY id DESC");
$files = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $files[] = [
            'id' => $row['id'],
            'filename' => basename($row['filename']),
            'note' => ' ' . $row['note'],
            'time' => $row['time']
        ];
    }
}

$countResult = $conn->query("SELECT COUNT(*) as count FROM uploads");
$countRow = $countResult->fetch_assoc();

echo json_encode([
    'success' => true,
    'files' => $files,
    'file_count' => $countRow['count']
]);

$conn->close();
?>
