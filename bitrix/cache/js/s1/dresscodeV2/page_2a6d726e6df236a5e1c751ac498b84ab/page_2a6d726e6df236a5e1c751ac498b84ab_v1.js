
; /* Start:"a:4:{s:4:"full";s:90:"/local/templates/dresscodeV2/components/dresscode/search/.default/script.js?17448407991057";s:6:"source";s:75:"/local/templates/dresscodeV2/components/dresscode/search/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){

	var openSmartFilterFlag = false;
	var changeSortParams = function(){
		window.location.href = $(this).val();
	};


	var openSmartFilter = function(event){

		// smartFilter block adaptive toggle
		if(!openSmartFilterFlag){
			$("#smartFilter").addClass("opened").css('marginTop', ($('.oSmartFilter').offset().top - $('#nextSection').offset().top - $('#nextSection').height() +25));
			openSmartFilterFlag = true;
		}

		else{
			$("#smartFilter").removeClass("opened").removeAttr("style");
			openSmartFilterFlag = false;
		}

		return event.preventDefault();
	};

	var closeSmartFilter = function(event){
		if(openSmartFilterFlag){
			$("#smartFilter").removeClass("opened");
			openSmartFilterFlag = false;
		}
	};

	$(document).on("click", ".oSmartFilter", openSmartFilter);
    $(document).on("click", "#smartFilter, .oSmartFilter, .rangeSlider", function(event){
    	return event.stopImmediatePropagation();
    });

	$("#selectSortParams, #selectCountElements").on("change", changeSortParams);
});
/* End */
;; /* /local/templates/dresscodeV2/components/dresscode/search/.default/script.js?17448407991057*/
