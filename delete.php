<?php
// $url='https://jsonplaceholder.typicode.com/posts/1';
// $ch = curl_init($url);

// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

// $response = curl_exec($ch);
// curl_close($ch);

// echo $response;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Hapus Post</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="postId">ID Post yang ingin dihapus:</label>
                <input type="number" class="form-control" id="postId" name="postId" required>
            </div>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>

        <?php
        // Cek jika form telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil ID post dari form
            $postId = intval($_POST['postId']);

            // URL API dengan ID post yang ingin dihapus
            $url = 'http://jsonplaceholder.typicode.com/posts/' . $postId;

            // Inisialisasi cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
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