
class auxliar {
  
    constructor () {
    }

    validateAll(json){
        var resultado={estado:true,texto:"<h4>Por favor de correguir los siguientes errores</h4><br/>"};
        json.forEach(dato => {
                switch(dato.typeOf){
                    case "int":
                        if(dato.valor<=0){
                            resultado.texto=resultado.texto+dato.mensaje;
                            resultado.estado=false;
                        }
                    break;
                    case "string":

                    break;

                    case "file":
                        if(dato.valor==0){
                            resultado.texto=resultado.texto+dato.mensaje;
                            resultado.estado=false;
                        }
                    break;
                    
                    case "select":
                        if(dato.valor=='-20'){
                            resultado.texto=resultado.texto+dato.mensaje;
                            resultado.estado=false;
                        }
                    break;

                    case "table":
                        if(dato.valor<=0){
                            resultado.texto=resultado.texto+dato.mensaje;
                            resultado.estado=false;
                        }
                    break;
                    case "table-Duplicado":{
                        
                    }
                }
        });

        return resultado;        
    }

    alert(mensaje,botton,eliminar){
        Swal.fire({
            html: mensaje,
            showConfirmButton: botton,
            allowOutsideClick: eliminar,

        });
    }

    cerrar(){
        Swal.close();
    }

}
