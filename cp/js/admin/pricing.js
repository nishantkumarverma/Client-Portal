$(document).ready(function() {
getLocation();
getTimeslot();
getPricingTable();
 
});


function getTimeslot(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/timeslot/get",
      success: function(dataVal){
			var select = $('#iTimeSlot');
$('option', select).remove();
var option = new Option("Select Timeslot","none");
  select.append($(option));
$.each( dataVal, function( key, value ) {
  var txt=value.TimeSlotName+" ("+value.SlotStartTime+ "-"+value.SlotEndTime+")";
    var option = new Option(txt, value.TimeSlotID);
    select.append($(option));
});
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function getLocation(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/location/get",
      success: function(dataVal){
			var select = $('#iLocation');
$('option', select).remove();
  var option = new Option("Select Location","none");
  select.append($(option));
$.each( dataVal, function( key, value ) {
    var option = new Option(value.LocationName, value.LocationID);
    select.append($(option));
});
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function addPricing(){
var iTimeSlot = $("#iTimeSlot").val();
var iLocation= $("#iLocation").val();
var iPricePerSec= $("#iPricePerSec").val();
var iPriceDesc= $("#iPriceDesc").val();
var iMinSec= $("#iMinSec").val();
var iPriceActive= $("#iPriceActive").val();
var errorMsg="Validate your inputs\n";
if(iLocation=="" || iLocation=="none"){
alert( "Select atleast one location.");
errorMsg = errorMsg + "Select atleast one location.\n";
}
var count=0;
$('#iLocation > option:selected').each(function() {
    alert($(this).text() + ' ' + $(this).val());


if(iTimeSlot=="" || iTimeSlot=="none"){
errorMsg = errorMsg + "Select timeslot.\n";
}

if(iPricePerSec=="" || !parseFloat(iPricePerSec)){
errorMsg = errorMsg + "Price per second is not valid.\n";
}
if(iMinSec=="" || !parseInt(iMinSec)){
errorMsg = errorMsg + "Minimum second is not valid.\n";
}
if(errorMsg=="Validate your inputs\n"){
var dataList = {
	"TimeSlotID":iTimeSlot,
	"LocationID":$(this).val(),
	"PricePerSec":iPricePerSec,
	"PriceDescription":iPriceDesc,
	"PriceIsActive":iPriceActive,
	"MinimumSecRequired":iMinSec
	};
		$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL+"/pricingtable/add",
      data: dataList,
      success: function(dataVal){
			count++;
			 alert("Success","Created Successfully!");
			 $("#iTimeSlot").val("none");
$("#iLocation").val("none");
$("#iPricePerSec").val("");
$("#iPriceDesc").val("");
$("#iMinSec").val("");
getPricingTable();
		 },
		error: function(dataVal) {
		console.log(dataVal);
		alert("Error", "There is error processing your request!, Reload the page and try again");
            }
		});
}
else{
alert("Error", errorMsg);
}
});

}

function getPricingTable(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/pricingtable/getall",
      success: function(dataVal){
	  $("#pricing-table tbody").empty();
$.each( dataVal, function( key, value ) {
var yesText="No";
if(value.PriceIsActive==1){
yesText="Yes";
}
$("#pricing-table tbody").append('<tr><td>'+value.PriceID+'</td><td>'+value.TimeSlotName+'</td><td>'+value.LocationName+'</td><td>'+value.PricePerSec+'</td><td>'+value.MinimumSecRequired+'</td><td>'+yesText+'</td><td></td></tr>');
});
		$('#pricing-table').DataTable(); },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}