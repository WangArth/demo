document.querySelector("#submit").addEventListener("click", e => {
    e.preventDefault();
   
    let negocio = "Demo";
    let cliente = document.querySelector("#nombre").value;
    let fecha = document.querySelector("#fecha").value;
    let hora = document.querySelector("#hora").value;
    let detalles = document.querySelector("#detalles").value;
    let personal = document.querySelector("#personal").value;
    let servicio = document.querySelector("#servicio").value;
    let what = document.querySelector("#telefono").value;
    let resp = document.querySelector("#respuesta");
    

   //alert (what)


    if (what === "" || cliente === "" || fecha === "" || hora === "" || personal === "Personal" || servicio === "Servicio" || servicio === "-" || servicio === ""){
    
   alert ("Ingresa todos los datos")
}
else
{
    if(servicio==="Experiencia 1" || servicio==="Experiencia Bigotes 2" || servicio==="Experiencia 3" || servicio === "Experiencia 4"){
   
    var fech;
    fechh = new Date(fecha);
    var diaa=fechh.getDay();
   
   if(diaa === 0 && hora === "14:30"){
       alert("No suficiente tiempo para el servicio seleccionado");
   }else if(diaa === 6 && hora === "18:30"){
       alert("No suficiente tiempo para el servicio seleccionado");
   }else if(diaa !== 6 && diaa !== 0 && hora === "19:30"){
       alert("No suficiente tiempo para el servicio seleccionado");
   }else{
       window.location.href = './js/database.php' + "?w1=" + negocio + fecha + hora + personal + "&w2=" + cliente+ "&w3=" + fecha+ "&w4=" + hora+ "&w5=" + detalles+ "&w6=" + servicio + "&w7=" + what + "&w8=" + resp + "&w9=" + personal;
   }
   
   
   // 
    
        
    }else{
        window.location.href = './js/database.php' + "?w1=" + negocio + fecha + hora + personal + "&w2=" + cliente+ "&w3=" + fecha+ "&w4=" + hora+ "&w5=" + detalles+ "&w6=" + servicio + "&w7=" + what + "&w8=" + resp + "&w9=" + personal;
    }
}



  });

  