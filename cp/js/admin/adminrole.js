$(document).ready(function() {


$("#addRoleBtn").click(function() {
  addRole();
});
});



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
			console.log(dataVal);
		 },
		error: function(dataVal) {
		console.log(dataVal);
		alert(dataVal);
            }
		});
}
else{
alert(errorMsg);
}

}
