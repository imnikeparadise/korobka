
; /* Start:"a:4:{s:4:"full";s:104:"/local/templates/dresscodeV2/components/bitrix/system.auth.registration/.default/script.js?1744840799776";s:6:"source";s:90:"/local/templates/dresscodeV2/components/bitrix/system.auth.registration/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){
	var $registerForm = $(".bx-register-form");

	var authFormSubmit = function(event){
		var $formFields = $registerForm.find("input").removeClass("error");
		var emptyFields = false;

		var $userPersonalInfoReg = $registerForm.find("#userPersonalInfoReg");
		if(!$userPersonalInfoReg.prop("checked")){
			$userPersonalInfoReg.addClass("error");
			emptyFields = true;
		}

		$formFields.each(function(i, nextElement){
			var $nextElement = $(nextElement);
			if($nextElement.data("required") == "required"){
				if($nextElement.val() == ""){
					$nextElement.addClass("error");
					emptyFields = true;
				}
			}
		});

		if(emptyFields){
			return event.preventDefault();
		}

	};

	$registerForm.on("submit", authFormSubmit);
});
/* End */
;; /* /local/templates/dresscodeV2/components/bitrix/system.auth.registration/.default/script.js?1744840799776*/
