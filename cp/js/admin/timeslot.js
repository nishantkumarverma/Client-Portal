var slotDays=[];
var deleteMe = function( arr, me ){
   var i = arr.length;
   while( i-- ) if(arr[i] === me ) arr.splice(i,1);
}
function validateTime(strTime) {
var regex = new RegExp("([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])");
if (regex.test(strTime)) {
return true;
} else {
return false;
}
}
$(document).ready(function() {
getTimeslot();

$('input[type="checkbox"]').change(function() {
	if(this.checked){
	$(this).val("1");
	//slotDays.push($(this).val());
	}else{
		$(this).val("0");
	//deleteMe(slotDays,$(this).val());
	}
});
});
function addTimeslot(){
var TimeSlotName = $("#iTimeSlotName").val();
var TimeSlotDescription= $("#iSlotDesc").val();
var SlotStartTime = $("#iStartTime").val();
var SlotEndTime= $("#iEndTime").val();
var IsTimeslotActive = $("#iSlotActive").val();
var IsAllowedSunday=$("#iSunday").val();
var IsAllowedMonday=$("#iMonday").val();
var IsAllowedTuesday=$("#iTuesday").val();
var IsAllowedWednesday=$("#iWednesday").val();
var IsAllowedThursday=$("#iThursday").val();
var IsAllowedFriday=$("#iFriday").val();
var IsAllowedSaturday=$("#iSaturday").val();

var errorMsg="Validate your inputs\n";

if(TimeSlotName==""){
errorMsg = errorMsg + "Slot Name is required.\n";
}

if(SlotStartTime==""){
errorMsg = errorMsg + "Start time is required.\n";
}

if(SlotEndTime==""){
errorMsg = errorMsg + "End time is required.\n";
}

if(!validateTime(SlotStartTime)){
errorMsg = errorMsg + "Start time is not in valid formate 00:00:00.\n";
}
if(!validateTime(SlotEndTime)){
errorMsg = errorMsg + "End time is not in valid formate 00:00:00.\n";
}

//var t1 = moment(SlotStartTime, "HH:mm:ss");
//var t2 = moment(SlotEndTime, "HH:mm:ss");

var t3 = time_diff_inSec(SlotStartTime,SlotEndTime);
if(t3<=0)
{
errorMsg = errorMsg + "Time duration is not correct.\n";
}
alert(t3);
//errorMsg=errorMsg+t3;
if(errorMsg=="Validate your inputs\n"){
var dataList = {
	"TimeSlotName":TimeSlotName,
	"SlotStartTime":SlotStartTime,
	"SlotEndTime":SlotEndTime,
	"TimeSlotDescription":TimeSlotDescription,
	"TimeSlotCreatedBy":userJson.AdminID,
	"IsAllowedSunday":IsAllowedSunday,
	"IsTimeslotActive":IsTimeslotActive,
	"IsAllowedSaturday":IsAllowedSaturday,
	"IsAllowedMonday":IsAllowedMonday,
	"IsAllowedTuesday":IsAllowedTuesday,
	"IsAllowedWednesday":IsAllowedWednesday,
	"IsAllowedThursday":IsAllowedThursday,
	"IsAllowedFriday":IsAllowedFriday,
	"DurationInSec":t3
	};
		$.ajax({
      type: "POST",
      dataType: "json",
      url: apiURL+"/timeslot/add",
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

function time_diff_inSec(t1, t2) {
   var parts = t1.split(':');
   var d1 = new Date(0, 0, 0, parts[0], parts[1], parts[2]);
   parts2 = t2.split(':');
   var d2 = new Date(new Date(0, 0, 0, parts[0], parts[1], parts[2]) - d1);
   var hh=parts2[0]-parts[0];
   var mm=parts2[1]-parts[1];
   var ss= parts2[2]-parts[2];
   var dif=0;
   if(hh>=0 && mm>=0 && ss>=0){
   dif=parseInt(hh*60*60) + parseInt(mm*60) + parseInt(ss);
      return dif;
   }else{
   return 0;
   }

   //return d2.toTimeString().substr(0, d2.toTimeString().indexOf(' '));
   //return (d2.getHours() + ':' + d2.getMinutes() + ':' + d2.getSeconds());
}


function getTimeslot(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/timeslot/get",
      success: function(dataVal){
	  console.log(dataVal);
	  $("#timeslot-table tbody").empty();
$.each( dataVal, function( key, value ) {
var yesText="No";
if(value.IsTimeslotActive==1){
yesText="Yes";
}
$("#timeslot-table tbody").append('<tr><td>'+value.TimeSlotID+'</td><td>'+value.TimeSlotName+'</td><td>'+value.SlotStartTime+'</td><td>'+value.SlotEndTime+'</td><td>'+value.DurationInSec+'</td><td>'+yesText+'</td><td></td></tr>');
});
	 $('#timeslot-table').DataTable();	 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}