$(document).ready(function(){
$("#verdisponibilidad").click(function(){
        $.ajax({
                data:  $("#form1").serialize(),
                url:   'verdisponibilidad.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#mainform").html(response);
                }
        });

//}
return false;
});

$("#reservar").click(function(){
        $.ajax({
                data:  $("#form_reservar").serialize(),
                url:   'reservar.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });

//}
return false;
});

$("#nueva_reserva").click(function(){
        $.ajax({
                data:  "",
                url:   'form_index.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#mainform").html(response);
                }
        });

//}
return false;
});

});