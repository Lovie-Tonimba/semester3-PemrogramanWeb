<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName     = trim($_POST['fullName'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $phoneNumber  = trim($_POST['phoneNumber'] ?? '');
    $dateOfBirth  = $_POST['dateOfBirth'] ?? '';
    $gender       = $_POST['gender'] ?? '';
    $address      = trim($_POST['address'] ?? '');
    $reason       = trim($_POST['reason'] ?? '');
    $experience   = trim($_POST['experience'] ?? '');
    $role         = $_POST['role'] ?? '';
    $schedule     = $_POST['schedule'] ?? [];
    $agree        = isset($_POST['agree']);

    $errors = [];

    if ($fullName === '') $errors[] = "Full Name is required";
    if ($email === '') $errors[] = "Email Address is required";
    if ($phoneNumber === '') $errors[] = "Phone Number is required";
    if ($dateOfBirth === '') $errors[] = "Date of Birth is required";
    if ($gender === '') $errors[] = "Gender must be selected";
    if ($address === '') $errors[] = "Address is required";
    if ($reason === '') $errors[] = "Please tell us why you want to volunteer";
    if ($experience === '') $errors[] = "Please describe your previous experience";
    if ($role === '') $errors[] = "Preferred Role must be selected";
    if (empty($schedule)) $errors[] = "Please select your preferred duration";
    
    if (count($schedule) > 1) {
        $errors[] = "Please select only one preferred duration";
    }
    
    if (!isset($_FILES['file']) || $_FILES['file']['error'] != UPLOAD_ERR_OK) {
        $errors[] = "CV file is required.";
    } else {
        $cvFile = $_FILES['file'];
        $cvExt = strtolower(pathinfo($cvFile['name'], PATHINFO_EXTENSION));
        if ($cvExt !== 'pdf') {
            $errors[] = "CV must be in PDF format.";
        }
    }
    
    if (!isset($_FILES['payment']) || $_FILES['payment']['error'] != UPLOAD_ERR_OK) {
        $errors[] = "Proof of payment is required.";
    } else {
        $paymentFile = $_FILES['payment'];
        $paymentExt = strtolower(pathinfo($paymentFile['name'], PATHINFO_EXTENSION));
        if (!in_array($paymentExt, ['jpg', 'jpeg', 'png'])) {
            $errors[] = "Proof of payment must be an image (JPG/PNG).";
        }
    }
    
    if (!$agree) $errors[] = "You must agree to the terms and conditions.";

    if (!empty($errors)) {
        echo "<h2>Your Submission Failed to Process</h2>";
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='volunteerForm.html'>Go back</a>";
        exit;
    }

    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

    $cvPath = $uploadDir . basename($_FILES['file']['name']);
    $paymentPath = $uploadDir . basename($_FILES['payment']['name']);

    move_uploaded_file($_FILES['file']['tmp_name'], $cvPath);
    move_uploaded_file($_FILES['payment']['tmp_name'], $paymentPath);

    $_SESSION['form_data'] = [
        'fullName'    => $fullName,
        'email'       => $email,
        'phoneNumber' => $phoneNumber,
        'dateOfBirth' => $dateOfBirth,
        'gender'      => $gender,
        'address'     => $address,
        'reason'      => $reason,
        'experience'  => $experience,
        'role'        => $role,
        'schedule'    => $schedule,
        'cvPath'      => $cvPath,
        'paymentPath' => $paymentPath
    ];

    header("Location: fileRegistration.php");

} else {
    echo "Invalid request";
}
?>