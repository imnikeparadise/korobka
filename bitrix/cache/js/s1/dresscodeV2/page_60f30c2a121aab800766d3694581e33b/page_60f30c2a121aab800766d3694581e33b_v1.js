
; /* Start:"a:4:{s:4:"full";s:88:"/local/templates/dresscodeV2/components/bitrix/catalog/.default/script.js?17448407991080";s:6:"source";s:73:"/local/templates/dresscodeV2/components/bitrix/catalog/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){

	//global vars
	var openSmartFilterFlag = false;
	var changeSortParams = function(){
		window.location.href = $(this).val();
	};

	$("#selectSortParams, #selectCountElements").on("change", changeSortParams);


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
	$(document).on("click", closeSmartFilter);

});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:83:"/local/components/dresscode/catalog.item/templates/detail/script.js?174484079811647";s:6:"source";s:67:"/local/components/dresscode/catalog.item/templates/detail/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
var flushTimeout;
var skuDropdownOpened = false;

	$(function(){

		//vars
		$body = $("body");

		//sku change after page load
		var offerID = getUrlVars()["offerID"];
		if(offerID){
			$.getJSON(elementAjaxPath + "?act=getOfferByID&id=" + offerID, function(data){
				$.each(data[0], function(elementIndex, elementValue){
					var $searchCurrentProperty = $(".elementSkuPropertyValue[data-name='" + elementIndex + "'][data-value='" + elementValue + "']");
					$searchCurrentProperty.find(".elementSkuPropertyLink").trigger("click",  ["ignoreLoading"]);
				});
			});
		}

		function getUrlVars(){
		    var vars = {};
		    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
		        vars[key] = value;
		    });
	   		return vars;
		}

		$(document).on("click", ".question", function(event){
			$("#hint").remove();
			$("#catalogElement").append(
				$('<div id="hint">').html("<span>" + $(this).siblings().text() + "</span><ins></ins><p>" + $(this).data("description") + "</p>").css({
					"top": ($(this).position().top - 20) + "px",
					"left": ($(this).offset().left + 40) + "px"
				})
			);
			return event.preventDefault();
		});

		$(document).on("click", "#hint ins", function(event){
			$("#hint").remove();
			return event.preventDefault();
		});

		var $catalogElement = $("#catalogElement");
		var $elementNavigation = $("#elementNavigation");
		var $elementTools = $("#elementTools");

		if($elementNavigation.find(".tabs").height() > $elementTools.find(".fixContainer").height()){
			var maxScroll = $catalogElement.offset().top - $elementNavigation.find(".tabs").outerHeight();
		}else{
			var maxScroll = $catalogElement.offset().top - $elementTools.find(".fixContainer").outerHeight() - 36;
		}
		var navOffset = $elementTools.offset().top;

		var scrollControl = function(event){
			var curScrollValueY = (event.currentTarget.scrollY) ? event.currentTarget.scrollY : $(window).scrollTop()
			if(curScrollValueY <= maxScroll + $catalogElement.height()){
				if(navOffset <= curScrollValueY){
					$elementNavigation.addClass("fixed").find(".tabs").removeClass("maxScroll");
					$elementTools.addClass("fixed").find(".fixContainer").removeClass("maxScroll");	;
				}else{
					$elementNavigation.removeClass("fixed").find(".tabs").removeClass("maxScroll");
					$elementTools.removeClass("fixed").find(".fixContainer").removeClass("maxScroll");
				}
			}else{
				$elementNavigation.removeClass("fixed").find(".tabs").addClass("maxScroll");
				$elementTools.removeClass("fixed").find(".fixContainer").addClass("maxScroll");
			}

		};

		var scrollToPropertyList = function(event){
			
			$("html, body").animate({
				scrollTop: $("#elementProperties").offset().top + "px"
			}, 250);
			
			return event.preventDefault();
		
		};
	
		var $_this 	  = {},
			$_parn    = {},
			$_addCart = {};


		var _tmpPrice = null,
			_sumPrice = null,
			_tmpDisnt = null,
			_sumDisnt = null,
			_prs = null,
			_prd = null;


		var lsClick = function(event){

			var __priceID = event.data.lsWindow === true ? "#setWPrice" : "#setPrice",
				__priceDS = event.data.lsWindow === true ? "#setWDisnt" : "#setDisnt",
				__addCart = event.data.lsWindow === true ? "#setWindowPrice .addCart" : ".rt .addCart",
				__prodCls = ".setElement",
				__disbCLs = "disabled",
				__priceDT = "price",
				__priceDI = "discount",
				__textDat = "text";

			var $_setPrice = $(__priceID),
				$_setDisnt = $(__priceDS);


			$_this = $(this);
			$_parn = $_this.parents(__prodCls);

			$_this.toggleClass(__disbCLs);
			$_parn.toggleClass(__disbCLs);

			_prs = $_this.hasClass(__disbCLs) ? -parseInt($_parn.data(__priceDT)) : parseInt($_parn.data(__priceDT));
			_prd = $_this.hasClass(__disbCLs) ? -(parseInt($_parn.data(__priceDT)) + Math.ceil($_parn.data(__priceDI))) : (parseInt($_parn.data(__priceDT)) + Math.ceil($_parn.data(__priceDI)));

			_tmpPrice = $_setPrice.html().replace(/[0-9]/g, '');
			_sumPrice = parseInt($_setPrice.html().replace(/[^0-9]/g, '')) + _prs;

			_tmpDisnt = $_setDisnt.html().replace(/[0-9]/g, '');
			_sumDisnt = parseInt($_setDisnt.html().replace(/[^0-9]/g, '')) + _prd;

			$_setPrice.html(
				formatPrice(_sumPrice) + _tmpPrice
			);

			$_setDisnt.html(
				formatPrice(_sumDisnt) + _tmpDisnt
			);

			_sumPrice == _sumDisnt ? $_setDisnt.hide() : $_setDisnt.show();

			$_addCart = $(__addCart);
			$_addCartImg = $_addCart.find("img");
			$_addCart.text($_addCart.data(__textDat)).attr("href", "#").removeClass("added").prepend($_addCartImg);

		};

		var oSetWindow = function(event){
			$("#setWindow").toggle();
			event.preventDefault();
		};

		var setCheaperFormData = function(event){

			var $this = $(this);
			var cheaperFormId = $this.data("id");
			var $cheaperForm = $("#webFormDwModal_" + cheaperFormId);
			var $cheaperProductName = $(".cheaper-product-name");
			var $cheaperProductNameField = $cheaperForm.find(".product-auto-name").parents(".webFormItem").find(".inputtext");

			$cheaperProductNameField.val($cheaperProductName.text()).prop("readonly", "readonly");

		};

		var sendRating = function(event) {
			var $this = $(this);
			var $win = $("#elementError");
			var trig = event.data.dest == "good" ? true : false;

			$.getJSON(ajaxPath + "?act=rating&id=" + $this.data("id") + "&trig=" + trig, function(data) {
				if (data["result"]) {
					$this.find("span").html(
						parseInt($this.find("span").html()) + 1
					);
				} else {
					$win.show().find("p").text(data["error"]).parent().find(".heading").text(data["heading"]);
				}
			});
			event.preventDefault();
		};

		var calcRating = function(event) {
			var $this = $(this);
			var $mover = $this.find(".m");
			var $ratingInput = $("#ratingInput");
			var position = $this.offset().left;
			var curWidth = $this.width() / 5;
			var value = Math.ceil((event.pageX - position) / curWidth);

			$mover.stop().css({
				"width": (value * 20) + "%"
			});

			if (event.data.action) {
				$ratingInput.val(value);
			};

		};

		var callRating = function(event) {
			var $this = $(this);
			var $ratingInput = $("#ratingInput");
			var value = $ratingInput.val() != "" ? parseInt($ratingInput.val()) : 0;

			clearTimeout(flushTimeout);
			flushTimeout = setTimeout(function() {
				$this.find(".m").css({
					"width": (value * 20) + "%"
				})
			}, 500);
		};

		var usedSelect = function(event) {
			var $this = $(this);
			var $ul = $(".usedSelect");
			var usedInput = $("#usedInput");

			$ul.find("a").removeClass("selected");
			$this.addClass("selected");
			$("#usedInput").val($this.data("id"));

			event.preventDefault();
		};

		var reviewSubmit = function(event) {
			var $this = $(this);
			var $form = $(this).parents("form");
			var formData = $form.serialize();
			var $win = $("#elementError");

			$.getJSON(ajaxPath + "?act=newReview&" + formData + "&iblock_id=" + $this.data("id"), function(data) {
				//metrica
				if(typeof globalSettings != "undefined" && typeof globalSettings["TEMPLATE_METRICA_REVIEW_PRODUCT"] != "undefined" && typeof globalSettings["TEMPLATE_METRICA_ID"] != "undefined" && typeof window["yaCounter" + globalSettings["TEMPLATE_METRICA_ID"]] != "undefined"){
					window["yaCounter" + globalSettings["TEMPLATE_METRICA_ID"]].reachGoal(globalSettings["TEMPLATE_METRICA_REVIEW_PRODUCT"]);
				}
				$win.show().find("p").text(data["message"]).parent().find(".heading").text(data["heading"]);
				data["reload"] ? $win.data("reload", 1) : void 0;
			});

			event.preventDefault();
		};

		var windowClose = function(event) {
			var $win = $("#elementError");
			$win.data("reload") ? document.location.reload() : $("#elementError").hide();
			event.preventDefault();
		};

		var showReview = function(event) {
			var $this = $(this);
			var $reviews = $("#reviews");
			if ($this.data("open") == "N") {
				$reviews.children("li").removeClass("hide");
				$this.data("open", "Y").html(CATALOG_LANG["REVIEWS_HIDE"]);
			} else {
				$reviews.children("li").slice(3).addClass("hide")
				$this.data("open", "N").html(CATALOG_LANG["REVIEWS_SHOW"]);
			}
			event.preventDefault();
		};

		var showReviewForm = function(event){
			var $newReview = $("#newReview");
			$newReview.show();
			$("html, body").animate({
				scrollTop: $newReview.offset().top + "px"
			}, 250);
			return event.preventDefault();
		};

		var scrollToReviews = function(event){
			var $newReview = $("#catalogReviews");
			$("html, body").animate({
				scrollTop: $newReview.offset().top + "px"
			}, 250);
			return event.preventDefault();
		};

		$(document).on("click", ".showReviewDetail", function(event) {
			var $this = $(this);
			var $reviewContainer = $("#reviews");

			scrollElement(
				$reviewContainer.children("li").eq(
					$this.data("cnt")
				).offset().top
			);
			event.preventDefault();
		});


		//get fast delivery processing
		var DLProcessing = function(jsonData){
			if(typeof jsonData["COMPONENT_HTML"] != "undefined"){
				if(jsonData["COMPONENT_HTML"] != ""){
					$body.append(jsonData["COMPONENT_HTML"]);
				}
			}
		};

		var getFastDelivery = function(event){

			//vars
			var $this = $(this);
			var productId = $this.data("id");

			if(typeof SITE_ID !="undefined"){

				//check id
				if(productId != ""){
				
					//vars
					var sendObject = {
						product_id: productId,
						act: "getFastDelivery",
						site_id: SITE_ID
					}

					if(typeof fastDeliveryScriptLoaded != "undefined"){
						sendObject["loadScript"] = "N";
					}

					//check ajax path
					if(typeof elementAjaxPath != "undefined"){
						//get json data
						$.getJSON(elementAjaxPath, sendObject, DLProcessing);
					}

					else{
						console.error("var elementAjaxPath not found");
					}

				}

			}

			else{
				console.error("SITE_ID not found");
			}

			//block actions	
			return event.preventDefault();

		};

		//rating review
		$(document).on("mousemove", "#newRating .rating", {action: false}, calcRating);
		$(document).on("mouseleave", "#newRating .rating", callRating)
		$(document).on("click", "#newRating .rating", {action: true}, calcRating);
		$(document).on("click", ".usedSelect a", usedSelect);
		$(document).on("click", "#showallReviews", showReview);
		$(document).on("click", "#newReview .submit", reviewSubmit);
		$(document).on("click", "#elementErrorClose, #elementError .close", windowClose);
		$(document).on("click", ".reviewAddButton", showReviewForm);
		$(document).on("click", ".countReviewsTools", scrollToReviews);

		//rating vote
		$(document).on("click", ".good", {dest: "good"}, sendRating);
		$(document).on("click", ".bad", {dest: "bad"}, sendRating);

		//control tabs after scroll
		$(window).on("ready scroll resize", scrollControl);
		$(document).on("load", scrollControl);

		//scroll to more property table
		$(document).on("click", ".morePropertiesLink", scrollToPropertyList);

		//set
		$(document).on("click", ".sCheck", {lsWindow : false}, lsClick);
		$(document).on("click", ".sWindowCheck", {lsWindow: true}, lsClick);
		$(document).on("click", "#setWindow .close, #catalogElement .addSet, #setWindow .closeWindow", oSetWindow);

		//cheaper
		$(document).on("click", ".cheaper", setCheaperFormData);

		//open delivery modal
		$(document).on("click", ".calcDeliveryButton", getFastDelivery);

	});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:99:"/local/components/dresscode/catalog.item/templates/detail/js/morePicturesCarousel.js?17448407981882";s:6:"source";s:84:"/local/components/dresscode/catalog.item/templates/detail/js/morePicturesCarousel.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
	
	var startMorePicturesElementCarousel;

	$(function(){

		startMorePicturesElementCarousel = function(){

			//settings
			var maxVisibleElements = 5;

			var $moreImagesCarousel = $("#moreImagesCarousel").addClass("show");
			var $moreImagesSlideBox = $moreImagesCarousel.find(".slideBox");
			var $moreImagesItems = $moreImagesSlideBox.find(".item");

			var elementsCount = $moreImagesItems.length;
			var maxPosition = $moreImagesItems.length - maxVisibleElements;
			var currentPosition = 0;
			var startPosition = 0;

			$moreImagesItems.eq(0).addClass("selected")
									.find("a").addClass("zoom");

			if(elementsCount <= maxVisibleElements){
				$("#moreImagesRightButton, #moreImagesLeftButton").hide();
				startPosition = 100 / maxVisibleElements * ((maxVisibleElements - elementsCount) /2);
			}else{
				$("#moreImagesRightButton, #moreImagesLeftButton").show();
			}

			$moreImagesSlideBox.css({
				width: elementsCount * 100 + "%",
				left: startPosition + "%"
			});

			$moreImagesItems.css({
				width: 100 / elementsCount / maxVisibleElements + "%"
			});

			var carouselMoving = function(to){
				$moreImagesSlideBox.finish().animate({
					left: "-" + 100 / maxVisibleElements * to + "%"
				}, 200);
			};

			var leftMoveCarousel = function(event){
				if(--currentPosition < 0){
					currentPosition = maxPosition;
				}				
				return event.preventDefault(carouselMoving(currentPosition));
			};

			var rightMoveCarousel = function(event){
				if(++currentPosition > maxPosition){
					currentPosition = 0;
				}				
				return event.preventDefault(carouselMoving(currentPosition));
			};

			$(document).on("click", "#moreImagesRightButton", rightMoveCarousel);
			$(document).on("click", "#moreImagesLeftButton", leftMoveCarousel);
		}

		startMorePicturesElementCarousel();

	});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:92:"/local/components/dresscode/catalog.item/templates/detail/js/pictureSlider.js?17448407981606";s:6:"source";s:77:"/local/components/dresscode/catalog.item/templates/detail/js/pictureSlider.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
	
	// global function var
	var startPictureElementSlider;
	
	$(function(){

		startPictureElementSlider = function(){

			var $pictureContainer = $("#pictureContainer");
			var $pictureSlider = $pictureContainer.find(".pictureSlider");
			var $pictureSliderElements = $pictureSlider.find(".item");

			var $moreImagesCarousel = $("#moreImagesCarousel");
			var $itemClickToEvent = $moreImagesCarousel.find(".item");

			var elementsCount = $pictureSliderElements.length;
			var currentPosition = 0;

			// add styles
			$pictureContainer.css({
				overflow: "hidden",
				width: "100%",
			});

			$pictureSlider.css({
				width: elementsCount * 100 + "%",
				position: "relative",
				overflow: "hidden",
				display: "table",
				left: "0px"
			});

			$pictureSliderElements.css({
				width: 100 / elementsCount + "%",
				display: "table-cell",
				position: "relative",
				textAlign: "center"
			});


			var slideCalcToMove = function(event){
							
				$this = $(this);
				
				if(!$this.hasClass("selected")){
					$this.siblings(".item").removeClass("selected").find("a").removeClass("zoom");
					$this.addClass("selected").find("a").addClass("zoom");
					event.stopImmediatePropagation();
				}
				
				return event.preventDefault(slideMove($this.index()));
			
			}

			var slideMove = function(to){
				
				$pictureSlider.animate({
					left: "-" + to * 100 + "%"
				}, 250);

				return true;
			
			};

			$itemClickToEvent.on("click", slideCalcToMove);
		}

		startPictureElementSlider(); // start slider =)

	});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:86:"/local/components/dresscode/catalog.item/templates/detail/js/zoomer.js?174484079811150";s:6:"source";s:70:"/local/components/dresscode/catalog.item/templates/detail/js/zoomer.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
	//zoomer

	var createZoomer;

	$(function(){

		createZoomer = function(){
			$body = $("body");
			$morePhotos =  $("#pictureContainer");
			$morePhotosElements = $morePhotos.find(".zoom");

			slidePosition = 0;
			slideElementsWidth = 0;
			slideCarouselWidth = 0;
			slideElementsCount = $morePhotosElements.length - 1;
		}

		var $body = $("body");
		var $morePhotos =  $("#pictureContainer");
		var $morePhotosElements = $morePhotos.find(".zoom");

		var $zoomer;
		var $imageContainer;
		var $imageContainerSlider;
		var $zoomerMoreImagesContainer;
		var $zoomerMoreImagesContainerWrapper;
		var $zoomerMoreImagesContainerWrapperElements;

		var slidePosition = 0;
		var slideElementsWidth = 0;
		var slideCarouselWidth = 0;
		var slideElementsCount = $morePhotosElements.length - 1;

		//touch global
		var carouselStartPosition;
		var touchStartPosition;
		var touchStartedFlag;

        var loadingPictureControl = function(imagePath, callBack){
        
            if(imagePath){
                var newImage = new Image();
                $(newImage).one("load", callBack);
                newImage.src = imagePath;
            }
       
        };

		var openZoomer = function(event){
			
			var $this = $(this);

			startPosition = $this.parents(".item").index();

			$zoomer = $("<div />", {id: "zoomer"}).css({
				backgroundColor: "#ffffff",
				position: "fixed",
				height: "100%",
				width: "100%",
				zIndex: 9999,
				left: 0,
				top: 0
			})

			$imageContainer = $("<div />", {id:"zoomerImageContainer"}).css({
				transform: "translateX(-50%) translateY(-50%)",
				position: "absolute",
				height: "100%",
				width: "100%",
				left: "50%",
				top: "50%"
			});
			
			$imageContainerSlider = $("<div />", {id: "imageContainerSlider"});

			$zoomerMoreImagesContainer = $("<div />", {id: "zoomerMoreImagesContainer"}).css({
				border: "1px solid #e7e8ea",
				position: "absolute", 
				textAlign: "center",
				lineHeight: "100px",
				overflowX: "auto",
				overflowY: "hidden",
				height: "100px",
				width: "100%",
				bottom: "0px",
				zIndex: "99",
				left: "0px"
			}); 

			$zoomerMoreImagesContainerWrapper = $("<div />", {id: "zoomerMoreImagesContainerWrapper"}).css({
				boxSizing: "border-box",
			    display: "inline-block",
			    verticalAlign: "middle",
			    position: "relative",
			    padding: "0px 80px",
			    height: "100px",
			    width: "auto"
			});

		
			$imageContainerSlider.css({
				width: $morePhotosElements.length * 100 + "%",
				height: $(window).height() - 120,
				position: "relative",
				overflow: "hidden",
				cursor: "move",
				left: "-" + startPosition * 100 + "%"
			});
			
			var ix = 0;

			$morePhotosElements.each(function(i, nextElement){
				
				var $nextElement = $(nextElement);
				var nextElementPictureSrc = $nextElement.data("large-picture");
				var nextElementPictureSmallSrc = $nextElement.data("small-picture");
				
				if(nextElementPictureSrc !=""){
					var $nextElementLink = $("<a />", {class: "link", href: "#"}).css({
						backgroundImage: "url(" + nextElementPictureSmallSrc + ")",
						backgroundPosition: "50% 50%",
						backgroundRepeat: "no-repeat",
					    backgroundSize: "contain",
					    display: "inline-block",
					    verticalAlign: "middle",
					    position: "relative",
					    height: "50px",
					    width: "70px"
					});

					var $nextElementItem = $("<div />", {class: "item"}).css({
						boxSizing: "border-box",
						overflow: "hidden",
					    lineHeight: "100px",
					    marginLeft: (ix == 0 ? "0px" : "12px"),
					    height: "100px",
					    float: "left",
					    width: "80px",
					    opacity: "0.6"
					});

					var $nextElementBigItem = $("<div />", {class: "item"}).css({
						width: 100 / $morePhotosElements.length + "%",
						position: "relative",
						textAlign: "center",
						height: "100%",
						float: "left"
					}).append(
						$("<img />", {src: nextElementPictureSrc}).css({
							position: "absolute",
							maxHeight: "90%",
							maxWidth: "90%",
							margin: "auto",
							bottom: "0",
							right: "0",
							left: "0",
							top: "0"
						})
					);

					if(ix == startPosition){
						$nextElementItem.addClass("selected");
					}

					$imageContainerSlider.append($nextElementBigItem);

					$zoomerMoreImagesContainerWrapper.append(
						$nextElementItem.append($nextElementLink)
					);

					ix++;

				}
		
			});

			if($morePhotosElements.length > 1){

				var $zoomerBigNextMore = $("<a />", {id: "zoomerBigNextMore"}).css({
					transform: "translateY(-50%)",
					position: "absolute",
					cursor: "pointer",
					right: "24px",
					height: "110px",
					width: "57px",
					top: "50%"
				});
				
				var $zoomerBigPrevMore = $("<a />", {id: "zoomerBigPrevMore"}).css({
					transform: "translateY(-50%)",
					position: "absolute",
					cursor: "pointer",
					height: "110px",
					width: "57px",
					left: "24px",
					top: "50%"
				});
			
				var $zoomerNextMore = $("<a />", {id: "zoomerNextMore"}).css({
					transform: "translateY(-50%)",
					position: "absolute",
					cursor: "pointer",
					right: "0px",
					height: "60px",
					width: "80px",
					top: "50%"
				});
				
				var $zoomerPrevMore = $("<a />", {id: "zoomerPrevMore"}).css({
					transform: "translateY(-50%)",
					position: "absolute",
					cursor: "pointer",
					height: "60px",
					width: "80px",
					left: "0px",
					top: "50%"
				});

				$imageContainer.append($zoomerBigPrevMore).append($zoomerBigNextMore);
				$zoomerMoreImagesContainerWrapper.append($zoomerNextMore).append($zoomerPrevMore);

			}
			
			$zoomerMoreImagesContainerWrapperElements = $zoomerMoreImagesContainerWrapper.find(".item");

			var $zoomerExitLink =  $("<a />", {href: "#", id: "zoomerExitLink"}).css({
				position: "absolute",
				right: "24px",
				top: "24px"
			});

			$body.append(
				$zoomer.append(
					$imageContainer.prepend($imageContainerSlider)
				).append(
					$zoomerMoreImagesContainer.append(
						$zoomerMoreImagesContainerWrapper
					)
				).append($zoomerExitLink)
			)
		
			setTimeout(function(){
				$zoomer.addClass("opened");
				// $body.css({overflow: "hidden"});
			}, 2);

			slideCarouselWidth = $imageContainerSlider[0].offsetWidth;
			slideElementsWidth = slideCarouselWidth / (slideElementsCount + 1);

			return event.preventDefault();

		};
		

		var closeZoomer = function(event){
			return event.preventDefault(
				// $("body").css({overflow: "auto"}).find("#zoomer").remove()
				$("#zoomer").remove()
			);
		};

		var nextSlide = function(event){

			if(++slidePosition > slideElementsCount){
				slidePosition = 0;
			}

			return event.preventDefault(
				slideMove(slidePosition)
			); // o_O
		};

		var prevSlide = function(event){

			if(--slidePosition < 0){
				slidePosition = slideElementsCount;
			}

			return event.preventDefault(
				slideMove(slidePosition)
			); // o_O
		};

		var nextSlideToEq = function(event){
			
			slidePosition = $(this).index();
			slideMove(slidePosition);
		
			return event.preventDefault();
		
		};

		var slideMove = function(eq){
			var nextSlidePosition = eq * 100;

			$imageContainerSlider.finish().animate({
				left: "-" + nextSlidePosition + "%"
			}, 300);
			
			changeActiveMoreElement(eq);
			
			return event.preventDefault();
		};

		var changeActiveMoreElement = function(eq){
			$zoomerMoreImagesContainerWrapperElements.removeClass("selected").eq(eq).addClass("selected");
		};

		var zoomerKeyControl = function(event){
			if ($("#zoomer").is(":visible")) {
				if (event.which == 37 || event.which == 40 && $("#zoomer").is(":visible")) {
					return event.preventDefault(prevSlide(event));
				} else if (event.which == 39 || event.which == 38 && $("#zoomer").is(":visible")) {
					return event.preventDefault(nextSlide(event));
				} else if (event.which == 27 && $("#zoomer").is(":visible")) {
					return event.preventDefault(closeZoomer(event));
				}
			}
		};

		var zoomerStartTouch = function(event){
			event.pageX = event.type == "touchstart" ? event.originalEvent.touches[0].pageX : event.pageX;
			carouselStartPosition = parseInt($imageContainerSlider.css("left"), 10);
			touchStartPosition = event.pageX;
			touchStartedFlag = true;
			return event.preventDefault();
		};

		var zoomerTouchMove = function(event){
			if(touchStartedFlag){
				event.pageX = event.type == "touchmove" ? event.originalEvent.touches[0].pageX : event.pageX;
				$imageContainerSlider.css("left", (carouselStartPosition - (touchStartPosition - event.pageX)) + "px");
			}
		};

		var zoomerTouchEnd = function(event){
			if(touchStartedFlag){
				var carouselCurrentPosition = parseInt($imageContainerSlider.css("left"), 10);
				
				touchStartedFlag = false;

				if(carouselCurrentPosition > 0){
					
					$imageContainerSlider.finish().animate({
						left: 0
					}, 200);
					changeActiveMoreElement(0);
				
				}
				else if(slideCarouselWidth - slideElementsWidth < Math.abs(carouselCurrentPosition)){
					
					$imageContainerSlider.animate({
						left: "-" + slideElementsCount * 100 + "%"
					}, 200);
					changeActiveMoreElement(slideElementsCount);

				}else{
					var carouselMoveDistance = carouselStartPosition - carouselCurrentPosition;

					if(Math.abs(carouselMoveDistance) > 60){
						if(Math.abs(carouselMoveDistance) == carouselMoveDistance){
							var calcCurrentMove = Math.ceil(Math.abs(carouselCurrentPosition) / slideElementsWidth);
						}else{
							var calcCurrentMove = Math.floor(Math.abs(carouselCurrentPosition) / slideElementsWidth);
						}
					}else{
						var calcCurrentMove = Math.ceil(Math.abs(carouselStartPosition) / slideElementsWidth);
					}

					$imageContainerSlider.finish().animate({
						left: "-" + calcCurrentMove * 100 + "%"
					}, 200);
					changeActiveMoreElement(calcCurrentMove);
				}
			}

		};

		$(window).on("resize", function(){
			if($zoomer){
				$imageContainerSlider.height($(window).height() - 120);
				slideCarouselWidth = $imageContainerSlider[0].offsetWidth;
				slideElementsWidth = slideCarouselWidth / (slideElementsCount + 1);
			}

		}); //resize magic

		$(document).on("click", "#zoomer #zoomerMoreImagesContainer .item", nextSlideToEq);		
		$(document).on("click", "#zoomerNextMore, #zoomerBigNextMore", nextSlide);
		$(document).on("click", "#zoomerPrevMore, #zoomerBigPrevMore", prevSlide);
		$(document).on("click", "#zoomerExitLink", closeZoomer);
		$(document).on("click", ".zoom", openZoomer);
		$(document).on("keydown", zoomerKeyControl);
	
		$(document).on("mousedown touchstart", "#imageContainerSlider", zoomerStartTouch);
		$(document).on("mousemove touchmove", zoomerTouchMove);
		$(document).on("mouseup touchend", zoomerTouchEnd);

	});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:82:"/local/components/dresscode/catalog.item/templates/detail/js/tags.js?1744840798778";s:6:"source";s:68:"/local/components/dresscode/catalog.item/templates/detail/js/tags.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){

	var showMore = function(event){

		//jquery vars
		var $this = $(this);
		var $tagItemsContainer = $this.parents(".detailTagsItems");
		var $tagItems = $tagItemsContainer.find('.detailTagsItem:not(".moreButton")');

		//other
		var lastLabel = $this.data("last-label");
		var currentLabel = $this.html();

		//check state
		if($this.hasClass("opened")){
			//hide
			$tagItems.removeClass("showAll");
		}

		//display all
		else{
			$tagItems.addClass("showAll");
		}

		//change label
		$this.html(lastLabel).data("last-label", currentLabel);
		$this.toggleClass("opened");

		//block actions
		return event.preventDefault();

	}

	//bind functions
	$(document).on("click", ".detailTagsItems .moreButtonLink", showMore);

});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:83:"/local/components/dresscode/catalog.item/templates/detail/js/plus.js?17448407985947";s:6:"source";s:68:"/local/components/dresscode/catalog.item/templates/detail/js/plus.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){

	//extented prices
	var reCalcPrice = function($qtyBox, currentQuantity){
		if(currentQuantity > 0){

			//price
			var $priceContainer = $("#catalogElement .mainTool .priceContainer .priceVal");

			//check for empty
			if($priceContainer.length > 0){
				var $priceContainerStr = $priceContainer.html().replace(/\d\.\d/g, '').replace(/[0-9]/g, '');
			}

			//discount
			var $discountContainer = $("#catalogElement .mainTool .price .discount");
			if($discountContainer.length > 0){
				var $discountContainerStr = $discountContainer.html().replace(/\d\.\d/g, '').replace(/[0-9]/g, '');
			}

			//economy
			var $economyContainer = $("#catalogElement .mainTool .price .economy");
			if($economyContainer.length > 0){
				var $economyContainerStr = $economyContainer.html().replace(/\d\.\d/g, '').replace(/[0-9]/g, '');
			}

			//get price object
			var obExtentedPrices = $qtyBox.data("extended-price");

			if(typeof obExtentedPrices != "undefined"){
				if(typeof obExtentedPrices == "string"){
					obExtentedPrices = $.parseJSON(obExtentedPrices);
				}
			}

			//check for empty object
			if(typeof obExtentedPrices == "object"){

				//each prices
				$.each(obExtentedPrices, function(index, nextValue){

					//check for empty quantity
					if(nextValue["QUANTITY_FROM"] != null || nextValue["QUANTITY_TO"] != null){

						//check for current quantity
						if((nextValue["QUANTITY_FROM"] == null || nextValue["QUANTITY_FROM"] != "" && currentQuantity >= nextValue["QUANTITY_FROM"]) && (nextValue["QUANTITY_TO"] == null || nextValue["QUANTITY_TO"] != "" && currentQuantity <= nextValue["QUANTITY_TO"])){
							
							//write price
							if(typeof nextValue["DISCOUNT_PRICE"] != "undefined"){
								$priceContainer.html(formatPrice(Number(nextValue["DISCOUNT_PRICE"]).toFixed(0)) + $priceContainerStr);
							}

							//write discount
							if(typeof nextValue["OLD_PRICE"] != "undefined"){
								$discountContainer.html(formatPrice(Number(nextValue["OLD_PRICE"]).toFixed(0)) + $discountContainerStr);
							}
							
							//write economy
							if(typeof nextValue["ECONOMY"] != "undefined"){
								$economyContainer.html(formatPrice(Number(nextValue["ECONOMY"]).toFixed(0)) + $economyContainerStr);
							}

						}
					}
				});
			}

		}
		return;
	};

	var addCartPlus = function(event){

		var $qtyBox = $("#catalogElement .secondTool .qtyBlock .qty");
		var $addCartBtn = $("#catalogElement .addCart.changeQty");

		var xCurrentQtyValue = Number($qtyBox.val());
		var xQtyStep = Number($qtyBox.data("step"));
		var xQtyExpression = Number((xCurrentQtyValue * 10 + xQtyStep * 10) / 10); //js magic .9999999

		var _enableTrace = $qtyBox.data("enable-trace");
		var _maxQuantity = Number($qtyBox.data("max-quantity"));

		var __qtyError = false;
		var xTmpExpression = 0;

		if(_enableTrace == "Y"){

			xTmpExpression = xQtyExpression;
			xQtyExpression = (xQtyExpression > _maxQuantity) ? _maxQuantity : xQtyExpression;

			if(xTmpExpression != xQtyExpression){
				__qtyError = true;
			}

		}

		$qtyBox.val(xQtyExpression);
		$addCartBtn.data("quantity", xQtyExpression);

		//extented prices
		reCalcPrice($qtyBox, xQtyExpression);

		//set or remove error
		__qtyError === true ? $qtyBox.addClass("error") : $qtyBox.removeClass("error");

		return event.preventDefault();

	};

	var addCartMinus = function(event){

		var $qtyBox = $("#catalogElement .secondTool .qtyBlock .qty");
		var $addCartBtn = $("#catalogElement .addCart.changeQty");

		var xCurrentQtyValue = Number($qtyBox.val());
		var xQtyStep = Number($qtyBox.data("step"));
		var xQtyExpression = Number((xCurrentQtyValue * 10 - xQtyStep * 10) / 10); //js magic .9999999

		var _enableTrace = $qtyBox.data("enable-trace");
		var _maxQuantity = Number($qtyBox.data("max-quantity"));

		var __qtyError = false;
		var xTmpExpression = 0;

		xQtyExpression = xQtyExpression > xQtyStep ? xQtyExpression : xQtyStep;

		if(_enableTrace == "Y"){

			xTmpExpression = xQtyExpression;
			xQtyExpression = (xQtyExpression > _maxQuantity) ? _maxQuantity : xQtyExpression;

			if(xTmpExpression != xQtyExpression){
				__qtyError = true;
			}

		}

		$qtyBox.val(xQtyExpression);
		$addCartBtn.data("quantity", xQtyExpression);

		//extented prices
		reCalcPrice($qtyBox, xQtyExpression);

		//set or remove error
		__qtyError === true ? $qtyBox.addClass("error") : $qtyBox.removeClass("error");

		return event.preventDefault();

	};

	var addCartChange = function(event){

		var $this = $(this);
		var $addCartBtn = $("#catalogElement .addCart.changeQty");

		var xCurrentQtyValue = $this.val();
		var xQtyStep = Number($this.data("step"));

		var _enableTrace = $this.data("enable-trace");
		var _maxQuantity = Number($this.data("max-quantity"));

		var __qtyError = false;
		var xTmpExpression = 0;

		if(xCurrentQtyValue.replace(/[^\d.]/gi, '') != xCurrentQtyValue){
			xCurrentQtyValue = xQtyStep;
		}else{
			xCurrentQtyValue = Number(xCurrentQtyValue);
		}

		xQtyExpression = Math.ceil(xCurrentQtyValue / xQtyStep) * xQtyStep;

		if(_enableTrace == "Y"){

			xTmpExpression = xQtyExpression;
			xQtyExpression = (xQtyExpression > _maxQuantity) ? _maxQuantity : xQtyExpression;

			if(xTmpExpression != xQtyExpression){
				__qtyError = true;
			}

		}

		$this.val(xQtyExpression);
		$addCartBtn.data("quantity", xQtyExpression);
		
		//extented prices
		reCalcPrice($this, xQtyExpression);

		//set or remove error
		__qtyError === true ? $this.addClass("error") : $this.removeClass("error");

	};

	$(document).on("click", "#catalogElement .qtyBlock .plus", addCartPlus);
	$(document).on("click", "#catalogElement .qtyBlock .minus", addCartMinus);
	$(document).on("change", "#catalogElement .qtyBlock .qty", addCartChange);

});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:83:"/local/components/dresscode/catalog.item/templates/detail/js/tabs.js?17448407982444";s:6:"source";s:68:"/local/components/dresscode/catalog.item/templates/detail/js/tabs.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
	//global function
	var startElementTabs;
	
	$(function(){

		//vars
		var $window = $(window);
		var arCoordinates;
		var	$mainScrollObj;
		var	$tabElements;
		var	$tabs;

		//after page load
		$(window).on("load", function(){

			var scrollToElement = function(event){
				var $this = $(this).parents(".tab");
				var toElementID = $this.data("id");

				if(toElementID){

					$tabElements.removeClass("active");

					$mainScrollObj.stop().animate({
						scrollTop: getElementOffset("#" + toElementID) + "px"
					}, 250);

					return event.preventDefault($this.addClass("active"));
				}
			};

			var calcCloseElement = function(coordinate){
				var copyCoordinate = [];

				$.each(arCoordinates, function(i, val) {
					if(coordinate <= val){
						copyCoordinate.push({
							id: i, value: val
						})
					}
				});

				copyCoordinate.sort(function(obj1, obj2) {
				  if (obj1.value < obj2.value) return -1;
				  if (obj1.value > obj2.value) return 1;
				  return 0;
				});

				return copyCoordinate[0];
			};

			var scrollControl = function(event){
				var curScrollValueY = (event.currentTarget.scrollY) ? event.currentTarget.scrollY : $(window).scrollTop()
				var arCurrentTab = calcCloseElement(curScrollValueY);
				if(arCurrentTab != undefined){
					$tabElements.removeClass("active");
					$tabElements.filter('[data-id="' + arCurrentTab["id"] + '"]').addClass("active");
				}
			};

			var getElementOffset = function(getElement){

				//get jquery element
				var $curElement = $(getElement);

				//get element offset
				var elementOffset = $curElement.offset();

				//if not empty
				if(typeof(elementOffset) == "object"){
					return elementOffset.top;
				}
				
			}
			
			startElementTabs = function(){

				$tabs = $("#catalogElement .tabs");
				$tabElements = $tabs.find('.tab:not(".disabled")');
				$mainScrollObj = $("html, body");
				arCoordinates = {};

				$tabElements.each(function(i, nextElement){
					var $nextElement = $(nextElement);
					if($nextElement.data("id")){
						arCoordinates[$nextElement.data("id")] = getElementOffset("#" + $nextElement.data("id"));
					}
				});

			}

			//calc tabs
			startElementTabs();

			$(document).on("click", "#elementNavigation .tab a, #elementSmallNavigation .tab a", scrollToElement);
			$(window).on("scroll", scrollControl);

		});
	});

/* End */
;
; /* Start:"a:4:{s:4:"full";s:83:"/local/components/dresscode/catalog.item/templates/detail/js/sku.js?174484079819923";s:6:"source";s:67:"/local/components/dresscode/catalog.item/templates/detail/js/sku.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){

	var skuLoading = false;

	var elementSelectSku = function(event, ignoreLoading){

		if(skuLoading == true && typeof ignoreLoading == "undefined"){
			return false;
		}

		var _params = "";
		var _props = "";
		var _highload= "";
		var _requestStoresParams = "";

		var $_this = $(this);

		if(!$_this.parent().hasClass("selected")){

			var $_mProduct = $_this.parents(".elementSku");
			var $_mProductContainer = $_this.parents(".item");
			var $_parentProp = $_this.parents(".elementSkuProperty");
			var $_propList = $_mProduct.find(".elementSkuProperty");
			var $_clickedProp = $_this.parents(".elementSkuPropertyValue");
			var $changeFastBack = $_mProduct.find(".fastBack").removeClass("disabled");

			var _level = $_parentProp.data("level");

			$_this.parents(".elementSkuPropertyList").find("li").removeClass("selected");
			$_clickedProp.addClass("selected loading");
			$("#catalogElement").addClass("loading");

			skuLoading = true; //block

			$_propList.each(function(i, prop){

				var $_nextProp  = $(prop);
				var $_nextPropList = $_nextProp.find("li");

				var propName = $_nextProp.data("name");
				var _used = false;

				if($_nextProp.data("highload") == "Y"){
					_highload = _highload + propName + ";"
				}

				$_nextPropList.each(function(io, obj){
					var $_currentObj = $(obj);
					_props = _props + propName + ":" + $_currentObj.data("value") + ";";
					if($_currentObj.hasClass("selected")){
						_params = _params + propName + ":" + $_currentObj.data("value") + ";";
						return _used = true;
					}
				});

				if(!_used){
					_params = _params + propName + ":-forse;";
				}

			});

			if(typeof elementStoresComponentParams != "undefined"){
				_requestStoresParams = JSON.stringify(elementStoresComponentParams);
			}

			var sendObject = {
				"act": "selectSku",
				"props": _props,
				"params": _params,
				"level": _level,
				"iblock_id": $_mProduct.data("iblock-id"),
				"prop_id": $_mProduct.data("prop-id"),
				"product_id": $_mProduct.data("product-id"),
				"highload": _highload,
				"price-code": $_mProductContainer.data("price-code"),
				"stores_params": _requestStoresParams,
				"deactivated": $_mProduct.data("deactivated"),
			}

			$.ajax({
				url: elementAjaxPath,
				type: "POST",
				async : true,
				cache: false,
				data: sendObject,
				dataType: "json",
				success: skuProcessingResult,
				complete: function(){
					$_clickedProp.removeClass("loading");
					$_mProduct.removeClass("loading");
					skuLoading = false;
				}
			});

			function skuProcessingResult(jsonData){

				$_propList.each(function(pI, pV){
		  			var $_sf = $(pV);
		  				$_sf.data("level") > _level && $_sf.find(".elementSkuPropertyValue").removeClass("selected").addClass("disabled");
		  		});

				$.each(jsonData[1]["PROPERTIES"], function(name, val){
				  	var $_gPropList = $_propList.filter(function(){ return ($(this).data("name") == name); });
				  	var $_gPropListValues = $_gPropList.find(".elementSkuPropertyValue");
					$_gPropListValues.each(function(il, element){
						var $nextElement = $(element);
						$.each(val, function(pVal, _selected){
							if(pVal == $nextElement.data("value") && _selected != "D"){
								(_selected == "Y") ? $nextElement.addClass("selected").removeClass("disabled").trigger("click") : $nextElement.removeClass("disabled");
								return false;
							}
						});
					});
				});

				// pictures
				var countImages = 0;

				if(jsonData[0]["PRODUCT"]["IMAGES"]){

					for(var i in jsonData[0]["PRODUCT"]["IMAGES"]) {
						countImages = i;
					}

					// big slider vars
					var $pictureSlider = $("#pictureContainer .pictureSlider").empty();

					// small pictures slider
					var $moreImagesCarousel = $("#moreImagesCarousel").removeClass("hide");
					var $moreImagesCarouselSlideBox = $moreImagesCarousel.find(".slideBox");
					$moreImagesCarouselSlideBox.find(".item").remove();

					$.each(jsonData[0]["PRODUCT"]["IMAGES"], function(i, nextElement){

						var $sliderImage = $("<img />", {src: nextElement["MEDIUM_IMAGE"]["SRC"]});

						//big slider
						$pictureSlider.append(
							$("<div />", {class: "item"}).append(
								$("<a/>", {class: "zoom", href: nextElement["LARGE_IMAGE"]["SRC"]}).data("large-picture", nextElement["LARGE_IMAGE"]["SRC"]).data("small-picture", nextElement["SMALL_IMAGE"]["SRC"]).append(
									$sliderImage
								)
							)
						)

						if(countImages > 0){
							//small slider
							$moreImagesCarouselSlideBox.append(
								$("<div />", {class: "item"}).append(
									$("<a/>", {class: "zoom", href: nextElement["LARGE_IMAGE"]["SRC"]}).data("large-picture", nextElement["LARGE_IMAGE"]["SRC"]).append(
										$("<img />", {src: nextElement["SMALL_IMAGE"]["SRC"]})
									)
								)
							);
						}else{
							$moreImagesCarousel.addClass("hide");
						}
					});

					//addCart button reload
					changeAddCartButton(basketProductsNow);
					//subscribe button reload
					subscribeOnline();

					//apps
					startPictureElementSlider();
					startMorePicturesElementCarousel();
					createZoomer();

				}

				$_mProduct.find(".changeID").data("id", jsonData[0]["PRODUCT"]["ID"]).attr("data-id", jsonData[0]["PRODUCT"]["ID"]);
				$_mProduct.find(".changePicture").html($("<img/>").attr("src", jsonData[0]["PRODUCT"]["IMAGES"][0]["MEDIUM_IMAGE"]["SRC"]));
				$_mProduct.find(".changePropertiesNoGroup").html(jsonData[0]["PRODUCT"]["RESULT_PROPERTIES_NO_GROUP"]);
				$_mProduct.find(".changePropertiesGroup").html(jsonData[0]["PRODUCT"]["RESULT_PROPERTIES_GROUP"]);

				var $changeCart = $_mProduct.find(".changeCart").removeClass("subscribe unSubscribe");

				$changeCart.find("img").remove();
				if(jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"]){
					$changeCart.removeClass("added").removeClass("disabled").removeClass("requestPrice")
						.html(LANG["ADD_BASKET_DEFAULT_LABEL"])
						.prepend($("<img />").attr({src: TEMPLATE_PATH + "/images/incart.png", class: "icon"}))
						.attr("href", "#");
				}else{
					$changeFastBack.addClass("disabled");
					$changeCart.removeClass("added").addClass("disabled").addClass("requestPrice")
						.html(LANG["REQUEST_PRICE_BUTTON_LABEL"])
						.prepend($("<img />").attr({src: TEMPLATE_PATH + "/images/request.png", class: "icon"}))
						.attr("href", "#");
				}

				//AVAILABLE
				var $changeAvailable = $_mProduct.find(".eChangeAvailable");

				$changeAvailable.removeClass("getStoresWindow");
				$changeAvailable.removeClass("outOfStock");
				$changeAvailable.removeClass("onOrder");
				$changeAvailable.removeClass("inStock");
				$changeAvailable.removeAttr("href");

				if(jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"]){
					var $productChangePrice = $_mProduct.find(".changePrice").empty().removeClass("getPricesWindow").removeClass("requestPrice").removeAttr("href").data("id", jsonData[0]["PRODUCT"]["ID"]);
					var $productPriceVal = $("<span/>", {class: "priceVal"}).html(jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"]);
					var $productPriceContainer = $("<span/>", {class: "priceContainer"}).html($productPriceVal);
				}else{
					var $productChangePrice = $_mProduct.find(".changePrice").empty().removeClass("getPricesWindow").removeAttr("href").addClass("requestPrice").addClass("disabled").data("id", jsonData[0]["PRODUCT"]["ID"]);
					var $productPriceVal = $("<span/>", {class: "priceVal"}).html(LANG["REQUEST_PRICE_LABEL"]);
					var $productPriceContainer = $("<span/>", {class: "priceContainer"}).html($productPriceVal);

					jsonData[0]["PRODUCT"]["CAN_BUY"] = "N";
				}

				//remove bonus container
				$productChangePrice.find(".purchaseBonus").remove();

				if(jsonData[0]["PRODUCT"]["RESULT_PROPERTIES"]){
					$product.find(".changeProperties").html(jsonData[0]["PRODUCT"]["RESULT_PROPERTIES"]);
				}

				if(jsonData[0]["PRODUCT"]["COUNT_PRICES"] > 1){
					$productPriceContainer.prepend($("<span/>", {class: "priceIcon"}));
					$productChangePrice.addClass("getPricesWindow").attr("href", "#");
				}

				//write price container with price value
				$productChangePrice.html($productPriceContainer);

				if(jsonData[0]["PRODUCT"]["CATALOG_QUANTITY"] > 0){
					if(jsonData[0]["PRODUCT"]["STORES_COUNT"] > 1){
						$changeAvailable.html($("<span/>").html(LANG["CATALOG_AVAILABLE"])).addClass("inStock").attr("href", "#").addClass("getStoresWindow").data("id", jsonData[0]["PRODUCT"]["ID"]);
						$changeAvailable.prepend(
							$("<img/>").addClass("icon").attr("src", TEMPLATE_PATH + "/images/inStock.png")
						);
					}else{
						$changeAvailable.html(LANG["CATALOG_AVAILABLE"]).addClass("inStock");
						$changeAvailable.prepend(
							$("<img/>").addClass("icon").attr("src", TEMPLATE_PATH + "/images/inStock.png")
						);
					}
				}else{
					if(jsonData[0]["PRODUCT"]["CAN_BUY"] != "Y"){
						
						$changeAvailable.html(LANG["CATALOG_NO_AVAILABLE"]).addClass("outOfStock");
						$changeFastBack.addClass("disabled");
						
						if(jsonData[0]["PRODUCT"]["CATALOG_SUBSCRIBE"] == "Y" && jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"]){
							$changeCart.html(LANG["ADD_SUBSCRIBE_LABEL"])
								.prepend($("<img />").attr({src: TEMPLATE_PATH + "/images/subscribe.png", class: "icon"}))
								.attr("href", "#").addClass("subscribe");
						}

						else{
							$changeCart.addClass("disabled");
						}

						$changeAvailable.prepend(
							$("<img/>").addClass("icon").attr("src", TEMPLATE_PATH + "/images/outOfStock.png")
						);

					}else{
						$changeAvailable.html(LANG["CATALOG_ON_ORDER"]).addClass("onOrder");
						$changeAvailable.prepend(
							$("<img/>").addClass("icon").attr("src", TEMPLATE_PATH + "/images/onOrder.png")
						);
					}
				}

				//QTY BOX

				//get qty box ()
				var $qtyBox = $_mProduct.find(".qtyBlock .qty");

				//write values
				$qtyBox.val(jsonData[0]["PRODUCT"]["BASKET_STEP"]).data("max-quantity", jsonData[0]["PRODUCT"]["CATALOG_QUANTITY"]).data("step", jsonData[0]["PRODUCT"]["BASKET_STEP"]).removeClass("error");
				$qtyBox.removeAttr("data-extended-price").removeData("extended-price");

				$changeCart.data("quantity", jsonData[0]["PRODUCT"]["BASKET_STEP"]);

				if(typeof jsonData[0]["PRODUCT"]["PRICE"]["EXTENDED_PRICES_JSON_DATA"] != "undefined"){
					if(jsonData[0]["PRODUCT"]["PRICE"]["EXTENDED_PRICES_JSON_DATA"] != ""){
						$qtyBox.data("extended-price", jsonData[0]["PRODUCT"]["PRICE"]["EXTENDED_PRICES_JSON_DATA"]);
					}
				}

				if(jsonData[0]["PRODUCT"]["CATALOG_QUANTITY_TRACE"] == "Y" && jsonData[0]["PRODUCT"]["CATALOG_CAN_BUY_ZERO"] == "N"){
					$qtyBox.data("enable-trace", "Y");
				}else{
					$qtyBox.data("enable-trace", "N");
				}

				//stores component

				//storesTab
				var $storesTab = $_mProduct.find('.changeTabs .tab[data-id="stores"]').removeClass("active disabled");

				if(typeof jsonData[0]["PRODUCT"]["STORES_COMPONENT"] != "undefined" && jsonData[0]["PRODUCT"]["STORES_COMPONENT"] != ""){
					if($("div").is("#storesContainer")){
						//vars
						var $storesContainer = $("#storesContainer");
						//insert component html
						$storesContainer.html(jsonData[0]["PRODUCT"]["STORES_COMPONENT"]);
						//calc element tabs
						if (typeof startElementTabs === "function") { 
						    startElementTabs();
						}
						
					}
				}

				else{

					//clear
					$("#storesContainer").html("");
					$storesTab.addClass("disabled");

					//calc element tabs
					if (typeof startElementTabs === "function") { 
					    startElementTabs();
					}

				}

				//short description

				if(jsonData[0]["PRODUCT"]["PREVIEW_TEXT"]){
					$_mProduct.find(".changeShortDescription").html(jsonData[0]["PRODUCT"]["PREVIEW_TEXT"]);
				}else{
					if($_mProduct.find(".changeShortDescription").data("first-value")){
						$_mProduct.find(".changeShortDescription").html($_mProduct.find(".changeShortDescription").data("first-value"));
					}
				}

				// full description

				if(jsonData[0]["PRODUCT"]["DETAIL_TEXT"]){
					$_mProduct.find(".changeDescription").html(jsonData[0]["PRODUCT"]["DETAIL_TEXT"]);
				}else{
					if($_mProduct.find(".changeDescription").data("first-value")){
						$_mProduct.find(".changeDescription").html($_mProduct.find(".changeDescription").data("first-value"));
					}
				}

				//article

				if(typeof(jsonData[0]["PRODUCT"]["PROPERTIES"]["CML2_ARTICLE"]) != "undefined"){
					if(typeof(jsonData[0]["PRODUCT"]["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]) != "undefined" && jsonData[0]["PRODUCT"]["PROPERTIES"]["CML2_ARTICLE"]["VALUE"] !=""){
						$_mProduct.find(".changeArticle").html(jsonData[0]["PRODUCT"]["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]).parents(".article").removeClass("hidden");
					}else{
						if($_mProduct.find(".changeArticle").data("first-value")){
							$_mProduct.find(".changeArticle").html($_mProduct.find(".changeArticle").data("first-value"));
						}else{
							$_mProduct.find(".changeArticle").parents(".article").addClass("hidden");
						}
					}
				}


				if(jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"]){
					if($_mProduct.data("hide-measure") != "Y" && jsonData[0]["PRODUCT"]["MEASURE"] != undefined && jsonData[0]["PRODUCT"]["MEASURE"]["SYMBOL_RUS"] != ""){
						$productChangePrice.append(
							$("<span/>").addClass("measure").html(
								" / " + jsonData[0]["PRODUCT"]["MEASURE"]["SYMBOL_RUS"] + " "
							)
						);
					}
				}

				if(jsonData[0]["PRODUCT"]["PRICE"]["RESULT_PRICE"]["DISCOUNT"] > 0){
					
					$productPriceBlock = $("<span/>", {class: "priceBlock"});
					$productPriceBlock.append(
						$("<span/>").addClass("oldPriceLabel").html(
							$("<s/>").addClass("discount").html(
								jsonData[0]["PRODUCT"]["PRICE"]["RESULT_PRICE"]["BASE_PRICE"]
							)
						)
					);

					$productPriceBlock.append(
						$("<span/>").addClass("oldPriceLabel").html(" &nbsp; " + LANG["CATALOG_ECONOMY"]).append(
							$("<span/>").addClass("economy").html(
								jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRINT"]
							)
						)
					);

					//write discount
					$productChangePrice.prepend($productPriceBlock);

				}

				//bonus
				if(typeof jsonData[0]["PRODUCT"]["PROPERTIES"]["BONUS"] != "undefined" && jsonData[0]["PRODUCT"]["PROPERTIES"]["BONUS"]["VALUE"] != ""){
					var $purchaseBonus = $("<span />", {class: "purchaseBonus"}).html(jsonData[0]["PRODUCT"]["PROPERTIES"]["BONUS"]["NAME"]);
					var $purchaseBonusValue = $("<span />", {class: "theme-color"}).html("+ " + jsonData[0]["PRODUCT"]["PROPERTIES"]["BONUS"]["VALUE"]);
					$purchaseBonus.prepend($purchaseBonusValue);
					$productChangePrice.append($purchaseBonus);
				}
				
				//catalog set (complect) block

				if($("div").is("#set")){

					var $changePriceSet = $(".changePriceSet").html(jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"]);
					if(jsonData[0]["PRODUCT"]["PRICE"]["RESULT_PRICE"]["DISCOUNT"] > 0){
						$changePriceSet.append(
							$("<s/>").addClass("discount").html(
								jsonData[0]["PRODUCT"]["PRICE"]["RESULT_PRICE"]["BASE_PRICE"]
							)
						);
					}

					//j vars
					var $setProductContainer = $("#set");
					var $setMainElements = $setProductContainer.find('.setMainElement:not(".disabled")');
					var $setPrice = $("#setPrice");
					var $setDisnt = $("#setDisnt");

					//n vars
					var setPriceValue = 0;
					var setPriceDiscountValue = 0;

					//str vars
					var tmpPriceLabel = $setPrice.html().replace(/[0-9]/g, '');
					var tmpDisntLabel = $setDisnt.html().replace(/[0-9]/g, '');

					var changePriceValue = parseInt(jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"].replace(/[^0-9]/g, ''));

					$setProductContainer.find(".general.setElement").data("price", changePriceValue).data("discount", jsonData[0]["PRODUCT"]["PRICE"]["RESULT_PRICE"]["DISCOUNT"]);

					$setMainElements.each(function(i, nextElement){
						var $nextElement = $(nextElement);
						setPriceValue += parseInt($nextElement.data("price"));
						setPriceDiscountValue += parseInt($nextElement.data("price")) + parseInt($nextElement.data("discount"));
					});

					$setPrice.html(
						formatPrice(setPriceValue) + tmpPriceLabel
					);

					$setDisnt.html(
						formatPrice(setPriceDiscountValue) + tmpDisntLabel
					);

					if(setPriceDiscountValue == 0){
						$setDisnt.hide();
					}else{
						$setDisnt.show();
					}

				}

				if($("div").is("#setWindow")){

					// catalog set window
					var $setWindowContainer = $("#setWindow");
					var $setWindowElements = $setWindowContainer.find('.setWindowElement:not(".disabled")');
					var $setWindowPrice = $("#setWPrice");
					var $setWindowDisnt = $("#setWDisnt");

					//n vars
					var setWindowPriceValue = 0;
					var setWindowPriceDiscountValue = 0;

					//str vars
					var tmpPriceWindowLabel = $setWindowPrice.html().replace(/[0-9]/g, '');
					var tmpDisntWindowLabel = $setWindowDisnt.html().replace(/[0-9]/g, '');

					var changePriceValue = parseInt(jsonData[0]["PRODUCT"]["PRICE"]["DISCOUNT_PRICE"].replace(/[^0-9]/g, ''));

					$setWindowContainer.find("#wProduct").data("price", changePriceValue).data("discount", jsonData[0]["PRODUCT"]["PRICE"]["RESULT_PRICE"]["DISCOUNT"]);

					$setWindowElements.each(function(i, nextElement){
						var $nextElement = $(nextElement);
						setWindowPriceValue += parseInt($nextElement.data("price"));
						setWindowPriceDiscountValue += parseInt($nextElement.data("price")) + parseInt($nextElement.data("discount"));
					});

					$setWindowPrice.html(
						formatPrice(setWindowPriceValue) + tmpPriceLabel
					);

					$setWindowDisnt.html(
						formatPrice(setWindowPriceDiscountValue) + tmpDisntLabel
					);

					if(setWindowPriceDiscountValue == 0){
						$setWindowDisnt.hide();
					}else{
						$setWindowDisnt.show();
					}
				}

				$(".changeName").html(jsonData[0]["PRODUCT"]["NAME"]);
				$(".cheaper-product-name").html(jsonData[0]["PRODUCT"]["NAME"]);

			}

		}

		event.preventDefault();

	}

	var openSkuDropDown = function(event){

		//vars
		var $this = $(this);
		var $dropList = $this.siblings(".skuDropdownList");

		//show list
		$dropList.toggleClass("opened");

		//opened flag
		skuDropdownOpened = $dropList.hasClass("opened");

		return event.preventDefault();

	};

	var selectSkuDropDownValue = function(event){

		//vars
		var $this = $(this);
		var $dropList = $this.parents(".skuDropdownList");
		var $dropListItems = $dropList.find(".skuDropdownListItem").removeClass("selected");
		var $checkedItem = $dropList.siblings(".skuCheckedItem");

		//hide list
		$dropList.removeClass("opened");

		//opened flag
		skuDropdownOpened = false;

		//active
		$this.addClass("selected");

		//write value
		$checkedItem.html($this.text());

		//
		return event.preventDefault();

	};

	var closeSkuDropDown = function(event){

		//if opened
		if(skuDropdownOpened){

			//close
			$(".skuDropdownList").removeClass("opened");

			//opened flag
			skuDropdownOpened = false;
		}

	};

	//skuDropDown
	$(document).on("click", ".elementSkuDropDownProperty .skuCheckedItem", openSkuDropDown);
	$(document).on("click", ".elementSkuDropDownProperty .skuDropdownListItem", selectSkuDropDownValue);
	$(document).on("click", ".skuDropdown", function(event){event.stopImmediatePropagation()});
	$(document).on("click", closeSkuDropDown);

	//sku select
	$(document).on("click", ".elementSkuPropertyLink", elementSelectSku);

});
/* End */
;
; /* Start:"a:4:{s:4:"full";s:99:"/local/templates/dresscodeV2/components/bitrix/sale.products.gift/.default/script.js?17448407994924";s:6:"source";s:84:"/local/templates/dresscodeV2/components/bitrix/sale.products.gift/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
(function() {
	'use strict';

	if (!!window.JCSaleProductsGiftComponent)
		return;

	window.JCSaleProductsGiftComponent = function(params) {
		this.formPosting = false;
		this.siteId = params.siteId || '';
		this.template = params.template || '';
		this.componentPath = params.componentPath || '';
		this.parameters = params.parameters || '';

		this.container = document.querySelector('[data-entity="' + params.container + '"]');
		this.currentProductId = params.currentProductId;

		if (params.initiallyShowHeader)
		{
			BX.ready(BX.delegate(this.showHeader, this));
		}

		if (params.deferredLoad)
		{
			BX.ready(BX.delegate(this.deferredLoad, this));
		}

		BX.addCustomEvent(
			'onCatalogStoreProductChange',
			BX.delegate(function(offerId){
				offerId = parseInt(offerId);

				if (this.currentProductId === offerId)
				{
					return;
				}

				this.currentProductId = offerId;
				this.offerChangedEvent();
			}, this)
		);
	};

	window.JCSaleProductsGiftComponent.prototype =
	{
		offerChangedEvent: function()
		{
			this.sendRequest({action: 'deferredLoad', offerId: this.currentProductId});
		},

		deferredLoad: function()
		{
			this.sendRequest({action: 'deferredLoad'});
		},

		sendRequest: function(data)
		{
			var defaultData = {
				siteId: this.siteId,
				template: this.template,
				parameters: this.parameters
			};

			BX.ajax({
				url: this.componentPath + '/ajax.php' + (document.location.href.indexOf('clear_cache=Y') !== -1 ? '?clear_cache=Y' : ''),
				method: 'POST',
				dataType: 'json',
				timeout: 60,
				data: BX.merge(defaultData, data),
				onsuccess: BX.delegate(function(result){
					if (!result || !result.JS)
					{
						this.hideHeader();
						BX.cleanNode(this.container);
						return;
					}

					BX.ajax.processScripts(
						BX.processHTML(result.JS).SCRIPT,
						false,
						BX.delegate(function(){this.showAction(result, data);}, this)
					);
				}, this)
			});
		},

		showAction: function(result, data)
		{
			if (!data)
				return;

			switch (data.action)
			{
				case 'deferredLoad':
					this.processDeferredLoadAction(result);
					break;
			}
		},

		processDeferredLoadAction: function(result)
		{
			if (!result)
				return;

			this.processItems(result.items);
		},

		processItems: function(itemsHtml)
		{
			if (!itemsHtml)
				return;

			var processed = BX.processHTML(itemsHtml, false),
				temporaryNode = BX.create('DIV');

			var items, k, origRows;

			temporaryNode.innerHTML = processed.HTML;

			origRows = this.container.querySelectorAll('[data-entity="items-row"]');
			if (origRows.length)
			{
				BX.cleanNode(this.container);
				this.showHeader(false);
			}
			else
			{
				this.showHeader(true);
			}

			items = temporaryNode.querySelectorAll('[data-entity="items-row"]');
			for (k in items)
			{
				if (items.hasOwnProperty(k))
				{
					items[k].style.opacity = 0;
					this.container.appendChild(items[k]);
				}
			}

			new BX.easing({
				duration: 1000,
				start: {opacity: 0},
				finish: {opacity: 100},
				transition: BX.easing.makeEaseOut(BX.easing.transitions.quad),
				step: function(state){
					for (var k in items)
					{
						if (items.hasOwnProperty(k))
						{
							items[k].style.opacity = state.opacity / 100;
						}
					}
				},
				complete: function(){
					for (var k in items)
					{
						if (items.hasOwnProperty(k))
						{
							items[k].removeAttribute('style');
						}
					}
				}
			}).animate();

			BX.ajax.processScripts(processed.SCRIPT);
		},

		showHeader: function(animate)
		{
			var parentNode = BX.findParent(this.container, {attr: {'data-entity': 'parent-container'}}),
				header;

			if (parentNode && BX.type.isDomNode(parentNode))
			{
				header = parentNode.querySelector('[data-entity="header"');

				if (header && header.getAttribute('data-showed') === 'false')
				{
					header.style.display = '';

					if (animate)
					{
						this.animation = new BX.easing({
							duration: 2000,
							start: {opacity: 0},
							finish: {opacity: 100},
							transition: BX.easing.makeEaseOut(BX.easing.transitions.quad),
							step: function(state){
								header.style.opacity = state.opacity / 100;
							},
							complete: function(){
								header.removeAttribute('style');
								header.setAttribute('data-showed', 'true');
							}
						});
						this.animation.animate()
					}
					else
					{
						header.style.opacity = 100;
					}
				}
			}
		},

		hideHeader: function()
		{
			var parentNode = BX.findParent(this.container, {attr: {'data-entity': 'parent-container'}}),
				header;

			if (parentNode && BX.type.isDomNode(parentNode))
			{
				header = parentNode.querySelector('[data-entity="header"');

				if (header)
				{
					if (this.animation)
					{
						this.animation.stop();
					}

					header.style.display = 'none';
					header.style.opacity = 0;
					header.setAttribute('data-showed', 'false');
				}
			}
		}
	}
})();
/* End */
;
; /* Start:"a:4:{s:4:"full";s:93:"/local/templates/dresscodeV2/components/bitrix/form.result.new/modal/script.js?17448407994903";s:6:"source";s:78:"/local/templates/dresscodeV2/components/bitrix/form.result.new/modal/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(function(){

	var $modalForms = $(".webformModal");

	var sendWebForm = function(event, data){

		var formData = new FormData(this);
		var requiredErrorPosition = false;
		var requiredError = false;

		var $thisForm = $(this).addClass("loading");
		var $parentThis = $thisForm.parents(".webFormDwModal");
		var $thisFormFields = $thisForm.find(".webFormItemField");
		var $thisFormErrors = $thisForm.find(".webFormItemError");
		var $submitButton = $thisForm.find('input[type="submit"]').addClass("loading");
		var $webFormError = $thisForm.find(".webFormError");
		var $webFormCaptchaSid = $thisForm.find(".webFormCaptchaSid");
		var $webFormCaptchaImage = $thisForm.find(".webFormCaptchaImage");

		var formId = $parentThis.data("id");

		$thisFormFields.each(function(i, nextField){

			var $nextField = $(nextField);
			if($nextField.data("required") == "Y"){
				var $nextFieldEx = $nextField.find('input[type="text"], input[type="password"], input[type="file"], select, textarea');
				if($nextFieldEx.attr("name")){
					if(!$nextFieldEx.val() || $nextFieldEx.val().length == 0){
						$nextFieldEx.addClass("error");
						if(!requiredError){
							requiredErrorPosition = $nextFieldEx.offset().top;
							requiredError = true;
						}
					}
				}

			}
		});

		var $personalInfo = $thisForm.find(".personalInfoField");
		if(!$personalInfo.prop("checked")){
			$personalInfo.addClass("error");
			requiredError = true;
		}

		if(requiredError == false){
	  		$.ajax({
	  			url: webFormAjaxDir + "?FORM_ID=" + formId + "&SITE_ID=" + webFormSiteId,
	  			data: formData,
			    cache: false,
		        contentType: false,
		        processData: false,
		        enctype: "multipart/form-data",
		        type: "POST" ,
		        dataType: "json",
	  			success: function(response){

	  				//remove error labels
	  				$thisFormErrors.empty().removeClass("visible");
	  				$webFormError.empty().removeClass("visible");

		  			if(response["SUCCESS"] != "Y"){

			  			//set errors
			  			$.each(response["ERROR"], function(nextId, nextValue){
			  				var $errorItemContainer = $("#WEB_FORM_ITEM_" + nextId);
			  				if(nextId != 0 && $errorItemContainer){
			  					$errorItemContainer.find(".webFormItemError").html(nextValue).addClass("visible");
			  				}else{
			  					$webFormError.append(nextValue).addClass("visible");
			  				}
			  			});

			  			// reload captcha
			  			if(response["CAPTCHA"]){
							$webFormCaptchaSid.val(response["CAPTCHA"]["CODE"]);
							$webFormCaptchaImage.attr("src", response["CAPTCHA"]["PICTURE"]);
						}

					}else{
						$("#webFormMessage_" + formId).css({
							display: "block"
						});
						$(".webformModal").removeClass("visible");
						$thisForm[0].reset();
					}

		  			//remove loader
		  			$thisForm.removeClass("loading");
		  			$submitButton.removeClass("loading");

		  		}

	  		});
	  	}else{
	  		
	  		// if(requiredErrorPosition){
	  		// 	$("html, body").animate({
	  		// 		"scrollTop": requiredErrorPosition - $(window).height() / 2
	  		// 	}, 250);
	  		// }

	  		$thisForm.removeClass("loading");
	  		$submitButton.removeClass("loading");
	  	}

		return event.preventDefault();

	}

	var removeErrors = function(event){
		$(this).removeClass("error");
	};

	var webFormExit = function(event){
		$(".webFormMessage").hide();
		return event.preventDefault();
	}

	var openWebFormModal = function(event){

		var $thisForm = $("#webFormDwModal_" + $(this).data("id"));
		var $thisFormCn = $thisForm.find(".webformModalContainer");

		$thisForm.addClass("visible");

		if($thisFormCn.height() < $(window).height()){
			$thisForm.addClass("small");
		}

		return event.preventDefault();

	}

	var closeWebFormModal = function(event){
		$(this).parents(".webformModal").removeClass("visible");
		return event.preventDefault();
	};

	var checkFormsHeight = function(event){

		//get window height now
		var windowHeightNow = $(this).height();

		//get web forms
		$modalForms.each(function(i, nextForm){

			//vars
			var $nextForm = $(nextForm);
			var $nextFormCn = $nextForm.find(".webformModalContainer");

			//class change
			if($nextFormCn.height() < windowHeightNow){
				$nextForm.addClass("small");
			}else{
				$nextForm.removeClass("small");
			}

		});
	}

	$(document).on("focus", ".webFormItemField input, .webFormItemField select, .webFormItemField textarea", removeErrors);
	$(document).on("click", ".webFormModalHeadingExit", closeWebFormModal);
	$(document).on("click", ".openWebFormModal", openWebFormModal);
	$(document).on("click", ".webFormMessageExit", webFormExit);
	$(document).on("submit", ".webFormDwModal form", sendWebForm);

	if($modalForms.length > 0){
		$(window).on("resize", checkFormsHeight);	
	}

});
/* End */
;; /* /local/templates/dresscodeV2/components/bitrix/catalog/.default/script.js?17448407991080*/
; /* /local/components/dresscode/catalog.item/templates/detail/script.js?174484079811647*/
; /* /local/components/dresscode/catalog.item/templates/detail/js/morePicturesCarousel.js?17448407981882*/
; /* /local/components/dresscode/catalog.item/templates/detail/js/pictureSlider.js?17448407981606*/
; /* /local/components/dresscode/catalog.item/templates/detail/js/zoomer.js?174484079811150*/
; /* /local/components/dresscode/catalog.item/templates/detail/js/tags.js?1744840798778*/
; /* /local/components/dresscode/catalog.item/templates/detail/js/plus.js?17448407985947*/
; /* /local/components/dresscode/catalog.item/templates/detail/js/tabs.js?17448407982444*/
; /* /local/components/dresscode/catalog.item/templates/detail/js/sku.js?174484079819923*/
; /* /local/templates/dresscodeV2/components/bitrix/sale.products.gift/.default/script.js?17448407994924*/
; /* /local/templates/dresscodeV2/components/bitrix/form.result.new/modal/script.js?17448407994903*/
