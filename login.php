<?php
session_start();

include ('conexao.php');

//Se os campos estiverem do form estiverem vazios volta ao login!
if (empty($_POST['usuario']) || empty($_POST['senha'])) {
  header ('Location: index.php');
  exit ();
}

//Pegar o usuário e senha que o vem do _POST (o que o usuário digita!)
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

/*Query para pegar os usuários que fazem login*/
$query = "SELECT * FROM wp_hb_app_owner WHERE owner_name = '{$usuario}' and owner_password = md5('{$senha}')";

//Executar a query
$result = mysqli_query($conexao, $query) or die ("Failed!");

//Qtd de linhas retornada pela query
//1 se for executado
//0 se nao for executado
$row = mysqli_num_rows($result);

//pegar o Id do usuário logado
$row_id = mysqli_fetch_assoc($result);
$_SESSION['id_logado'] = $row_id['id_owner'];

//testar se estava pegando o id_owner
//echo $_SESSION['id_logado'];


if ($row == 1) {
  $_SESSION['usuario'] = $usuario;
  header ('Location: panel.php');
  exit();
}else {
  //criar sessão qd o usuario não está autenticado
  $_SESSION['nao_autenticado'] = true;
  header ('Location:index.php');
  exit ();
}

//echo $row; exit;



