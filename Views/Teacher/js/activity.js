$("#type").change(function(){
  var opcion = $("#type option:selected").val();
  if (opcion == "examen") {
    $("#groupStudents").addClass("oculto");
  } else {
    $("#groupStudents").removeClass("oculto");
  }
});