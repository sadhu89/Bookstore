
function validaNumero(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
        return true;

    return /\d/.test(String.fromCharCode(keynum));
}
function actualiza(e, index, id) {
    if (validaNumero(e)) {
        var cantidad = document.getElementById('precio' + index).value
        var precio = document.getElementById('precioProd' + index).innerHTML
        precio = precio.substring(3)
        var precioxLibro = cantidad * parseFloat(precio)
        
        realizaProceso(id,cantidad)

        document.getElementById('totalProd' + index).innerHTML = 'S/. ' + precioxLibro.toFixed(2)
        precioTotal()
    }

}
function precioTotal() {
    var precios = document.getElementsByName('totalProd')
    var total = 0.0
    for (var i = 1; i <= precios.length; i++) {
        var valuetd = document.getElementById('totalProd' + i).innerHTML
        valuetd = valuetd.substr(3)
        total += parseFloat(valuetd)
    }
    document.getElementById('total').innerHTML = 'S/. ' + total.toFixed(2)

}
function realizaProceso(id,cant) {
    var parametros = {
        "id": id,
        "cant": cant
    };
    $.ajax({
        data: parametros,
        url: 'carrito/actualizarElemento',
        type: 'post',
        beforeSend: function() {
            
        },
        success: function(response) {
            
        }
    });

}
function agregarCarrito(id){
    var parametros = {
        "id": id,
        "qty": 1
    };
    $.ajax({
        data: parametros,
        url: 'carrito/agregar',
        type: 'post',
        beforeSend: function() {
            
        },
        success: function() {
        bootbox.dialog({
        message: "Libro agregado al carrito",
        title: "MENSAJE EXITO",
        buttons: {
            success: {
                label: "Ok!",
                className: "btn-success"
            }
        }
    });
        }
    });
}

//1 es paypal
//2 es recoger
function compra(){
    val = $("#tipoPago").prop('checked');
    url = ""
    if(val == true){
        url = "http://localhost/codeigniter/compra";
        
    }else{
        url = "http://localhost/codeigniter/carrito/pedido";
    }
    $(location).attr('href',url)
}

function enviar_formulario(){
    
}
