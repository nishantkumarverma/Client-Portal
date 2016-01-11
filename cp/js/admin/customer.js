$(document ).ready(function() {
getCustomer();
});


function getCustomer(){
   $.ajax({
      type: "get",
      dataType: "json",
      url: apiURL+"/customer/get",
      success: function(dataVal){
	  
		 $("#customer-table tbody").empty();
$.each( dataVal, function( key, value ) {
$("#customer-table tbody").append('<tr><td>'+value.CustomerID+'</td><td>'+value.CustomerName+'</td><td>'+value.CompanyName+'</td><td>'+value.CustomerEmail+'</td><td></td></tr>');

});
	$('#customer-table').DataTable();	 },
		error: function(dataVal) {
		console.log(dataVal);
		
             
            }
		});

}