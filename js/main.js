function cargarContent_object(id){
  var objects="";
  switch (id) {
    case '1':
       objects+="<div class='form-group'>";
       objects+="<label for='message-text' class='col-form-label'>* Username:</label>";
       objects+="<input type='text' class='form-control' id='username-register'>";
       objects+="<label for='message-text' class='col-form-label'>Nombres:</label>";
       objects+="<input type='text' class='form-control' id='nombre-register'>";
       objects+="<label for='message-text' class='col-form-label'>Apellidos:</label>";
       objects+="<input type='text' class='form-control' id='apellidos-register'>";
       objects+="<label for='message-text' class='col-form-label'> * Password:</label>";
       objects+="<input type='Password' class='form-control' id='password-register'>";
       objects+="<label for='recipient-name' class='col-form-label'>* Confirm Password:</label>"
       objects+="<input type='Password' class='form-control' id='password-C'>";
       objects+="</div>";

      break;
    case '2':
        objects+="<div class='form-group'>";
        objects+="<label for='recipient-name' class='col-form-label'>Username:</label>"
        objects+="<input type='text' class='form-control' id='username'>";
        objects+="<label for='recipient-name' class='col-form-label'>Password:</label>"
        objects+="<input type='Password' class='form-control' id='password'>";

        objects+="</div>";
      break;
    default:
       alert("no existe esa opcion")
  }
  return objects;
}

function cargar_title(id) {
  var title="";
  if(id==1){
      title="Regisrtarse";
  }else {
      title="Iniciar Session";
  }
  return title;
}
function verificar_campos(datos){
 for(var i=0;i<datos.length;i++){
     if($('#'+datos[i]).val()===''){
         return false;
     }
 }
 return true;
}
function register_(){
var datos=['username-register','password-register','password-C'];
var result=verificar_campos(datos);
if(result){
  if($("#password-register").val()==$("#password-C").val()){
    var usuario = {
      "username": $("#username-register").val(),
      "nombre": $("#nombre-register").val(),
      "apellidos": $("#apellidos-register").val(),
      "password": $("#password-register").val()
      };
      $.ajax({method: "POST",
                 url: "register.json.php",
                data: JSON.stringify(usuario),
            dataType: 'json'}).done(function( responseText ) {
              if(responseText.result == "TRUE") {
                $.post("session.php", {suggest: $("#username-register").val()}, function(result){
                 //  alert(result);
                    window.location.href="chat_on.php";
                 });

              }else{
                    $("#alert-error-login").css("display","block").empty().text(responseText.result);
              }
      });
   }else{
          $("#alert-error-login").css("display","block").empty().text("Los passwords no coinciden");
   }
}else{
        $("#alert-error-login").css("display","block").empty().text("Ingrese todos los campos obligatorios");
}


}
function check_login(){
var datos=['username','password'];
var result=verificar_campos(datos);
if(result){
  var login = {
    "username": $("#username").val(),
    "password": $("#password").val()
    };
    $.ajax({method: "POST",
               url: "login.json.php",
              data: JSON.stringify(login),
          dataType: 'json'}).done(function(responseText){
         if(responseText.result == "TRUE") {
           $.post("session.php", {suggest: $("#username").val()}, function(result){
               window.location.href="chat_on.php";
            });
         }else{
               $("#alert-error-login").css("display","block").empty().text(responseText.result);
         }
    });
}else{
       $("#alert-error-login").css("display","block").empty().text("Llene todos los campos");
}
}

$("#login-and-regist").click(function() {
     var title=$("#modalTitle").text();
     switch (title) {
       case 'Regisrtarse':
             register_();
         break;
       case 'Iniciar Session':
             check_login();
         break;
       default:
     }

   });


$(".modal-buttom").click(function() {

   var button =$(this).attr("id");
   var object=cargarContent_object(button);
   var title=cargar_title(button);
   $("#modalTitle").text(title);
   $(".modal-body-content").empty().append(object);
   $("#alert-error-login").css("display","none").empty();
   $("#exampleModal").modal("show");

});
