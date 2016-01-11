var locationJson=[];
var priceSelection=[];
var priceJson=[];
var taxJson=[];
var dataList=[];
var fullAddress="";
$(document).ready(function() {
getLocation();
getTax();
getPaymentMethod();
$("#photoContent").hide();
$("#videoContent").hide();
$("#step2").hide();
$('#iLocation').on('change', function() {
  if(this.value!="none"){
  var locArray = this.value.split("-");
  $("#iLocCategory").val(locArray[1]);
  callStep2(locArray[0]);
  $("#step2").show();
  }
});

$('#iContentType').on('change', function() {
  if(this.value!="none"){
  if(this.value=="Photo"){
    $("#photoContent").show();
  $("#videoContent").hide();
  }else if(this.value=="Video"){
    $("#photoContent").hide();
  $("#videoContent").show();
  }
  }else{
  
  $("#photoContent").hide();
  $("#videoContent").hide();
  }
});


});
function callStep2(LocationID){
getPricing(LocationID);
getLocationByID(LocationID);
}

function getPricing(LocationID){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/pricingtable/getbylocation/"+LocationID,
      success: function(dataVal){
	  console.log(dataVal);
	  priceJson = dataVal;
var days="";	  
$("#pricing-table tbody").empty();
$.each( dataVal, function( key, value ) {
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
  $("#pricing-table tbody").append('<tr><td><input type="checkbox" id="priceid-'+value.PriceID+'" value="'+value.PriceID+'"/><label for="priceid-'+value.PriceID+'"></label></td><td>'+value.TimeSlotName+'<br>'+days+'</td><td>'+value.SlotStartTime+'</td><td>'+value.SlotEndTime+'</td><td>'+value.MinimumSecRequired+'</td><td>'+value.MinimumSecRequired+'</td><td>'+value.PricePerSec+'</td><td></td></tr>');
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
	  console.log(dataVal);
			var select = $('#iLocation');
$('option', select).remove();
  var option = new Option("Select Location","none");
  select.append($(option));
$.each( dataVal, function( key, value ) {
    var option = new Option(value.LocationName, value.LocationID+"-"+value.LocationCategoryID);
    select.append($(option));
});
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function getPaymentMethod(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/paymentmethod/get",
      success: function(dataVal){
	  console.log(dataVal);
			var select = $('#iPaymentMethod');
$('option', select).remove();
  var option = new Option("Select Payment Method","none");
  select.append($(option));
$.each( dataVal, function( key, value ) {
    var option = new Option(value.PaymentMethodName, value.PaymentMethodID);
    select.append($(option));
});
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function getTax(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/tax/get",
      success: function(dataVal){
	  console.log(dataVal);
			taxJson=dataVal;
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function getLocationByID(LocationID){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/location/getbyid/"+LocationID,
      success: function(dataVal){
	  console.log(dataVal);
	  locationJson=dataVal;
		$("#locationDetails").empty();
$.each( dataVal, function( key, value ) {
fullAddress=value.CompleteAddress;
$("#locationDetails").append('<tr><td><b>Complete Address:</b></td><td colspan="5">'+value.CompleteAddress+'</td></tr>');
    $("#locationDetails").append('<tr><td><b>Screen Height:</b></td><td>'+value.ScreenHeight+'</td><td><b>Screen Width:</b></td><td>'+value.ScreenWidth+'</td><td><b>Screen Resolution:</b></td><td>'+value.ScreenResolution+'</td></tr>');
	
	
	displayMap(value.Latitude,value.Longitude);
});
		 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}

function drafBooking(){
dataList=[];
var duration=$("#iTotalSeconds").val();
var cType=$("#iContentType").val();
var iLocation=$("#iLocation").val();
var iVideoURL=$("#iVideoURL").val();
var iPhoto=$("#iPhoto").val();
var iBookingCode=$("#iBookingCode").val();
var contentFile=iVideoURL;
var iBookingDesc=$("#iBookingDesc").val();
var Total=0;
var errorMsg = "Validate your inputs\n";
if(iLocation=="" || iLocation=="none"){
errorMsg=errorMsg+"Select location to proceed\n"
}
if(duration=="" || !parseInt(duration)){
errorMsg=errorMsg+"Provide valid total seconds you want to book\n"
}

if(cType=="" || cType=="none" ){
errorMsg=errorMsg+"Select content type\n"
}else{
if(cType=="Photo"){
if(iPhoto==""){
errorMsg=errorMsg+"Photo is required\n"
}else{
contentFile=iPhoto;
}
}else if(cType=="Video"){
if(iVideoURL==""){
errorMsg=errorMsg+"Video Url is required\n"
}
}
}
if( errorMsg == "Validate your inputs\n"){

var thead='<tr><td><b>Address:</b></td><td>'+fullAddress+'</td><td><b>Content Type:</b></td><td>'+cType+'</td></tr>';
$("#preview-table thead").empty();
$("#preview-table thead").append(thead);
$("#priceTable tbody").empty();
var count=0;
$('input:checkbox[id^="priceid-"]:checked').each(function(){
count++;
//alert($(this).val());
var priceID=$(this).val();
var days="";
var priceSelected=getObjects(priceJson,"PriceID",priceID);
priceSelected=priceSelected[0];
if(priceSelected.IsAllowedSunday){
days="Sunday";
}
if(priceSelected.IsAllowedSaturday){
days=days + "," + "Saturday";
}
if(priceSelected.IsAllowedMonday){
days=days + "," +"<br>Monday";
}
if(priceSelected.IsAllowedTuesday){
days=days + "," +"Tuesday";
}
if(priceSelected.IsAllowedWednesday){
days=days + "," +"<Br>Wednesday";
}
if(priceSelected.IsAllowedThursday){
days=days + "," +"Thursday";
}
if(priceSelected.IsAllowedFriday){
days=days + "," +"<br>Friday";
}
var unitTotal=parseFloat(duration)*parseFloat(priceSelected.PricePerSec);
Total=Total + unitTotal;
var tr='<tr><td>'+count+'</td><td>'+priceSelected.SlotStartTime+'<br>to<br>'+priceSelected.SlotEndTime+'</td><td>'+days+'</td><td>'+duration+'</td><td>'+priceSelected.PricePerSec+'</td><td>'+unitTotal+'</td></tr>'

/*
<tr><td></td><td></td><td>Total:</td><td></td></tr>
 <tr><td></td><td>Tax</td><td>Tax:</td><td></td></tr>
 <tr><td></td><td></td><td>Sub Total:</td><td></td></tr>';
 */
 $("#priceTable tbody").append(tr);
 
var locArray = iLocation.split("-");

subdataList = {
	"CustomerID":userJson.CustomerID,
	"LocationID":locArray[1],
	"TotalPrice":0,
	"SubTotal":0,
	"TotalSeconds":duration,
	"CouponCodeID":0,
	"TaxID":taxApplied,
	"TimeSlotID":priceSelected.TimeSlotID,
	"PriceID":priceSelected.PriceID,
	"IsPaid":0,
	"BookingCode":iBookingCode,
	"PaymentMethodID":1,
	"ContentType":cType,
	"UploadedContentURL":contentFile,
	"Comments":iBookingDesc
	};
dataList.push(subdataList);
	});
	if(count>0){
var taxApplied="";
var subTotal=Total;
$.each(taxJson, function(i, item) {
if(taxApplied==""){
taxApplied=item.TaxID;
}
else{
taxApplied=taxApplied + "," +item.TaxID;
}
 var percResult= (parseFloat(item.TaxPercentage) / 100) * parseFloat(Total);
  percResult = roundUpto(percResult, 2);
  subTotal=parseFloat(subTotal) + parseFloat(percResult);
  subTotal = roundUpto(subTotal, 2);
  var tr='<tr><td></td><td></td><td></td><td></td><td>'+item.TaxName+'('+item.TaxPercentage+'%)</td><td>'+percResult+'</td></tr>';
  $("#priceTable tbody").append(tr);
});
 var tr='<tr><td></td><td></td><td></td><td></td><td>Sub Total</td><td>'+subTotal+'</td></tr>';
  $("#priceTable tbody").append(tr);
  
$.each(dataList, function(i, item) {
item.TotalPrice=Total;
item.SubTotal=subTotal;
item.TaxID=taxApplied;
});

}
else{
errorMsg = errorMsg+"Select at least one timeslot\n";
 alert(errorMsg);
}
  }
  else{
  alert(errorMsg);
  }
}

function confirmBooking(){
var iPaymentMethod=$("#iPaymentMethod").val();
if(iPaymentMethod=="none"){
alert("Select payment method");
}else{
$.each(dataList, function(i, item) {
item.PaymentMethodID=iPaymentMethod;
addSingleBooking(item);
});


}
}

function addSingleBooking(postData){
 $.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL+"/booking/add/",
      data: postData,
      success: function(dataVal){
	 console.log(dataVal);
		$("#BookingID").val(dataVal.id);
		if(postData.ContentType=="Photo"){
		uploadFiles();
		}
		window.location.href = appURL+"home/";
		 },
		error: function(dataVal) {
		console.log(dataVal);

            }
		});

}

function uploadFiles()
{
console.log($("form#formuploadImg"));
if( window.FormData !== undefined ) 
{
var form1= $("form#formuploadImg")[0];
var fd = new FormData(form1);

console.log(fd);
    $.ajax({
        url: apiURL+"/booking/images/upload",
        type: 'POST',
        data: fd[0],
        async: false,
        success: function (data) {
          console.log(data);
        },
		 error: function (data) {
             console.log(data);
			 alert("Booking submitted successfully! Error in uploading image! Please contact customer support.");
			 
        },
        cache: false,
        contentType: false,
        processData: false
    });
	}
}