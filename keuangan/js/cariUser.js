$(document).ready(function () {
  // event ketika keyword diketik
  $("#keyword").on("keyup", function () {
    console.log("ok cari");
    $(".tampil").load("keuangan/cariUser?keyword=" + $("#keyword").val());
  });
});
