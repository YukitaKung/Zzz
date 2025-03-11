<?php
header('Content-Type: application/json');

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0775, true);
    }


    $maxFileSize = 10 * 1024 * 1024; 
    if ($_FILES['image']['size'] > $maxFileSize) {
        $response['error'] = 'File size exceeds 10MB limit.';
        echo json_encode($response);
        exit;
    }

    $shortCode = substr(md5(uniqid()), 0, 8);
    $originalFileName = basename($_FILES['image']['name']);
    $targetFile = $targetDir . $shortCode . '_' . $originalFileName;

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $response['success'] = true;
            $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
            $response['link'] = $baseUrl . '/' . $targetFile;
            $response['shortLink'] = $baseUrl . '/img/' . $shortCode; 
        } else {
            $response['error'] = 'Error moving the file.';
        }
    } else {
        $response['error'] = 'Only JPG, PNG, GIF, and WebP files are allowed.';
    }
} else {
    $response['error'] = 'No file uploaded.';
}

echo json_encode($response);
?>