$(function() {
 $( "#menu-maquinas2>li.primero" ).click(function() {  
    $( "ul.ul-rack-snow").hide("slow");
    $( "ul.ul-rack-multiple").hide("slow");
    $( "ul.ul-rack-ski").hide("slow");
    $( "#menu-maquinas2>ul.ul-primero" ).slideDown( "slow");

 });

  $( "#rack-snow" ).click(function() { 
    $( "#menu-maquinas2>ul.ul-primero" ).hide("slow");
    $( "ul.ul-rack-multiple").hide("slow");
    $( "ul.ul-rack-ski").hide("slow");
    $( "ul.ul-rack-snow").slideDown("slow");
 });

   $( "#rack-multiple" ).click(function() { 
    $( "#menu-maquinas2>ul.ul-primero" ).hide("slow");
    $( "ul.ul-rack-snow").hide("slow");
    $( "ul.ul-rack-ski").hide("slow");
    $( "ul.ul-rack-multiple").slideDown("slow");
 });

  $( "#rack-ski" ).click(function() { 
    $( "#menu-maquinas2>ul.ul-primero" ).hide("slow");
    $( "ul.ul-rack-snow").hide("slow");
    $( "ul.ul-rack-multiple").hide("slow");
    $( "ul.ul-rack-ski").slideDown("slow");
 });
}); 