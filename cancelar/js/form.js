document.querySelector("#submit").addEventListener("click", e => {
    e.preventDefault();
   
    let negocio = "Demo";
    //let cliente = document.querySelector("#nombre").value;
    let fecha = document.querySelector("#fecha").value;
    let hora = document.querySelector("#hora").value;
    //let detalles = document.querySelector("#detalles").value;
    let personal = document.querySelector("#personal").value;
    let servicio = document.querySelector("#servicio").value;
    //let what = document.querySelector("#telefono").value;
    let resp = document.querySelector("#respuesta");
  
  
    if (fecha === "" || hora === "" || personal === "Personal" || servicio === "Servicio" || servicio === "-"){
    
   alert ("Ingresa todos los datos")
}
else
{
    window.location.href = './js/database.php' + "?w1=" + negocio + fecha + hora + personal + "&w3=" + fecha + "&w4=" + hora + "&w9=" + personal + "&w6="+ servicio;
}

  });

  