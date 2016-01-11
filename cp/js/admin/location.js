$(document).ready(function() {
getCategory();
displayMap(userLatitude,userLongitude);
initialize_locality();
getLocation();

});

function addLocation(){
var iLocCategory =$("#iLocCategory").val();
var iLocDesc = $('textarea#iLocDesc').val();
var iLocName =$("#iLocName").val();
var iScrHeight =$("#iScrHeight").val();
var iScrWidth =$("#iScrWidth").val();
var iScrResolution =$("#iScrResolution").val();
var iLocActive =$("#iLocActive").val();
var iAddress =$("#iAddress").val();
var iLatitude =$("#iLatitude").val();
var iLongitude =$("#iLongitude").val();
var iPincode =$("#iPincode").val();
var errorMsg="Validate your inputs\n";

if(!parseInt(iLocCategory)){
errorMsg = errorMsg + "Select location category.\n";
}
if(iLocName==""){
errorMsg = errorMsg + "Location name is required.\n";
}
if(iScrHeight=="" && !parseFloat(iScrHeight)){
errorMsg = errorMsg + "Valid screen height is required.\n";
}
if(iScrWidth=="" && !parseFloat(iScrWidth)){
errorMsg = errorMsg + "Valid screen width is required.\n";
}
if(iScrResolution=="" && !parseFloat(iScrResolution)){
errorMsg = errorMsg + "Category name is required.\n";
}
if(iAddress==""){
errorMsg = errorMsg + "Address is required.\n";
}
if(iLatitude==""){
errorMsg = errorMsg + "Latitude is required, enter valid address.\n";
}
if(iPincode=="" && !parseInt(iPincode)){
errorMsg = errorMsg + "Valid pincode is required.\n";
}
if(!parseInt(iLocActive)){
errorMsg = errorMsg + "Select if location is active or not.\n";
}

if(errorMsg=="Validate your inputs\n"){
var dataList = {
	 "LocationName" :iLocName,
	 "LocationCategoryID":iLocCategory,
	 "ScreenHeight":iScrHeight,
	 "ScreenWidth":iScrWidth,
	 "ScreenResolution":iScrResolution,
	 "LocationIsActive":iLocActive,
	 "CompleteAddress":iAddress,
	 "Latitude":iLatitude,
	 "Longitude":iLongitude,
	 "Pincode":iPincode
    };
	
	$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL+"/location/add",
      data: dataList,
      success: function(dataVal){
	console.log(dataVal);
	alert("Success","Created Successfully!");
	$("#iLocCategory").val("none");
$('textarea#iLocDesc').val("");
$("#iLocName").val("");
$("#iScrHeight").val("");
$("#iScrWidth").val("");
$("#iScrResolution").val("");

$("#iAddress").val("");
$("#iLatitude").val("");
$("#iLongitude").val("");
$("#iPincode").val("");
getLocation();
		 },
		error: function(dataVal) {
		console.log(dataVal);
		alert("Error", "There is error processing your request!, Reload the page and try again");
            }
		});
}else{
alert("Error", errorMsg);
}
}

function getCategory(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/locationcategory/get",
      success: function(dataVal){
	  console.log(dataVal);
			var select = $('#iLocCategory');
$('option', select).remove();
var option = new Option("Select category","none");
  select.append($(option));
$.each( dataVal, function( key, value ) {
  
    var option = new Option(value.LocationCategoryName, value.LocationCategoryID);
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
      url: apiURL+"/location/get/",
      success: function(dataVal){
	  console.log(dataVal);
  $("#location-table tbody").empty();
$.each( dataVal, function( key, value ) {
var yesText="No";
if(value.LocationIsActive==1){
yesText="Yes";
}
$("#location-table tbody").append('<tr><td>'+value.LocationID+'</td><td>'+value.LocationName+'</td><td>'+value.LocationCategoryName+'</td><td>'+value.ScreenHeight+'</td><td>'+value.ScreenWidth+'</td><td>'+value.ScreenResolution+'</td><td>'+value.Pincode+'</td><td>'+yesText+'</td><td></td></tr>');

});
	 $('#location-table').DataTable();	 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}
	