<?php
echo $this->Form->create(null, ['type' => 'file']);
echo $this->Form->file('submittedfile');
echo $this->Form->button('Submit');
echo $this->Form->end();

$uploadPath = '../uploads/';

// Check if the directory exists, if not, create it
if (!is_dir($uploadPath)) {
    if (!mkdir($uploadPath, 0755, true)) {
        throw new \Exception("Failed to create upload directory: " . $uploadPath);
    }
}

// Check if the directory is writable
if (!is_writable($uploadPath)) {
    throw new \Exception("Upload directory is not writable: " . $uploadPath);
}

// Check if the form has been submitted and a file has been uploaded
if ($this->request->is('post')) {
    // Get the uploaded file object
    $file = $this->request->getData('submittedfile');

    if ($file && $file->getError() === UPLOAD_ERR_OK) {
        $filename = $file->getClientFilename();
        $destination = $uploadPath . basename($filename);

        // Move the uploaded file to the destination directory
        try {
            $file->moveTo($destination);
            echo "File uploaded successfully: " . htmlspecialchars($filename) . "<br>";
        } catch (\Laminas\Diactoros\Exception\UploadedFileAlreadyMovedException $e) {
            echo "File has already been moved. Cannot move it again.<br>";
        }
    } else {
        echo "No file selected or an error occurred during the upload.<br>";
    }
}

// List files in the uploads directory
if (is_dir($uploadPath) && is_readable($uploadPath)) {
    $files = scandir($uploadPath, 0);

    if ($files !== false) {
        echo "Files uploaded in uploads/ are:<br/>";
        for ($i = 2; $i < count($files); $i++) {
            echo "File is - " . htmlspecialchars($files[$i]) . "<br>";
        }
    } else {
        echo "Failed to scan directory.<br>";
    }
} else {
    echo "Upload directory does not exist or is not readable.<br>";
}
?>
