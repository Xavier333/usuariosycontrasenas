// levanto el a del link de whatssap 

var a_msj_wsp = document.getElementById('WSP')
function mensaje_wsp(){
  $tel = "+5491139121278";
  var nombre = document.getElementById("name")
  var mail = document.getElementById("exampleInputEmail1")
  //var motivo = document.getElementById("exampleInputPassword1")
  var mensaje = document.getElementById("contenido")

  //console.log(nombre.value)

  var mensaje_final
  mensaje_final ="Nombre%20:%20" + nombre.value +",%20"
  mensaje_final = mensaje_final + "%20/%20Email%20:%20" + mail.value
  //mensaje_final = mensaje_final + ",%20El%20Motivo%20de%20mi%20contacto%20es%20" + motivo.value + ",%20"
  mensaje_final = mensaje_final + "%20/%20Mensaje%20:%20" + mensaje.value
  var mensaje = "https://api.whatsapp.com/send?phone="+$tel+"&text="+mensaje_final 
  //Esto%20es%20una%20prueba
  a_msj_wsp.href = mensaje  
}

a_msj_wsp.addEventListener('click', mensaje_wsp)