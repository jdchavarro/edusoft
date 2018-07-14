$("#opcion_de_busqueda").change(function(){
  var opcion = $("#opcion_de_busqueda option:selected").val();
  if (opcion == "student") {
    $("#estudiante").removeClass("oculto");
    $("#actividad").addClass("oculto");
  } else {
    $("#estudiante").addClass("oculto");
    $("#actividad").removeClass("oculto");
  }
});

$("#selectActividad").change(function(){
  var opcion = $("#selectActividad option:selected").val();
  if (opcion != "") {
    $.get("http://localhost/webalanta/edusoft/Teacher/informeActividad/"+opcion,
    function(data){
      var html = '<table class="table table-striped"><thead><tr class="table-primary">';
      html += "<td>Estudiante</td><td>Nota</td><td>Opciones</td>";
      html += "</tr></thead>";
      html += '<tbody>';
      html += data;
      html += '</tbody></table>';
      $("#tablaActividad").html(html);
    });
  }
});

$("#selectEstudiante").change(function(){
  var opcion = $("#selectEstudiante option:selected").val();
  if (opcion != "") {
    $.get("http://localhost/webalanta/edusoft/Teacher/informeEstudiante/"+opcion,
    function(data){
      var html = '<table class="table table-striped"><thead><tr class="table-primary">';
      html += "<td>Actividad</td><td>Nota</td><td>Opciones</td>";
      html += "</tr></thead>";
      html += '<tbody>';
      html += data;
      html += '</tbody></table>';
      $("#tablaEstudiante").html(html);
    });
  }
});