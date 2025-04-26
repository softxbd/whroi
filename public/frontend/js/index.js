// Get the current year
const currentYear = new Date().getFullYear();
// Set the current year in the span with id "year"
document.getElementById("getYear").textContent = currentYear;

// jqueary
$(document).ready(function () {
  // Get the modal
  $("#menu").click(function () {
    $("#showmenu").slideToggle("slow", function () {
      $("#menu").hide();
    });
  });

  $("#menuClose").click(function () {
    $("#showmenu").slideToggle("slow", function () {
      $("#menu").show();
    });
  });
});
