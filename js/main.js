"use strict";

$("document").ready(() => {
  console.log(CFG_GLPI);

  var tabla = $(".asset");
  var acumulador = "";
  var typeBefore = "";

  console.log(location.href);

  for (let index = 0; index < tabla.length; index++) {
    var element = tabla[index];

    $(element).click(function (e) {
      e.preventDefault();
      let that = this;
      let type = that.children[0].textContent;

      if (type != acumulador) {
        acumulador = type;
        $(typeBefore).removeClass("red");
        $(that).addClass("red");
        typeBefore = that;

        $("#tab_information").load(" #tab_information");
      }
    });
  }

  $("#myTable").DataTable({
    Reponsive: true,
    sirverSide: true,
    ajax: {
      url: "../inc/serverside.php",
      type: "POST",
    },
    columns: [
      ["data", "name"],
      ["data", "serial"],
    ],
  });
});
