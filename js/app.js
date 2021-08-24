var ajaxPeliculas = function(accion,url,formulario){
    var datos=$('#'+formulario).serializeArray();
    datos.push({name:'accion', value:accion});
    $.ajax({
        url:url,
        data:datos,
        type:"POST",
        datatype:"JSON",
        success:function(response){
            if(response.peliculas != null){
                $.each(response.peliculas, function(index,peliculas){
                    $('#tablaPeliculas tbody').append(
                        "<tr><td>"+peliculas.id+"</td>"+
                        "</tr>"
                    );
                });
            }
        }
    });
}