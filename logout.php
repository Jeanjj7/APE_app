<?php
// logout.php
session_start();
session_destroy();
header("Location: btn-voltar?erro2=sim");
?>