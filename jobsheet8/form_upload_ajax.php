<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Unggah File Dokumen</title>
    </head>
<body>
    <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" name="submit" value="Unggah">
    </form>

    <div id="status"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="upload.js"></script>
</body>
</html> -->

<!-- QUESTION 11 -->
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Multi Upload Gambar</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="upload.js"></script>
</head>
<body>
    <h2>Unggah Beberapa Gambar Sekaligus</h2>

    <form id="upload-form" enctype="multipart/form-data">
        <input type="file" name="files[]" id="files" multiple accept=".jpg,.jpeg,.png,.gif"><br><br>
        <input type="submit" value="Unggah">
    </form>

    <div id="status"></div>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="upload.css">
    <title>Unggah File Dokumen</title>
</head>
<body>
    <div class="upload-form-container">
        <h2>Unggah File Dokumen</h2>
            <form id="upload-form" enctype="multipart/form-data">
            <div class="file-input-container">
                <input type="file" name="file" id="file" class="file-input">
                <label for="file" class="file-label">Pilih File</label>
            </div>
            <button type="submit" name="submit" class="upload-button" id="upload-button" 
            disabled>Unggah</button>
        </form>
        <div id="status" class="upload-status"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="upload.js"></script>
</body>
</html>