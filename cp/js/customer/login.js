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
	 "CustomerEmail" :uEmail,
	 "CustomerPassword":uPassword
    };
   $.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL + "customer/validate/",
      data: dataList,
      success: function(dataVal){
	 
		console.log(dataVal);
		if(dataVal=="No user found."){
		$("#resultSignin").html("Username/Password not matched");
		$("#resultSignin").show();
		displayErrorMessage("Login error","Username/Password not matched. Please try login!","error");
		hideLoading();
		}else{
		if(dataVal[0].CustomerID!=null || dataVal[0].CustomerID!=undefined){ 
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
function setSession(userJson){
 var dataList = {
      "UserID": userJson[0].CustomerID,
	  "UserName":userJson[0].CustomerName,
	  "UserJson":userJson[0],
    };
	console.log(dataList);
 $.ajax({
      type: "POST",
      dataType: "json",
      url: appURL+"setsession",
      data: dataList,
      success: function(dataVal) {
	   window.location.href =appURL+"home";
	  },
	  error:function(dataVal){
	  console.log(dataVal);
	  }
	  });

}

function registercustomer(){
var uCompanyName=$("#customerCompany").val();
var uEmail =$("#customerEmail").val();
var uPassword =$("#customerPassword").val();
var uName =$("#customerName").val();
var errorMsg="Validate your inputs\n";
if(uCompanyName==""){
errorMsg = errorMsg + "Company Name is required.\n";
}
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
	 "CompanyName": uCompanyName,
	 "CustomerName":uName,
	 "CustomerEmail" :uEmail,
	 "CustomerPassword":uPassword
    };

	$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL + "customer/add/",
      data: dataList,
      success: function(dataVal){
	  console.log(dataVal);
	 if(dataVal.status!=undefined || dataVal.status=="success"){
	 $("#resultSignin").html("Registered Successfully. Login to continue!");
	$("#resultSignin").show();
	$("#customerCompany").val('');
	$("#customerEmail").val('');
	$("#customerPassword").val('');
	$("#customerName").val('');
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