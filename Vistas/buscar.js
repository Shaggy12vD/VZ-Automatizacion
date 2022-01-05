function patronear() {
  document.getElementById("encontrados").innerHTML = 0;
  inputPatron.value = "";
  var cadenaBusca = document.getElementById("cadBusca").value;
  var palabraCompleta = document.getElementById("palabraCompleta").checked;
  if (cadenaBusca != "") {
      //escapa caracteres reservados de expresiones regulares
      cadenaBusca = cadenaBusca.replace(/([\$\(\)\*\+\.\[\]\?\\\/\^\{\}\|])/g, "\\$1");
      //elimina espacios al inicio o final
      cadenaBusca = cadenaBusca.replace(/^\s+|\s+$/g, "");
      //suprime las preposiciones, artículos y otras palabras intermedias, es 
      //decir rodeadas de un espacio por ambos lados.
      var patron = new RegExp("\\b(?:" + particulas + ")\\b", "gi");
      cadenaBusca = cadenaBusca.replace(patron, " ");
      //Convierte más de un espacio en uno
      cadenaBusca = cadenaBusca.replace(/\s+/g, " ");        
      //Quita los espacios iniciales y finales por haber partículas ahí
      cadenaBusca = cadenaBusca.replace(/^\s+|\s+$/g, "");
      if ((cadenaBusca == "") || (cadenaBusca == " ")){
          inputPatron.value = "";
      } else {
          //reemplaza los espacios intermedios por la alternativa | o conjuntiva .*? 
          //pero diferenciando si buscamos en palabra completa o no
          var conj = "\|";
          if (document.getElementById("conjuntiva").checked) {
              conj = ".*?";
          }
          if (palabraCompleta){
              cadenaBusca = cadenaBusca.replace(/\s+/g, "\\b" + conj + "\\b");
              cadenaBusca = "\(?:\\b" + cadenaBusca + "\\b\)";
          } else {
              cadenaBusca = cadenaBusca.replace(/\s+/g, conj);
              cadenaBusca = "\(?:" + cadenaBusca + "\)";
          }
          inputPatron.value = cadenaBusca;
          var opciones = "";
          var difMayusMinus = document.getElementById("caseMM").checked;
          if (!difMayusMinus) {
              opciones = opciones + "i";
          }
          inputOpcionesFlags.value = opciones;
      }
  }    
}

function buscar() {
  document.getElementById("encontrados").innerHTML = 0;
  var divResultados = document.getElementById("resultados");
  divResultados.innerHTML = "";
  var cadBusca = inputPatron.value;
  var opciones = inputOpcionesFlags.value;
  var maxBusca = 1 * document.getElementById("maxBusca").value;
  var maxResulta = 1 * document.getElementById("maxResulta").value;
  var maxResultaBase =  maxResulta;
  var item = 0;
  if (cadBusca != "") { 
      var patron = new RegExp(cadBusca, opciones);
      document.getElementById("iterTotal").innerHTML = hasta;
      if (maxBusca < hasta) {
          hasta = maxBusca;
      }
      for (var i=0; i<hasta; i++) {
          var cadena = getInnerText(vinculos[i]);
          var resultado = cadena.match(patron) ;
          if (resultado != null) {
              item++;
              if (item <= maxResulta) {
                  divResultados.innerHTML += ' [' + item +
                  '] <a href="' + vinculos[i].href + '">' +
                  vinculos[i].innerHTML + '</a><br />';
              } else {
                  var men = "";
                  if (maxResulta == maxResultaBase) {
                      men = " primeros ";
                  } else {
                      men = " siguientes ";
                  }
                  document.getElementById("encontrados").innerHTML = item;
                  var mensaje = window.confirm("Se muestran los" + men + maxResultaBase + 
                          " resultados. ¿Continuar buscando?");
                  if (mensaje) {
                      maxResulta += maxResultaBase;
                  } else {
                      break;
                  }
              }
          }
      }
  }
  document.getElementById("encontrados").innerHTML = item;
} 