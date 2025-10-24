<?php
session_start();

if (!isset($_SESSION['form_data'])) {
    echo "<h2>No registration data found.</h2>";
    echo "<p><a href='volunteerForm.html'>Go back</a></p>";
    exit;
}

$data = $_SESSION['form_data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Volunteer File Registration</title>
    <link rel="stylesheet" href="cssRegistration.css">
</head>
<body>
    <div class="container">
        <h1>Registration Successful!</h1> <br>
        <p> 🌸 Thank you for joining our Volunteer Program 🌸</p>

        <div class="result-box">
            <h2>Personal Information</h2>
            <p><strong>Full Name :</strong> <?= htmlspecialchars($data['fullName']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($data['email']) ?></p>
            <p><strong>Phone :</strong> <?= htmlspecialchars($data['phoneNumber']) ?></p>
            <p><strong>Date of Birth :</strong> <?= htmlspecialchars($data['dateOfBirth']) ?></p>
            <p><strong>Gender :</strong> <?= htmlspecialchars($data['gender']) ?></p>
            <p><strong>Address :</strong> <?= htmlspecialchars($data['address']) ?></p>
            <p><strong>CV :</strong> <a href="<?= htmlspecialchars($data['cvPath']) ?>" target="_blank">View CV</a></p>
            <p><strong>Proof of Payment :</strong><br>
                <img src="<?= htmlspecialchars($data['paymentPath']) ?>" width="200">
            </p>
            
            <h2>Volunteer Details</h2>
            <p><strong>Reason :</strong> <?= nl2br(htmlspecialchars($data['reason'])) ?></p>
            <p><strong>Experience :</strong> <?= nl2br(htmlspecialchars($data['experience'])) ?></p>
            <p><strong>Preferred Role :</strong> <?= htmlspecialchars($data['role']) ?></p>
            <p><strong>Duration :</strong> <?= htmlspecialchars(implode(', ', $data['schedule'])) ?></p>

        </div>
        <br>
        <a href="welcomePage.html" class="back-btn">Back to Welcome Page</a>
    </div>
</body>
</html>