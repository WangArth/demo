<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="libro diario, bootstrap,html,portjournal">
        <meta name="description" content="PortJournal, la herramienta ideal de contabilidad">
        <title>Columnas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    
    </head>
    <body>
         <?php
          $con=mysqli_connect("localhost","cliented_admin","DswSystem20!","cliented_clientedigital");

        if($con->connect_error){
            die("Coneccion a base de datos fallida".$con->connect_error);
        }


        $Emal = $_GET['w1'];
        $sql="select hora, nombre, fecha, empleado,telefono,servicio from zb where fecha = '$Emal' order by hora;";

        $result=$con->query($sql);
         
            if($result->num_rows > 0){
        ?>
         <div class="container">
            <form id="frmPeliculas" method="post">               
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <h2 class="panel-title">Citas</h2>
                            
                    </div>
                    <div class="panel-body">
                            <table id="tablaPeliculas"class="table table-striped table-dark">
                                <thead>
                                    <tr scope="row">
                                        <th>Hora</th>
                                        <th>Cliente</th>
                                        <th>Servicio</th>
                                        <th>Empleado</th>
                                        <th>Telefono</th>
                                        <th>Fecha</th>                                
                                        
                                    </tr>
                                </thead>
                                <tbody>     
                                
                                <?php
                        while($row = $result->fetch_assoc()){
                            $data=[
                                'hora'=>$row["hora"],
                                'nombre'=>$row["nombre"],
                                'servicio'=>$row["servicio"],
                                'empleado'=>$row["empleado"],
                                'telefono'=>$row["telefono"],
                                'fecha'=>$row["fecha"]
                               
                            ];
                            
                            $data=serialize($data);
                            $data=base64_encode($data);
                            $data=urlencode($data);
                            
                           echo"<tr>";
                           echo"<td>".$row["hora"]."</td>";
                           echo"<td>".$row["nombre"]."</td>";
                           echo"<td>".$row["servicio"]."</td>";
                           echo"<td>".$row["empleado"]."</td>";
                           echo"<td>".$row["telefono"]."</td>";
                            echo"<td>".$row["fecha"]."</td>";
                          
                            
                           
                        ?> 
                        </tbody>
                            
                        
                        
                        <?php
                            echo"</tr>";
                        }//while
                        
                   
                    ?>
                    </table>
                    <?php
            //final if
                $con->close();
            }

        ?>
        <input type="label" name="correo" readonly="readonly" value=<?php echo $Emal;?>>
                    </div>
                </div>
        <hr>
        <br>

    </body>
</html>