<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: #007bff !important;
        }
        
        .upload-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .alert {
            margin-top: 20px;
        }
        
        .file-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Student Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="upload.php">Upload Files</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="upload-container">
        <h2 class="text-center mb-4">Upload Student Documents</h2>
        
        <?php
        // Display upload status messages
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success">File uploaded successfully!</div>';
        }
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
        }
        ?>
        
        <form id="uploadForm" method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="studentId" name="studentId" required>
            </div>
            
            <div class="mb-3">
                <label for="documentType" class="form-label">Document Type</label>
                <select class="form-control" id="documentType" name="documentType" required>
                    <option value="">Select Document Type</option>
                    <option value="assignment">Assignment</option>
                    <option value="project">Project</option>
                    <option value="certificate">Certificate</option>
                    <option value="id_proof">ID Proof</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="fileUpload" class="form-label">Select File</label>
                <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                <small class="text-muted">Allowed: PDF, DOC, DOCX, JPG, PNG (Max 5MB)</small>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary w-100">Upload File</button>
        </form>
        
        <div class="file-info">
            <h5>Upload Guidelines:</h5>
            <ul>
                <li>Maximum file size: 5MB</li>
                <li>Supported formats: PDF, DOC, DOCX, JPG, PNG</li>
                <li>Files will be organized by Student ID</li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ES6 Arrow Function for file validation
        const validateFile = (file) => {
            const maxSize = 5 * 1024 * 1024; // 5MB
            const allowedTypes = ['application/pdf', 'application/msword', 
                                 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                 'image/jpeg', 'image/png'];
            
            if (file.size > maxSize) {
                alert('File size must be less than 5MB');
                return false;
            }
            
            if (!allowedTypes.includes(file.type)) {
                alert('Invalid file type. Allowed: PDF, DOC, DOCX, JPG, PNG');
                return false;
            }
            
            return true;
        };
        
        // File input change event
        document.getElementById('fileUpload').addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                validateFile(file);
            }
        });
    </script>
</body>
</html>

<?php
// PHP Backend - File Upload Handler

session_start();

if (isset($_POST['submit'])) {
    $studentId = $_POST['studentId'] ?? '';
    $documentType = $_POST['documentType'] ?? '';
    
    // Validate inputs
    if (empty($studentId) || empty($documentType)) {
        header('Location: upload.php?error=Please fill all fields');
        exit();
    }
    
    // File upload handling
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === 0) {
        $file = $_FILES['fileUpload'];
        
        // Validate file
        $allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName = $file['tmp_name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Check file size
        if ($fileSize > $maxFileSize) {
            header('Location: upload.php?error=File size exceeds 5MB');
            exit();
        }
        
        // Check file extension
        if (!in_array($fileExtension, $allowedExtensions)) {
            header('Location: upload.php?error=Invalid file type');
            exit();
        }
        
        // Directory Creation
        $baseUploadDir = 'uploads/';
        $studentUploadDir = $baseUploadDir . $studentId . '/';
        $documentUploadDir = $studentUploadDir . $documentType . '/';
        
        // Create directories if they don't exist
        if (!file_exists($baseUploadDir)) {
            mkdir($baseUploadDir, 0777, true);
        }
        
        if (!file_exists($studentUploadDir)) {
            mkdir($studentUploadDir, 0777, true);
        }
        
        if (!file_exists($documentUploadDir)) {
            mkdir($documentUploadDir, 0777, true);
        }
        
        // Generate unique filename
        $newFileName = uniqid() . '_' . $fileName;
        $destination = $documentUploadDir . $newFileName;
        
        // Move uploaded file
        if (move_uploaded_file($fileTmpName, $destination)) {
            // Store file info in session
            $_SESSION['last_upload'] = [
                'student_id' => $studentId,
                'document_type' => $documentType,
                'file_name' => $fileName,
                'upload_time' => date('Y-m-d H:i:s')
            ];
            
            header('Location: upload.php?success=1');
            exit();
        } else {
            header('Location: upload.php?error=Failed to upload file');
            exit();
        }
    } else {
        header('Location: upload.php?error=No file selected');
        exit();
    }
}
?>