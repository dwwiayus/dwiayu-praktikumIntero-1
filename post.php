<?php
// Komentar PHP ini menjelaskan cara penggunaan cURL untuk mengirimkan komentar
// Contoh form untuk mengirimkan komentar menggunakan cURL

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Komentar Baru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Kirim Komentar Baru</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="body">Komentar:</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <?php
        // Cek jika form telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $body = $_POST['body'];

            // Data yang akan dikirim
            $commentData = [
                'name' => $name,
                'email' => $email,
                'body' => $body,
                'postId' => 1, // Mengirim komentar untuk post dengan ID 1
            ];

            // URL API untuk mengirim komentar
            $url = 'http://jsonplaceholder.typicode.com/comments';

            // Inisialisasi cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($commentData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Eksekusi cURL dan ambil hasilnya
            $response = curl_exec($ch);
            curl_close($ch);

            // Tampilkan respon dari API
            echo "<div class='mt-4'><h5>Respon dari API:</h5><pre>" . htmlspecialchars($response) . "</pre></div>";
        }
        ?>
    </div>
</body>
</html>
