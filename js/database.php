<?php
    $con=mysqli_connect("localhost","cliented_admin","DswSystem20!","cliented_clientedigital");
if (isset($_GET["w1"])) {
    // asignar w1 y w2 a dos variables
    $phpVar1 = $_GET["w1"];
    $phpVar2 = $_GET["w2"];
    $phpVar3 = $_GET["w3"];
    $phpVar4 = $_GET["w4"];
    $phpVar5 = $_GET["w5"];
    $phpVar6 = $_GET["w6"];
    $phpVar7 = $_GET["w7"];
    $phpVar8 = $_GET["w8"]; 
    $phpVar9 = $_GET["w9"];
    

    //Checamos coneccion
    if($con->connect_error){
        die("Coneccion a base de datos fallida".$con->connect_error);
    }
    
        $ffecha=date("n/j/Y");   
        $hora =(integer) date("G");
        $min=(integer)date("i");
        $m=(integer)substr($phpVar4, -2, 2);
        $h=(integer)substr($phpVar4, 0, -3);
        
        
    if($hora >= $h && $ffecha===$phpVar3){
        if($min >= $m){
        echo "<script>alert('La hora seleccionada ya paso, selecciona otro horario')</script>";
        echo $con->error;
        $con->close();
        $url="http://clientedigital.com.mx/demo/bigotes.html";
        echo "<SCRIPT>window.location='$url';</SCRIPT>";
        }else{
            $sql="select * from demo where id = '$phpVar1';";
            $result=mysqli_query($con,$sql);
            $cont = $result->num_rows;
        }
    }else{
    $sql="select * from demo where id = '$phpVar1';";
    
    $result=mysqli_query($con,$sql);
    $cont = $result->num_rows;
    //echo "<script>alert('$phpVar6')</script>";
    }
    
    if($cont==0){

        if($phpVar6==="Experiencia 1" || $phpVar6==="Experiencia 2" || $phpVar6==="Experiencia 3" || $phpVar6 === "Experiencia 4"){
           
            if($phpVar4!="19:30" || $phpVar4!="19:31"){
            $minutes=substr($phpVar4, -2, 2);
            
            $hours=(integer)substr($phpVar4, 0, -3);
             
            if ($minutes==0) {
                $minutes="30";
            }
            else{
                if ($minutes==30) {
                    $minutes="00";
                    $hours=$hours+1;
                }
            }
            
            $cod ="ZonaB$phpVar3$hours:$minutes$phpVar9";
            
            $sql="select * from demo where id = '$cod';";
    
            $result=mysqli_query($con,$sql);
            $cont = $result->num_rows;
            
            //echo "<script>alert('$minutes')</script>";
            
            if($cont==0){
                //echo "<script>alert('Gracias por agendar en Zona Bigotes')</script>";
                
                $sqll="insert into demo (id, nombre, fecha, hora, empleado,servicio,telefono) values ('$phpVar1', '$phpVar2', '$phpVar3', '$phpVar4', '$phpVar9','$phpVar6 ', '$phpVar7');";
                $sqll2="insert into demo (id, nombre, fecha, hora, empleado,servicio,telefono) values ('$cod', '$phpVar2', '$phpVar3', '$hours:$minutes', '$phpVar9','$phpVar6 ', '$phpVar7');";
                
                $resultt=mysqli_query($con,$sqll);
                $resultt2=mysqli_query($con,$sqll2);
                
                 if($resultt){
                    $con->close();
        
                    echo "<script>
                    window.location.href = `https://api.whatsapp.com/send?phone=528712511128&text=
                    *_Demo_*%0A
                    *Reservas*%0A%0A
                    *NOMBRE:_*%0A
                    $phpVar2%0A
                    *FECHA DE RESERVA:_*%0A
                    $phpVar3%0A
                    *HORA DE RESERVA:_*%0A
                    $phpVar4%0A
                    *DETALLES:_*%0A
                    $phpVar5%0A
                    *SERVICIO RESERVADO ºº*%0A
                    $phpVar6
                    *ATENDERA ºº*%0A
                    $phpVar9`;
                    </script>";
                }
            }else{
                echo $con->error;
                $con->close();
                echo "<script>alert('Horario o Barbero seleccionado está ya ocupado, favor de intentar otro horario cercano u otro barbero en el mismo horario.')</script>";
                $url="http://clientedigital.com.mx/demo/bigotes.html";
                echo "<SCRIPT>window.location='$url';</SCRIPT>";
                
            }
            
            //echo "<script>alert('$cod')</script>";
        }else{
            echo "<script>alert('No suficiente tiempo para el servicio seleccionado')</script>";
            $url="http://clientedigital.com.mx/demo/bigotes.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
        }
            
            
        }else{
            
            //echo "<script>alert('Gracias por agendar en Zona Bigotes')</script>";
            $sqll="insert into demo (id, nombre, fecha, hora, empleado,servicio,telefono) values ('$phpVar1', '$phpVar2', '$phpVar3', '$phpVar4', '$phpVar9','$phpVar6 ', '$phpVar7');";
            $resultt=mysqli_query($con,$sqll);
            if($resultt){
              $con->close();
            
               echo "<script>
                window.location.href = `https://api.whatsapp.com/send?phone=528712511128&text=
              *_Demo_*%0A
              *Reservas*%0A%0A
              *NOMBRE:_*%0A
              $phpVar2%0A
              *FECHA DE RESERVA:_*%0A
              $phpVar3%0A
              *HORA DE RESERVA:_*%0A
              $phpVar4%0A
              *DETALLES:_*%0A
              $phpVar5%0A
              *SERVICIO RESERVADO ºº*%0A
              $phpVar6
              *ATENDERA ºº*%0A
              $phpVar9`;
        

                </script>";
            }
        }
    }else{
        echo $con->error;
        $con->close();
        echo "<script>alert('Horario o Barbero seleccionado está ya ocupado, favor de intentar otro horario cercano u otro barbero en el mismo horario.')</script>";
        $url="http://clientedigital.com.mx/demo/bigotes.html";
        echo "<SCRIPT>window.location='$url';</SCRIPT>";
    }
} else {
    echo "<p>No parameters</p>";
}
?>