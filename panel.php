<?php
session_start();
include ('check_login.php');
?>
<!DOCTYPE html>
<html> 
<head>
</head>
<body>
    <header>
        <h2> User: <?php echo $_SESSION['usuario']?></h2>
        <h2> ID: <?php echo $_SESSION['id_logado']?></h2>
        <h2><a href=logout.php>Sair</a></h2>
    </header>
    <div>
        <h2>Reservation List</h2>
        <?php
        include ('conexao.php');

        //Query db
        //$query = "SELECT * FROM wp_hb_app_owner";

        //Executar a query
        /* $resultado = mysqli_query ($conexao, $query) or die ("Erro no Query");
        $row = mysqli_fetch_array($resultado); */

        $sql = "SELECT id, check_in, check_out, status FROM wp_hb_accom_num_name, wp_hb_resa WHERE 
        wp_hb_accom_num_name.accom_id = wp_hb_resa.accom_id AND wp_hb_accom_num_name.owner_fk = {$_SESSION['id_logado']}";
        
        //executar a query
        $resultado = mysqli_query ($conexao, $sql) or die ("Erro na Query");

        
        

        echo "<br />";
        echo "<table border='1'>";
        echo "<tr>
            <th>ID Reserva</th> 
            <th>Check In</th>
            <th>Accomodation</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['check_in']}</td>";
                echo "<td>{$row['status']}</td>";
            echo "</tr>";
        }
        echo "</ table>";
        ?>
    </div>
</body>
</html>