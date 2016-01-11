$(document).ready(function() {
getBooking();
$('#booking-table').DataTable();
    
});

function getBooking(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/booking/getbycustomer/"+userJson.CustomerID,
      success: function(dataVal){
	  console.log(dataVal);
			  $("#booking-table tbody").empty();
$.each( dataVal, function( key, value ) {
var yesText="No";
if(value.IsApproved==1){
yesText="Yes";
}
var isPaid="No"
if(value.IsPaid==1){
isPaid="Yes";
}
var days="";
if(value.IsAllowedSunday){
days="Sunday";
}
if(value.IsAllowedSaturday){
days=days + "," + "Saturday";
}
if(value.IsAllowedMonday){
days=days + "," +"<br>Monday";
}
if(value.IsAllowedTuesday){
days=days + "," +"Tuesday";
}
if(value.IsAllowedWednesday){
days=days + "," +"<Br>Wednesday";
}
if(value.IsAllowedThursday){
days=days + "," +"Thursday";
}
if(value.IsAllowedFriday){
days=days + "," +"<br>Friday";
}
$("#booking-table tbody").append('<tr><td>'+value.LocationName+'</td><td>'+days+'</td><td>'+value.SlotStartTime+'</td><td>'+value.SlotEndTime+'</td><td>'+value.TotalSeconds+'</td><td>'+yesText+'</td><td>'+isPaid+'</td><td></td></tr>');
});
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}