$("#menu-ejercicios").removeClass("btn-info");
$("#menu-ejercicios").addClass("btn-outline-info");

$("#tiposEjercicio").change(function(){
  var tipos = ["completar", "multiple", "unica", "desplegar"];
  var opcion = $("#tiposEjercicio option:selected").val();
  tipos.forEach(function(tipo){
    if (opcion == tipo){
      $("#div"+tipo).removeClass("oculto");
    } else {
      $("#div"+tipo).addClass("oculto");
    }
  });
});

var n = 1;
$("#añadirOpcionCompletar").click(function(){
  var opcion = '<div class="opcionCompletar"><div class="form-group">';
  opcion += '<input class="form-control" type="text" required name="completar-p-'+n+'" placeholder="problema">';
  opcion += '</div><div class="form-group"><input class="form-control" type="text" required name="completar-s-'+n+'" placeholder="solución"></div></div>';
  $("#divcompletar").append(opcion);
  n++;
});

nResponses = $("#añadirOpcionCompletarActualizar").data("responses");
$("#añadirOpcionCompletarActualizar").click(function(){
  var opcion = '<div class="opcionCompletar"><div class="form-group">';
  opcion += '<input class="form-control" type="text" required name="completar-p-'+nResponses+'" placeholder="problema">';
  opcion += '</div><div class="form-group"><input class="form-control" type="text" required name="completar-s-'+nResponses+'" placeholder="solución"></div></div>';
  $("#divcompletar").append(opcion);
  nResponses++;
});