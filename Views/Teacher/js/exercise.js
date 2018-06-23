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

var c = 1;
$("#añadirOpcionCompletar").click(function(){
  var opcion = '<div class="opcionCompletar"><div class="form-group">';
  opcion += '<input class="form-control" type="text" name="completar-p-'+c+'" placeholder="problema">';
  opcion += '</div><div class="form-group"><input class="form-control" type="text" name="completar-s-'+c+'" placeholder="solución"></div></div>';
  $("#divcompletar").append(opcion);
  c++;
});

var cResponses = $("#añadirOpcionCompletarActualizar").data("responses");
$("#añadirOpcionCompletarActualizar").click(function(){
  var opcion = '<div class="opcionCompletar"><div class="form-group">';
  opcion += '<input class="form-control" type="text" required name="completar-p-'+cResponses+'" placeholder="problema">';
  opcion += '</div><div class="form-group"><input class="form-control" type="text" required name="completar-s-'+cResponses+'" placeholder="solución"></div></div>';
  $("#divcompletar").append(opcion);
  cResponses++;
});

var m = 1;
$("#añadirOpcionMultiple").click(function(){
  var opcion = '<div class="opcion">';
  opcion += '<div class="form-group"><input class="form-control" type="text" name="multiple-d-'+m+'" placeholder="descripcion"></div>';
  opcion += '<div class="form-group"><label>Imagen para la opcion</label><input type="file" class="form-control-file" name="multiple-i-'+m+'"></div>';
  opcion += '<div class="form-group form-check"><input type="checkbox" class="form-check-input" name="multiple-s-'+m+'" value="multiple-s-'+m+'" id="multiple-s-'+m+'">';
  opcion += '<label class="form-check-label" for="multiple-s-'+m+'">Es solucion</label></div>'
  opcion += '</div>';
  $("#divmultiple").append(opcion);
  m++;
});

var mResponses = $("#añadirOpcionMultipleActualizar").data("responses");
$("#añadirOpcionMultipleActualizar").click(function(){
  var opcion = '<div class="opcion">';
  opcion += '<div class="form-group"><input class="form-control" type="text" name="multiple-d-'+mResponses+'" placeholder="descripcion"></div>';
  opcion += '<div class="form-group"><label>Imagen para la opcion</label><input type="file" class="form-control-file" name="multiple-i-'+mResponses+'"></div>';
  opcion += '<div class="form-group form-check"><input type="checkbox" class="form-check-input" name="multiple-s-'+mResponses+'" value="multiple-s-'+mResponses+'" id="multiple-s-'+mResponses+'">';
  opcion += '<label class="form-check-label" for="multiple-s-'+mResponses+'">Es solucion</label></div>'
  opcion += '</div>';
  $("#divmultiple").append(opcion);
  mResponses++;
});

var u = 1;
$("#añadirOpcionUnica").click(function(){
  var opcion = '<div class="opcion">';
  opcion += '<div class="form-group"><input class="form-control" type="text" name="unica-d-'+u+'" placeholder="descripcion"></div>';
  opcion += '<div class="form-group"><label>Imagen para la opcion</label><input type="file" class="form-control-file" name="unica-i-'+u+'"></div>';
  opcion += '<div class="form-group form-check"><input type="radio" class="form-check-input" name="unica-r" value="'+u+'" id="unica-r-'+u+'">';
  opcion += '<label class="form-check-label" for="unica-r-'+u+'">Solucion</label></div>'
  opcion += '</div>';
  $("#divunica").append(opcion);
  u++;
});

var uResponses = $("#añadirOpcionUnicaActualizar").data("responses");
$("#añadirOpcionUnicaActualizar").click(function(){
  var opcion = '<div class="opcion">';
  opcion += '<div class="form-group"><input class="form-control" type="text" name="unica-d-'+uResponses+'" placeholder="descripcion"></div>';
  opcion += '<div class="form-group"><label>Imagen para la opcion</label><input type="file" class="form-control-file" name="unica-i-'+uResponses+'"></div>';
  opcion += '<div class="form-group form-check"><input type="radio" class="form-check-input" name="unica-r" value="'+uResponses+'" id="unica-r-'+uResponses+'">';
  opcion += '<label class="form-check-label" for="unica-r-'+uResponses+'">Solucion</label></div>'
  opcion += '</div>';
  $("#divunica").append(opcion);
  u++;
});

var d = 1;
$("#añadirOpcionDesplegar").click(function(){
  var opcion = '<div class="opcion">';
  opcion += '<div class="form-group"><input class="form-control" type="text" name="desplegar-d-'+d+'" placeholder="descripcion"></div>';
  opcion += '<div class="form-group form-check"><input type="radio" class="form-check-input" name="desplegar-r" value="'+d+'" id="desplegar-r-'+d+'">';
  opcion += '<label class="form-check-label" for="desplegar-r-'+d+'">Solucion</label></div>'
  opcion += '</div>';
  $("#divdesplegar").append(opcion);
  d++;
});

var dResponses = $("#añadirOpcionDesplegarActualizar").data("responses");
$("#añadirOpcionDesplegarActualizar").click(function(){
  var opcion = '<div class="opcion">';
  opcion += '<div class="form-group"><input class="form-control" type="text" name="desplegar-d-'+dResponses+'" placeholder="descripcion"></div>';
  opcion += '<div class="form-group form-check"><input type="radio" class="form-check-input" name="desplegar-r" value="'+dResponses+'" id="desplegar-r-'+dResponses+'">';
  opcion += '<label class="form-check-label" for="desplegar-r-'+dResponses+'">Solucion</label></div>'
  opcion += '</div>';
  $("#divdesplegar").append(opcion);
  d++;
});