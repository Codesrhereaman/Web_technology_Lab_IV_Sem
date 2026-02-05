<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: #007bff !important;
        }
        
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
        }
        
        .profile-card {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .info-row {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: bold;
            color: #495057;
        }
        
        .info-value {
            color: #212529;
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
                        <a class="nav-link" href="upload.php">Upload Files</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container profile-container">
        <div class="profile-header text-center">
            <h1>Student Profile</h1>
            <p>View your account information</p>
        </div>

        <?php
        // Start session
        session_start();
        
        // Check if student is logged in (has session data or cookies)
        $studentName = $_SESSION['student_name'] ?? $_COOKIE['student_name'] ?? 'Guest User';
        $studentEmail = $_SESSION['student_email'] ?? 'Not Available';
        $studentId = $_SESSION['student_id'] ?? $_COOKIE['student_id'] ?? 'Not Available';
        $studentCourse = $_SESSION['student_course'] ?? 'Not Available';
        $studentSemester = $_SESSION['student_semester'] ?? 'Not Available';
        
        // Get session info
        $loginTime = isset($_SESSION['login_time']) ? date('Y-m-d H:i:s', $_SESSION['login_time']) : 'Not Available';
        $sessionId = session_id();
        
        // Check for last upload
        $lastUpload = $_SESSION['last_upload'] ?? null;
        ?>

        <!-- Personal Information Card -->
        <div class="profile-card">
            <h3 class="mb-4">Personal Information</h3>
            <div class="info-row">
                <span class="info-label">Full Name:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($studentName); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Student ID:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($studentId); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($studentEmail); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Course:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($studentCourse); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Semester:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($studentSemester); ?></span>
            </div>
        </div>

        <!-- Session Information Card -->
        <div class="profile-card">
            <h3 class="mb-4">Session Information</h3>
            <div class="info-row">
                <span class="info-label">Session ID:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($sessionId); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Login Time:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($loginTime); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Session Status:</span>
                <span class="info-value float-end">
                    <span class="badge bg-success">Active</span>
                </span>
            </div>
        </div>

        <!-- Cookie Information Card -->
        <div class="profile-card">
            <h3 class="mb-4">Cookie Information</h3>
            <div class="info-row">
                <span class="info-label">Cookies Enabled:</span>
                <span class="info-value float-end">
                    <?php echo isset($_COOKIE['student_name']) ? 'Yes' : 'No'; ?>
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Stored Name:</span>
                <span class="info-value float-end">
                    <?php echo isset($_COOKIE['student_name']) ? htmlspecialchars($_COOKIE['student_name']) : 'Not Set'; ?>
                </span>
            </div>
        </div>

        <?php if ($lastUpload): ?>
        <!-- Last Upload Information -->
        <div class="profile-card">
            <h3 class="mb-4">Recent Upload</h3>
            <div class="info-row">
                <span class="info-label">Document Type:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($lastUpload['document_type']); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">File Name:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($lastUpload['file_name']); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Upload Time:</span>
                <span class="info-value float-end"><?php echo htmlspecialchars($lastUpload['upload_time']); ?></span>
            </div>
        </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ES6 Arrow Function to display session info
        const displaySessionInfo = () => {
            const sessionData = {
                name: '<?php echo addslashes($studentName); ?>',
                id: '<?php echo addslashes($studentId); ?>',
                course: '<?php echo addslashes($studentCourse); ?>'
            };
            
            console.log('Student Session Data:', sessionData);
        };
        
        // Display on page load
        window.onload = () => {
            displaySessionInfo();
        };
    </script>
</body>
</html>