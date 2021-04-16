<?php

/** MySQL database name */
define( 'DB_NAME', 'siteMorabeza');
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', 'root' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );


//Criar a conexao á base de dados
$conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Connection failed");
