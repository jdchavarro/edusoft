$('#formulario').keypress(function(event){
  // prevent enter key action
  if (event.keyCode == 10 || event.keyCode == 13) {
      event.preventDefault();
    // still want to try and submit form when enter key pressed
      this.submit();          
  } 
});