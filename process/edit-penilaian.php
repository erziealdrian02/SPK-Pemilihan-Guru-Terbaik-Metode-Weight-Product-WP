<?php
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guru_id = $_POST['guru_id'];
    $pm = mysqli_real_escape_string($connect, $_POST['pm']);
    $pm = mysqli_real_escape_string($connect, $_POST['pm']);
    $ab = mysqli_real_escape_string($connect, $_POST['ab']);
    $pre = mysqli_real_escape_string($connect, $_POST['pre']);
    $tj = mysqli_real_escape_string($connect, $_POST['tj']);
    $dis = mysqli_real_escape_string($connect, $_POST['dis']);

    // Update the database with the new data
    $query = "UPDATE guru SET pm = '$pm', ab = '$ab', pre = '$pre', tj = '$tj', dis = '$dis' WHERE guru_id = '$guru_id'"; // Add status_karyawan in the query
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>
                alert('Berhasil mengedit data');
                window.location.href = '../penilaian-page.php';
              </script>";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($connect) . "'); window.location.href = '../form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form Tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
