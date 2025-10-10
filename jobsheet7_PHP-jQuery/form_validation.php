<!DOCTYPE DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi AJAX & Password</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post" action="proses_validasi.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" style="color: red;"></span><br>
        <input type="submit" value="Submit">
    </form>

    <div id="ajax-response">
        </div>

    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault(); 

                var nama = $("#nama").val();
                var email = $("#email").val();
                var password = $("#password").val(); // Ambil nilai password
                var valid = true;

                // Client-Side Validation: Name
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                // Client-Side Validation: Email
                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }
                
                // Client-Side Validation: Password (BARU)
                if (password.length < 8) { // Cek minimum 8 karakter
                    $("#password-error").text("Password minimal 8 karakter.");
                    valid = false;
                } else {
                    $("#password-error").text("");
                }

                if (valid) {
                    var formData = $("#myForm").serialize();
                    
                    $.ajax({
                        url: "proses_validasi.php", 
                        type: "POST",
                        data: formData,
                        success: function (response) {
                            $("#ajax-response").html(response);
                        },
                        error: function() {
                            $("#ajax-response").html("<span style='color:red;'>Terjadi kesalahan saat menghubungi server.</span>");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>