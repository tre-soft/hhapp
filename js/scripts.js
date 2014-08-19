
// Calculates GHash on keyup displays
var aBudget = 0;

$(document).ready(function(){
	$("#budget").keyup(function(){
		aBudget = $("#budget").val();
  		if($.isNumeric(aBudget) || aBudget == "" ){
  			if(aBudget == ""){
	  			$("#hash").text("0");
  			}
  			else{
	  			$("#hash").text((aBudget/8.95).toFixed(2));
  			}
  		}
  		else{
  			$("#hash").text("0");
  		}
	});
	
	$("#hardware_unit").keyup(function(){
		unit = $("#hardware_unit").val();
		if($.isNumeric(unit) || unit == "" ){
			
  			if(unit == ""){
	  			$("#USD").text("0.00");
  			}
  			else{
				$("#USD").text((1600 * 8 * unit).toFixed(2));
				//$('#USD').priceFormat();
				$('#USD').priceFormat({
					clearPrefix: true	
				});
  			}
  		}
  		else{
  			$("#USD").text("0.00");
  		}
	});
});


