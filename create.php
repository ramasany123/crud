<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passw = mysqli_real_escape_string($conn, $_POST['password']);
    $passw = password_hash($passw, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, passw) VALUES ('$name', '$email', '$passw')";
    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Tambah Pengguna</h2>
    <form method="POST">
        Nama: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Umur: <input type="password" name="passw" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
