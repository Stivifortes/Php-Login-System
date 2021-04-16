<?php
session_start();

//session_destroy(); Terminar todas as sessões existentes
//Destruir a sessão do usuário logado
unset($_SESSION['usuario']);
header ('Location: index.php');
exit ();