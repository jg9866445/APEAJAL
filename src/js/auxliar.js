
class auxliar {
  
    constructor () {
        console.log('HOLA'); 
    }

    validateAll(json){
        //Datos de valicacion
        //{"valor":"0","typeOf":"Entero","mensaje":"Error"}
        json.forEach(function(dato) {
            if(dato.valor.length()>0){                
                switch(dato.typeOf){
                    case "":

                    break;
                    case "":

                    break;
                    case "":

                    break;
                    case "":

                    break;
                    case "":

                    break;
                }}
            console.log(numero);
        })
        return "Totdo";
    }

    alert(mensaje,botton,eliminar){
        Swal.fire({
            html: mensaje,
            showConfirmButton: botton,
            allowOutsideClick: eliminar,
            onRender: function() {
                $('.swal2-content').prepend(sweet_loader);
            }
        });
    }

    cerrar(){
        Swal.close();
    }

}
