var global_desti="";
function load_user_only(){
$.ajax({method: "GET",
          url: "load_user_only.json.php?codigo=" + global_desti,
     dataType: 'text'}).done(function( responseText ) {
         var json = JSON.parse(responseText);
         var html="<table class='table-user-only'>";
         for (var i=0; i<json.length; i++) {
           html+="<tr><td><img src='img/img.png' class='rounded-circle'></td></tr>";
           html +="<tr><td class='name-user-only'>"+ json[i].username + "</td></tr>";
           html +="<tr><td><hr></td></tr>";
           html +="<tr><td><span>Nombre : <span>"+json[i].nombres + "</td></tr>";
           html +="<tr><td><span>Apellido : </span>"+json[i].apellidos + "</td></tr>";
         }
         html +="</table>";
           $(".content-user-only").html(html);
 });
}

function load_message(){

 var users = {
   "remitente": "<?php echo $_SESSION['user']; ?>",
   "destinatario": global_desti
   };

$('.user-title').html(global_desti);
 $.ajax({method: "POST",
            url: "load_message.php",
           data: JSON.stringify(users),
       dataType: 'text'}).done(function(responseText){
         //alert(responseText);
       var json = JSON.parse(responseText);
         var html="<table class='table-message'>";
         for (var i=0; i<json.length; i++) {
           switch (json[i].destinatario) {
             case "<?php echo $_SESSION['user'] ?>":
                   html +="<tr><td class='remitente-table'>"+ json[i].mensaje + "-<span>"+json[i].fecha + "</span></td></tr>";
               break;
             case global_desti:
                   html +="<tr><td  class='destinatario-table'>"+ json[i].mensaje + "-<span>"+json[i].fecha + "</span></td></tr>";
               break;
             default:
           }
         }
          html+="</table>";
           $(".content-message").html(html);
   });
 }

function load_contents(user_destinatario){
global_desti=user_destinatario;
load_message();
load_user_only();
}

function load_users(){

$.ajax({method: "GET",
          url: "load_user.json.php",
     dataType: 'text'}).done(function( responseText ) {
          var json = JSON.parse(responseText);
           var html="<table  class='table-user'>";
           for (var i=0; i<json.length; i++) {
               html += "<tr onclick='load_contents(\"" + json[i].username + "\")'><td>" + json[i].username + "</td></tr>";
           }
           html +="</table>";
           $(".content-users").html(html);
});
}

$("#button_cerrar_sessi").click(function() {
   $.post("session_destroy.php", function(resul){
     window.location.href="index.html"
  });
});
$("#send_message").click(function() {
   if($("#text-message").val()!='' && global_desti!=""){
     var mensaje = {
       "remitente": "<?php echo $_SESSION['user'] ?>",
       "destinatario": global_desti,
       "mensaje" :$("#text-message").val()
       };
     $.ajax({method: "POST",
                url: "write_message.json.php",
               data: JSON.stringify(mensaje),
           dataType: 'text'}).done(function(result) {

               load_message();
       });

   }
     $("#text-message").val('');
 });
$( document ).ready(function() {
load_users();
});
