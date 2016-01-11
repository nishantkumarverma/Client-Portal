var adminData=[];
$(document).ready(function() {
getRoles();
getAdmins();
$("#addRoleBtn").click(function() {
  addRole();
});

});

function getRoles(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/adminrole/get/",
      success: function(dataVal){
	 
			var select = $('#iAdminRole');
$('option', select).remove();
  var option = new Option("Select Role","none");
  select.append($(option));
  $("#role-table tbody").empty();
  var count=0;
$.each( dataVal, function( key, value ) {
count++;
$("#role-table tbody").append('<tr><td>'+count+'</td><td>'+value.AdminRoleName+'</td><td></tr>');

    var option = new Option(value.AdminRoleName, value.AdminRoleID);
    select.append($(option));
});
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function addAdmin(){
var iName = $("#iName").val();
var iEmail= $("#iEmail").val();
var iPassword = $("#iPassword").val();
var iAdminRole= $("#iAdminRole").val();
var errorMsg="Validate your inputs\n"
if(iName==""){
errorMsg = errorMsg + "Name is required.\n";
}
if(iEmail==""){
errorMsg = errorMsg + "Email is required.\n";
}else if(!IsEmail(iEmail)){
errorMsg = errorMsg + "Not a valid email.\n";
}
if(iPassword==""){
errorMsg = errorMsg + "Password is required.\n";
}
if(iAdminRole=="" || iAdminRole=="none"){
errorMsg = errorMsg + "Select role.\n";
}
if(errorMsg=="Validate your inputs\n"){
var dataList = {
	"AdminName":iName,
	"AdminEmail":iEmail,
	"AdminPassword":iPassword,
	"RoleID":iAdminRole
	};
	
	$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL+"/admin/add",
      data: dataList,
      success: function(dataVal){
			 alert("Success","User created successfully");
			 getAdmins();
			 $("#iName").val("");
$("#iEmail").val("");
$("#iPassword").val("");
 $("#iAdminRole").val("none");
		 },
		error: function(dataVal) {
		console.log(dataVal);
		//alert(dataVal);
		alert("Error", "There is error processing your request!, Reload the page and try again");
            }
		});
}
else{
alert("Error", errorMsg);

}
}

function getAdmins(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/admin/get/",
      success: function(dataVal){
	  $("#admin-table tbody").empty();
	  adminData=dataVal;
$.each( dataVal, function( key, value ) {
$("#admin-table tbody").append('<tr><td>'+value.AdminID+'</td><td><img src="'+value.AdminProfilePic+'" width="50px" height="50px"></td><td>'+value.AdminName+'</td><td>'+value.AdminEmail+'</td><td>'+value.AdminRoleName+'</td></tr>');
});
$('#admin-table').DataTable();
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function addRole(){
var roleName = $("#rRoleName").val();
var roleIsActive= $("#rRoleActive").val();
var errorMsg="Validate your inputs\n";
if(roleName==""){
errorMsg = errorMsg + "Role name is required.\n";
}
if(errorMsg=="Validate your inputs\n"){
var dataList = {
	"AdminRoleName":roleName,
	"AdminRoleIsActive":roleIsActive
	};
	
	$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL+"/adminrole/add",
      data: dataList,
      success: function(dataVal){
		 alert("Success","Created Successfully!");
		 $("#rRoleName").val("");
		 getRoles();
		 },
		error: function(dataVal) {
		console.log(dataVal);
		//alert(dataVal);
            }
		});
}
else{
alert("Error", errorMsg);
}

}