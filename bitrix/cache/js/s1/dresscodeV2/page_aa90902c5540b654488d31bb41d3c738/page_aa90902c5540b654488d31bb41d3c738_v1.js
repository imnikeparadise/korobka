
; /* Start:"a:4:{s:4:"full";s:93:"/local/templates/dresscodeV2/components/dresscode/slider/promoSlider/js/init.js?1744840799418";s:6:"source";s:79:"/local/templates/dresscodeV2/components/dresscode/slider/promoSlider/js/init.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function() {

	$("#slider").dwSlider({
		afterResize: setSliderHeight, // callback
		afterLoad: setSliderHeight, // callback
		timeLine: false,
		responsive: true,
		delay: 5000,
		speed: 1000
	});

	//callBack functions
	function setSliderHeight(link) {

		function setHeight() {
			return false;
		}

		setHeight();

	}

	//
	$("#slider .sliderContent").removeClass("loading").show();

});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:98:"/local/templates/dresscodeV2/components/dresscode/offers.product/.default/script.js?17448407992271";s:6:"source";s:83:"/local/templates/dresscodeV2/components/dresscode/offers.product/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){
	
	var mainElementID = "#homeCatalog"; //--\\
	var $self = $(mainElementID);
	var httpLock = false;

	var getProductByGroup = function(event){
		if(httpLock == false){
			if(offersProductParams != ""){
			
				var $this = $(this);
				var $parentThis = $this.parent();

				var page = $this.data("page");			
				var groupID = $this.data("group");
				var changeSheet = $this.data("sheet");

				
				if($parentThis.hasClass("selected") && changeSheet != "Y"){
					return false;
				}

				if(changeSheet != "Y"){
					var $captionEL = $self.find(".caption")
										.removeClass("selected");

				}

				var $ajaxContainer = $self.find(".ajaxContainer")
												.addClass("loading");

				$parentThis
					.addClass("loading");

				$this.data("sheet", "N");	// clear status 

				if(parseInt(groupID, 10) > 0 || groupID == "all"){
					
					httpLock = true;

					var sendDataObj = {
						params: offersProductParams,
						groupID: groupID,
						page: page
					}

					var jqxhr = $.get(ajaxDir + "/ajax.php", sendDataObj, function(http) {
						if(http){
							
							$ajaxContainer.html(http)
								.removeClass("loading");
							
							$parentThis
								.removeClass("loading");

							if(changeSheet != "Y"){		
								$this.parents(".caption")
									.addClass("selected");
							}
							httpLock = false;
							//addCart button reload
							changeAddCartButton(basketProductsNow);
							//subscribe button reload
							subscribeOnline();
						}
					});

				}else{
					console.error("check data group (data.group not found)");
				}
			
			}else{
				console.error("var type (json) not found (name offersProductParams)");
			}
		}
		return event.preventDefault();
		
	};

	var getProductNextPage = function(event){
	
		var $activeGroup = $self.find(".caption.selected a");
		var currentPage = parseInt($activeGroup.data("page"), 10);

		$activeGroup.data({
			"page": currentPage + 1,
			"sheet": "Y"
		});

		$activeGroup.trigger("click");

		return event.preventDefault();
	
	}

	$(document).on("click", ".getProductByGroup", getProductByGroup);
	$(document).on("click", ".product .showMore", getProductNextPage);

});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:94:"/local/templates/dresscodeV2/components/dresscode/pop.section/.default/script.js?1744840799587";s:6:"source";s:80:"/local/templates/dresscodeV2/components/dresscode/pop.section/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){

	var getNextPage = function(event){
		
		var $self =  $("#popSection");
		var page = $self.data("page") + 1;			


		var $ajaxContainer = $self.find(".ajaxContainer")
										.addClass("loading");

		var sendDataObj = {
			params: popSectionParams,
			page: page
		}

		var jqxhr = $.get(ajaxDirPopSection + "/ajax.php", sendDataObj, function(http){
			if(http){
				$ajaxContainer.html(http)
					.removeClass("loading");

				$self.data("page", page);
			}
		});

		return event.preventDefault();
	};

	$(document).on("click", "#popSection .showMore", getNextPage);
});
/* End */
;; /* /local/templates/dresscodeV2/components/dresscode/slider/promoSlider/js/init.js?1744840799418*/
; /* /local/templates/dresscodeV2/components/dresscode/offers.product/.default/script.js?17448407992271*/
; /* /local/templates/dresscodeV2/components/dresscode/pop.section/.default/script.js?1744840799587*/
