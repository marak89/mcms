$(document).ready(function() {

$("#allegrocontent div.hide").hide(); // Initially hide all content

$("#allegrotabs li:first").attr("id","current"); // Activate first tab

$("#allegrocontent div.hide:first").fadeIn(); // Show first tab content

$('#allegrotabs a').click(function(e) {

e.preventDefault();

$("#allegrocontent div.hide").hide(); //Hide all content

$("#allegrotabs li").attr("id",""); //Reset id's

$(this).parent().attr("id","current"); // Activate this

$('#' + $(this).attr('title')).fadeIn(); // Show content for current tab

});

})();
