<?php
    $con=mysqli_connect("localhost","cliented_admin","DswSystem20!","cliented_clientedigital");
if (isset($_GET["w1"])) {
    // asignar w1 y w2 a dos variables
    $phpVar1 = $_GET["w1"];
    $phpVar3 = $_GET["w3"];
    $phpVar4 = $_GET["w4"];
    $phpVar9 = $_GET["w9"];
    $phpVar6 = $_GET["w6"];
    

     //KDfKJVb7]eqyx@o^
    //Checamos coneccion
    if($con->connect_error){
        die("Coneccion a base de datos fallida".$con->connect_error);
    }
    
    $sql="select * from demo where id = '$phpVar1' and servicio = '$phpVar6';";
    $result=mysqli_query($con,$sql);
    $cont = $result->num_rows;
    
    
    if($cont>0){

        if($phpVar6==="Experiencia 1" || $phpVar6==="Experiencia 2" || $phpVar6==="Experiencia 3" || $phpVar6 === "Experiencia 4"){
           
            if($phpVar4!=="19:30" || $phpVar4!=="19:31"){
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
            //echo "<script>alert('$cod')</script>";
            $sql="select * from demo where id = '$cod';";
    
            $result=mysqli_query($con,$sql);
            $cont = $result->num_rows;
            
                if($cont>0){
                    $sqll="delete from demo where id = '$phpVar1';";
                    $sqll2="delete from demo where id = '$cod';";
                    $resultt=mysqli_query($con,$sqll);
                    $resultt2=mysqli_query($con,$sqll2);
                    
                    if($resultt){
                        $con->close();
        
                        echo "<script>
                        window.location.href = `https://api.whatsapp.com/send?phone=528718357670&text=
                        *_Demo_*%0A
                        *CANCELACION*%0A%0A
                        *FECHA QUE CANCELA:_*%0A
                        $phpVar3%0A
                        *HORA QUE CANCELA:_*%0A
                        $phpVar4%0A
                        *ATENDERA ºº*%0A
                        $phpVar9`;
                        </script>";
                }
            }else{
                echo $con->error;
                $con->close();
                echo "<script>alert('Experiencia no agendada')</script>";
                $url="https://clientedigital.com.mx/demo/cancelar/bigotes_cancelar.html";
                echo "<SCRIPT>window.location='$url';</SCRIPT>";
            }
            }else{
            echo "<script>alert('No agendado aun')</script>";
            $url="http://clientedigital.com.mx/demo/bigotes.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
        }
        
        }else{
            $sqll="delete from demo where id = '$phpVar1';";
            $resultt=mysqli_query($con,$sqll);
            if($resultt){
                $con->close();
        
                echo "<script>
                window.location.href = `https://api.whatsapp.com/send?phone=528718357670&text=
                *_Demo_*%0A
                *CANCELACION*%0A%0A
                *FECHA QUE CANCELA:_*%0A
                $phpVar3%0A
                *HORA QUE CANCELA:_*%0A
                $phpVar4%0A
                *ATENDERA ºº*%0A
                $phpVar9`;
                </script>";
            }
        }
    }else{
        echo $con->error;
        $con->close();
        echo "<script>alert('Cita no agendada aún')</script>";
        $url="http://clientedigital.com.mx/demo/cancelar/bigotes_cancelar.html";
        echo "<SCRIPT>window.location='$url';</SCRIPT>";
    }
}else {
    echo "<p>No parameters</p>";
}

?>