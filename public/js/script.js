function confirmDelete(message, delUrl) {

  if (confirm(message)) {

    document.location = delUrl;

  }

}



function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}



function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}



function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}



function MM_swapImage2() { //v3.0

  var i,j=0,x,a=MM_swapImage2.arguments; document.MM_sr2=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr2[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}



function MM_swapImgRestore2() { //v3.0

  var i,x,a=document.MM_sr2; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}



function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}



function MM_showHideLayers() { //v9.0

  var i,p,v,obj,args=MM_showHideLayers.arguments;

  for (i=0; i<(args.length-2); i+=3) 

  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];

    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }

    obj.visibility=v; }

}





jQuery.fn.exists = function(){return this.length>0;}



$(document).ready(function(){

	if($("#search_value").exists()){

		$("#search_value").focus(function(){

			if($("#search_value").val() == "- Enter Keyword -"){

				$("#search_value").val("");

				$("#search_value").removeClass("search_input").addClass("search_input_focus");

			}

		});

		$("#search_value").focusout(function(){

			if($("#search_value").val() == ""){

				$("#search_value").val("- Enter Keyword -");

				$("#search_value").removeClass("search_input_focus").addClass("search_input");

			}

		});

	}

	 

	if($("#submenu").exists()){

		$("#submenu").hoverIntent({    

		 over: showSubmenu,   

		 timeout: 1000,

		 out: hideSubmenu

		});

	}

	

	// for weird IE 7

	$(".divIEfix").each(function(index){

		$(this).width($(this).width());

	});

});





var spinnerVisible = false;



function showProgress() {

    if (!spinnerVisible) {

        $("div#spinner").fadeIn("fast");

        spinnerVisible = true;

    }

};



function hideProgress() {

    if (spinnerVisible) {

        var spinner = $("div#spinner");

        spinner.stop();

        spinner.fadeOut();

        spinnerVisible = false;

    }

};



function updateCartInfo(numItems, total){

	$("#cart_count").html(numItems);

	$("#cart_total").html("S$ "+ total.toFixed(2));

	$("#cart_total_box").effect("shake", {times:2, distance:5}, 100);

	// if ($(window).scrollTop() > $("#cart_total_box").offset().top - 5) {

	// 	$('html, body').animate({scrollTop: $("#cart_total_box").offset().top - 5}, 200);

	// }

	$("#step4_added").slideDown();

	$("#step4_add").slideUp();

	$("#step4_added_again").slideUp();

}



function updateCartInfoAgain(numItems, total){

	$("#cart_count").html(numItems);

	$("#cart_total").html("S$ "+ total.toFixed(2));

	$("#cart_total_box").effect("shake", {times:2, distance:5}, 100);

	// if ($(window).scrollTop() > $("#cart_total_box").offset().top - 5) {

	// 	$('html, body').animate({scrollTop: $("#cart_total_box").offset().top - 5}, 200);

	// }

	$("#step4_added_again").slideDown();

	$("#step4_added").slideUp();

}



function showSubmenu(){

	 $("#submenu").css("visibility","visible");

	 MM_swapImage('Image2','','img/menu2o.png',1);

}



function hideSubmenu(){

	 $("#submenu").css("visibility","hidden");

	 MM_swapImgRestore();

}



function showSubmenu2(){

	 $("#submenu2").css("display","");

	 MM_swapImage('Image3','','img/menu3o.png',1);

}



function hideSubmenu2(){

	 $("#submenu2").css("display","none");

	 MM_swapImgRestore();

}



function changeProductColor(colorId){

	currentProductColorId = colorId;

	currentProductColor = productColors[colorId];

	$("#product_image").attr("src", currentProductColor[1]);

	$("#product_color").html(currentProductColor[0]);

	if(!currentProductColor[0]){

		$("#product_color_div").css("display","none");

	}

	updateProductPrice();

	for(var i = 0; i<productColors.length; i++){

		if(i == colorId){

			//$("#product_color_icon_"+i).css("border", "solid 1px #ee1a2e");

			//$("#product_color_icon_"+i).css("padding", "0px");

			$("#product_color_text_"+i).css("background-color", "#eeeeee");

			$("#product_selected_"+i).css("visibility", "visible");

			

		}else{

			//$("#product_color_icon_"+i).css("border", "none");

			//$("#product_color_icon_"+i).css("padding", "1px");

			$("#product_color_text_"+i).css("background-color", "#ffffff");		

			$("#product_selected_"+i).css("visibility", "hidden");

		}

	}

}



function updateProductPrice(){

	var quantity = parseInt($("#quantity").val());

	$("#product_quantity").html(quantity);

	var productPrice = currentProductColor[2].toFixed(2);

	var discountedProductPrice = currentProductColor[4].toFixed(2);

	if (discountedProductPrice == productPrice) {

		$("#product_price").html("S$ "+productPrice);

	}else{

		$("#product_price").html("<span class='removedPrice'>S$ "+productPrice+"</span> &nbsp; S$ "+discountedProductPrice);

	}

	var productPrice2 = (quantity * discountedProductPrice).toFixed(2);
	productPrice2 = productPrice2.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	$("#product_cost").html("S$" + productPrice2);

}



function toggleCategoryMenu(itemId){

	if($("#category_submenu_"+itemId).is(":hidden")){

		$("#category_submenu_"+itemId).slideDown();

	}else{

		$("#category_submenu_"+itemId).slideUp();

	}

}



//dojo.require("dijit.Tooltip");

//dojo.require("dijit.Dialog");



function deliverymethodchange(element){

	document.getElementById('delivery_note').innerHTML = "No delivery charge";

	if(element.selectedIndex == 0){

		document.getElementById('deliverytimetbl').style.display = '';

		document.getElementById('addresstbl').style.display = '';

		var total = document.getElementById('total').value;
		
		document.getElementById('delivery_note').innerHTML = "<br/><font color='#FF0000'>Additional delivery fee applies for delivery. Please <a href='content.php?p=17' target='_new'>contact us</a> to find out the delivery fee if you require delivery to your location.</font>";


		/* disable min order note. change 0 to min order amount to enable. */
		if(total < 0){

			document.getElementById('delivery_note').innerHTML = "<br/>For orders below $100, there will be an additional delivery charge of $15 per trip <input type='hidden' name='deliveryCharge' id='deliveryCharge' value='15' />";

		}

	}else{

		document.getElementById('deliverytimetbl').style.display = 'none';

		document.getElementById('addresstbl').style.display = 'none';

	}

}



function sameasaboveClicked(){

	if(document.getElementById("sameasabove").value == "on"){

		document.getElementById("delivery_country").value = document.getElementById("country").value;
		document.getElementById("delivery_state").value = document.getElementById("state").value;
		document.getElementById("delivery_city").value = document.getElementById("city").value;
		
		document.getElementById("delivery_block").value = document.getElementById("block").value;

		document.getElementById("delivery_unit").value = document.getElementById("unit").value;

		document.getElementById("delivery_street").value = document.getElementById("street").value;

		document.getElementById("delivery_postalcode").value = document.getElementById("postalcode").value;

	}

}



function editCartItem(cartItemId){

	w=open('product.php?cartItemId='+cartItemId, "3M_Nomad_Car_Mat", "height=700,width=850,modal=yes,alwaysRaised=yes,scrollbars=yes");

}



function get_radio_value(element)

{

for (var i=0; i < element.length; i++)

   {

   if (element[i].checked)

      {

      var rad_val = element[i].value;

      }

   }

   return rad_val;

}





var scrollingIndex = 0;

var numThumbs;



function productThumbScrollRight(){

	var offset = 343;

	

	scrollingIndex -= 1;

	

	if(scrollingIndex > 0){

		$('#product_thumb_left').show();

	}else{

		$('#product_thumb_left').hide();

	}

	if(scrollingIndex < numThumbs - 3){

		$('#product_thumb_right').show();

	}else{

		$('#product_thumb_right').hide();

	}

	

	$('#product_thumb_content').animate({

		left: '+=' + offset

	  }, 500, function() {

 	});

}



function productThumbScrollLeft(){

	var offset = -343;

	

	scrollingIndex += 1;



	if(scrollingIndex > 0){

		$('#product_thumb_left').show();

	}else{

		$('#product_thumb_left').hide();

	}

	if(scrollingIndex < numThumbs - 3){

		$('#product_thumb_right').show();

	}else{

		$('#product_thumb_right').hide();

	}

	

	$('#product_thumb_content').animate({

		left: '+=' + offset

	  }, 500, function() {

 	});

}



function initScrollingProductThumbs(){

	$(function() {

		numThumbs = $('#product_thumb_content div.category').length;

		scrollingIndex = 0;

		$('#product_thumb_left').hide();

		if(numThumbs < 4){

			$('#product_thumb_right').hide();

		}

	});

}



function search_input_keydown(e){

	if(e.keyCode == 13){

		submitSearchInput();

	}

}



function submitSearchInput(){

	if($('#search_value').val() != ''){

		window.location = "products_search.php?keywords="+$('#search_value').val();

	}else{

		alert('Please enter search keywords');

	}

}



function advancedSearchToggleBtnClicked(){

	if($('#advancedSearchPane').is(':hidden')){

		showAdvancedSearchPane();

	}else{

		hideAdvancedSearchPane();

	}

}



function hideAdvancedSearchPane(){

	$('#advancedSearchPane').slideUp();

}



function showAdvancedSearchPane(){

	$('#advancedSearchPane').slideDown();

}



function advancedSearchFormSubmit(){

	if(($('#search_value').val() != '- Enter Keyword -') && ($('#search_value').val() != '')){

		var advancedQuery = "";

		if($('#advanced_category_check').is(':checked')){

			advancedQuery += "&category=" + $('#advanced_category_select').val(); 

		}

		if($('#advanced_price_check').is(':checked')){

			advancedQuery += "&price=" + $('#advanced_price_select').val(); 

		}

		window.location = "products_search.php?keywords="+$('#search_value').val() + advancedQuery;

		return false;

	}else{

		alert('Please enter search keywords');

		return false;

	}

}





function setBannerImgByIndex(index){

	bannerWaitCount = 0;

	displayingBannerIndex = index;

	$('<img />').load(function() {

		$('#banner-img1').hide();

		$('#banner-img1').css('background-image', 'url('+banners[index]+')').show();

		$('#banner-img2').fadeOut('slow', function(){

			$('#banner-img2')

				.css('background-image', 'url('+banners[index]+')')

				.show();

		});

	}).attr('src', banners[index]);

}



var displayingBannerIndex = 0;

var bannerWaitCount = 0;



function rotateBanner(){

	bannerWaitCount++;

	if(bannerWaitCount == 8){

		displayingBannerIndex++;

		if(displayingBannerIndex == banners.length) displayingBannerIndex = 0;

		setBannerImgByIndex(displayingBannerIndex);

	}

	setTimeout(rotateBanner, 1000);

}



function banner_up_btn_clicked(){

	bannerWaitCount = 0;

	displayingBannerIndex--;

	if(displayingBannerIndex < 0) displayingBannerIndex = banners.length -1;

	setBannerImgByIndex(displayingBannerIndex);

}



function banner_down_btn_clicked(){

	bannerWaitCount = 0;

	displayingBannerIndex++;

	if(displayingBannerIndex == banners.length) displayingBannerIndex = 0;

	setBannerImgByIndex(displayingBannerIndex);

}