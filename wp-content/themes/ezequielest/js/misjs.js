jQuery(function ($) {
 $( "#secabotas" ).click(function() {  
    $( "ul.ul-rack-snow").hide("slow");
    $( "ul.ul-rack-multiple").hide("slow");
    $( "ul.ul-rack-ski").hide("slow");
    $( "ul.ul-primero" ).slideDown( "slow");

 });

  $( "#rack-snow" ).click(function() { 
    $( "ul.ul-primero" ).hide("slow");
    $( "ul.ul-rack-multiple").hide("slow");
    $( "ul.ul-rack-ski").hide("slow");
    $( "ul.ul-rack-snow").slideDown("slow");
 });

   $( "#rack-multiple" ).click(function() { 
    $( "ul.ul-primero" ).hide("slow");
    $( "ul.ul-rack-snow").hide("slow");
    $( "ul.ul-rack-ski").hide("slow");
    $( "ul.ul-rack-multiple").slideDown("slow");
 });

  $( "#rack-ski" ).click(function() { 
    $( "ul.ul-primero" ).hide("slow");
    $( "ul.ul-rack-snow").hide("slow");
    $( "ul.ul-rack-multiple").hide("slow");
    $( "ul.ul-rack-ski").slideDown("slow");
 });

  $("#flipbook").turn({
		width: 1100,
		height: 780,
		autoCenter: true
  });
});