<!DOCTYPE html>
<html>
<body>
    <?php
    // Inisialisasi variabel untuk menghindari warning jika form belum disubmit
    $input = "";
    $email = "";
    $input_error = "";
    $email_error = "";
    $is_valid = true;

    // Cek apakah data telah dikirim melalui metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // --- 1. PROSES INPUT TEKS (Nama/Input) ---
        if (isset($_POST['input']) && !empty($_POST['input'])) {
            $input = $_POST['input'];
            $input_aman = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        } else {
            $input_error = "Teks harus diisi.";
            $is_valid = false;
        }
        
        // --- 2. PROSES VALIDASI EMAIL ---
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email_input = $_POST['email'];
            
            // Logika validasi email yang Anda berikan
            if (filter_var($email_input, FILTER_VALIDATE_EMAIL)) {
                $email = htmlspecialchars($email_input); // Sanitasi email yang valid
            } else {
                $email_error = "Alamat email tidak valid.";
                $is_valid = false;
                $email = $email_input; // Pertahankan input yang salah
            }
        } else {
            $email_error = "Email harus diisi.";
            $is_valid = false;
        }

        // --- 3. KESIMPULAN VALIDASI ---
        if ($is_valid) {
            echo "<p>Input : $input_aman</p>";
            echo "<p>Email : $email</p>";
            
            // Kosongkan field form setelah submit sukses
            $input = "";
            $email = "";
        } else {
            echo "Validasi gagal. Silakan perbaiki kesalahan.</p>";
        }
    } 
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <label for="input_data">Masukkan Teks:</label>
        <input type="text" name="input" id="input_data" value="<?php echo htmlspecialchars($input); ?>" required>
        <span class="error"><?php echo $input_error; ?></span>
        <br><br>
        
        <label for="email_data">Masukkan Email:</label>
        <input type="email" name="email" id="email_data" value="<?php echo htmlspecialchars($email); ?>" required>
        <span class="error"><?php echo $email_error; ?></span>
        <br><br>

        <input type="submit" value="Kirim Data">
    </form>
</body>
</html>