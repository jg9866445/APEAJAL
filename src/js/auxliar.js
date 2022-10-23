
class auxliar {
  constructor () { 
    console.log("Clase creada correctamente");
  }
    static validateAll(json){
        var validacion="Totdo";
        
        console.log(JSON.stringify(json));
        return validacion;
    }

    static alert(mensaje,botton,eliminar){
        Swal.fire({
            html: mensaje,
            showConfirmButton: botton,
            allowOutsideClick: eliminar,
            onRender: function() {
                $('.swal2-content').prepend(sweet_loader);
            }
        });
    }
}
