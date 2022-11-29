<?php

include("Conexao.php");

$username = $_SESSION['usuarioLogado'];
$query = mysqli_query($con, "SELECT * FROM usuarios WHERE username = '$username'");
$r = mysqli_fetch_array($query);
$usuarioLogado = $r['username'];
$username = $usuarioLogado;

$createfavQuery = mysqli_query($con, "INSERT INTO playlists (nome, autor) VALUES ('favoritas', '$username')");

header("Location: ../View/favoritas.php");
?>