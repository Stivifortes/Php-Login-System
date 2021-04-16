<?php
session_start ();

//Se não existir sessão(não logado) volta para index.php
if (!$_SESSION['usuario']) {
    header ('Location: index.php');
    exit ();
}