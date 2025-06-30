
; /* Start:"a:4:{s:4:"full";s:101:"/local/templates/dresscodeV2/components/bitrix/system.auth.authorize/.default/script.js?1744840799502";s:6:"source";s:87:"/local/templates/dresscodeV2/components/bitrix/system.auth.authorize/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){
	var $authForm = $(".bx-auth-form");

	var authFormSubmit = function(event){
		var $formFields = $authForm.find("input").removeClass("error");
		var emptyFields = false;

		$formFields.each(function(i, nextElement){
			var $nextElement = $(nextElement);
			if($nextElement.val() == ""){
				$nextElement.addClass("error");
				emptyFields = true;
			}
		});

		if(emptyFields){
			return event.preventDefault();
		}

	};

	$authForm.on("submit", authFormSubmit);
});
/* End */
;; /* /local/templates/dresscodeV2/components/bitrix/system.auth.authorize/.default/script.js?1744840799502*/
