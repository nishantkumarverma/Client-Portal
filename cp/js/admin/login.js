$(document ).ready(function() {
   $("#loginClick" ).click(function() {
  $("#login-page" ).show();
  $("#register-page" ).hide();
});

$("#registerClick" ).click(function() {
 $("#login-page" ).hide();
  $("#register-page" ).show();
});
});


function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function validateUser()
{
var uEmail =$("#username").val();
var uPassword =$("#password").val();
var errorMsg="Validate your inputs\n";
if(uEmail==""){
errorMsg = errorMsg + "Email id is required.\n";
}else{
if(!IsEmail(uEmail)){
errorMsg = errorMsg + "Email id is not valid.\n";
}
}
if(uPassword==""){
errorMsg = errorMsg + "Password is required.\n";
}
if(errorMsg=="Validate your inputs\n"){
displayLoading();
 var dataList = {
	 "AdminEmail" :uEmail,
	 "AdminPassword":uPassword
    };
   $.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL + "admin/validate/",
      data: dataList,
      success: function(dataVal){
	 
		console.log(dataVal);
		if(dataVal=="No user found."){
		$("#resultSignin").html("Username/Password not matched");
		$("#resultSignin").show();
		displayErrorMessage("Login error","Username/Password not matched. Please try login!","error");
		hideLoading();
		}else{
		if(dataVal[0].AdminID!=null || dataVal[0].AdminID!=undefined){ 
		setSession(dataVal);
		 hideLoading();
		}
		}
		 },
		error: function(dataVal) {
		console.log(dataVal);
		$("#resultSignin").html("There is a error in processing your request, Please try again!");
		$("#resultSignin").show();
		displayErrorMessage("Login error","Please try again","error");
               hideLoading();
            }
		});


}else{
alert(errorMsg);
hideLoading();
}
}
function setSession(adminJson){
 var dataList = {
      "AdminID": adminJson[0].AdminID,
	  "AdminRoleID":adminJson[0].RoleID,
	  "AdminName":adminJson[0].AdminName,
	  "AdminJson":adminJson[0],
    };
	console.log(dataList);
 $.ajax({
      type: "POST",
      dataType: "json",
      url: appURL+"admin/setadminsession",
      data: dataList,
      success: function(dataVal) {
	   window.location.href = appURL+"admin/home";
	  },
	  error:function(dataVal){
	  console.log(dataVal);
	  }
	  });

}

function registeradmin(){
var uEmail =$("#adminemail").val();
var uPassword =$("#adminpassword").val();
var uName =$("#adminname").val();
var errorMsg="Validate your inputs\n";
if(uName==""){
errorMsg = errorMsg + "Name is required.\n";
}
if(uEmail==""){
errorMsg = errorMsg + "Email id is required.\n";
}else{
if(!IsEmail(uEmail)){
errorMsg = errorMsg + "Email id is not valid.\n";
}
}
if(uPassword==""){
errorMsg = errorMsg + "Password is required.\n";
}
if(errorMsg=="Validate your inputs\n"){
displayLoading();
 var dataList = {
	 "AdminName": uName,
	 "RoleID":1,
	 "AdminEmail" :uEmail,
	 "AdminPassword":uPassword
    };
	$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL + "admin/add/",
      data: dataList,
      success: function(dataVal){
	  console.log(dataVal);
	 if(dataVal.status!=undefined || dataVal.status=="success"){
	 $("#resultSignin").html("Registered Successfully. Login to continue!");
	$("#resultSignin").show();
	$("#adminemail").val('');
	$("#adminpassword").val('');
	$("#adminname").val('');
	 }else{
	 if(dataVal=="Email already register"){
	 $("#resultSignin").html("Email already register");
	$("#resultSignin").show();
	 }
	 }
		 },
		error: function(dataVal) {
		console.log(dataVal);
		$("#resultSignin").html("There is a error in processing your request, Please try again!");
		$("#resultSignin").show();
		displayErrorMessage("Register error","Please try again","error");
               hideLoading();
            }
		});
}else{
alert("Error", errorMsg);
}

}