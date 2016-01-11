$(document ).ready(function() {
   getCategory();
  
});

function addCategory(){
var iCatName =$("#iCatName").val();
var iCatDesc = $('textarea#iCatDesc').val();
var iCatActive =$("#iCatActive").val();
var errorMsg="Validate your inputs\n";
if(iCatName==""){
errorMsg = errorMsg + "Category name is required.\n";
}
if(!parseInt(iCatActive)){
errorMsg = errorMsg + "Select if category is active or not.\n";
}

if(errorMsg=="Validate your inputs\n"){
var dataList = {
	 "LocationCategoryDesc" :iCatName,
	 "LocationCategoryName":iCatDesc,
	 "CategoryIsActive":iCatActive
    };
	
	$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL+"/locationcategory/add",
      data: dataList,
      success: function(dataVal){
	  alert("Success","Created Successfully!");
	  $("#iCatName").val("");
$('textarea#iCatDesc').val("");
getCategory();
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
      url: apiURL+"/locationcategory/get/",
      success: function(dataVal){
	
	  $("#category-table tbody").empty();
$.each( dataVal, function( key, value ) {
var yesText="No";
if(value.CategoryIsActive==1){
yesText="Yes";
}
$("#category-table tbody").append('<tr><td>'+value.LocationCategoryID+'</td><td>'+value.LocationCategoryName+'</td><td>'+yesText+'</td></tr>');
});
 $('#category-table').DataTable();
		 },
		error: function(dataVal) {
		console.log(dataVal);
		alert("Error", "There is error processing your request!, Reload the page and try again");
             
            }
		});

}