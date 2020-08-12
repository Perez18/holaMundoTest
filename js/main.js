"use strict";

$("document").ready(() => {
  console.log("Jquery Cargado");

  var tabla = $(".asset");
  var acumulador = "";
  var typeBefore = "";

  console.log(tabla);

  for (let index = 0; index < tabla.length; index++) {
    var element = tabla[index];

    console.log(acumulador);
    $(element).click(function (e) {
      e.preventDefault();
      let that = this;
      let type = that.children[0].textContent;

      if (type != acumulador) {
        acumulador = type;
        $(typeBefore).removeClass("red");
        $(that).addClass("red");
        typeBefore = that;

        console.log(typeBefore);
      } 
    });
  }
});
