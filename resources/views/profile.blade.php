<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
    <title>Document</title>
</head>
<style>
    .profile-card {
        width: 240px;
        align-content: center;
        text-align: start;
        margin: 50px auto;  
        padding: 30px;
        border: 1px solid #white;
        border-radius: 10px;
        background: linear-gradient(to bottom, black 43%, yellow 56%);
    }

    .profile-card h3 {
        text-align: center;
        color: white;
    }

    .profile-card img {
        margin-left: 30px;
        width: 160px;
        height: 180px;
        border-radius: 50%;
        border: 1px solid #ddd;
    }
    .profile-card div {
        margin-top: 15px;
        padding: 5px;
        background-color: #e0e0e0;
    }
</style>
<body>
    <div class="profile-card">
        <h3>Kartu Mahasiswa</h3>
        <img src="{{ asset('assets/img/febri.jpg') }}">
        <div>Nama : <?= $nama ?></div>
        <div>Kelas : <?= $kelas ?></div>
        <div>NPM : <?= $npm ?></div>
    </div>
</body>
</html>