function boot(){

	fixViewport();
	initNavPC();
	initNavMobile();
	
	if (!ismobile()) {}

}




function fixViewport() {

	var metas = document.getElementsByTagName('meta');
	if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
		for (i=0; i<metas.length; i++) {
			if (metas[i].name == "viewport") {metas[i].content = "width=640, user-scalable=no";}
		}
	}

	var metas = document.getElementsByTagName('meta');
	if (navigator.userAgent.match(/iPad/i)) {
		for (i=0; i<metas.length; i++) {
			if (metas[i].name == "viewport") {metas[i].content = "width=1024, user-scalable=no";}
		}
	}

	if (navigator.userAgent.match(/android/i)) {
		for (i=0; i<metas.length; i++) {
			if (metas[i].name == "viewport") {metas[i].content = "width=640, target-densityDpi=285, user-scalable=no";}  //for galaxy s4 & google nexus
		}  
	}

	//document.addEventListener("gesturestart", gestureStart, false);  //vertical fix, in case

}



function gestureStart() {

	if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
		for (i=0; i<metas.length; i++) {
			if (metas[i].name == "viewport") {metas[i].content = "width=720";}
		}
	}
	if (navigator.userAgent.match(/android/i)) {

		for (i=0; i<metas.length; i++) {
			if (metas[i].name == "viewport") {metas[i].content = "width=1280, target-densityDpi=device-dpi";}
		}  
	}

}




function ismobile() {

	var ismobile = (/iphone|ipod|android|blackberry|opera mini|wpdesktop|opera mobi|skyfire|maemo|windows phone|palm|iemobile|symbian|symbianos|fennec/i.test(navigator.userAgent.toLowerCase()));
	//alert(navigator.userAgent);
	if(ismobile) return true;
	else return false;

}




function istablet()  {

	var istablet = (/ipad|android 3|sch-i800|playbook|tablet|kindle|gt-p1000|sgh-t849|shw-m180s|a510|a511|a100|dell streak|silk/i.test(navigator.userAgent.toLowerCase()));
	if ((/tablet pc/i.test(navigator.userAgent.toLowerCase()))) {istablet = false;}
	if(istablet) return true;
	else return false;

}




function isIEMobile() {
    var regExp = new RegExp("WPDesktop", "i");
	//alert(navigator.userAgent);
    if (navigator.userAgent.match(regExp) == "WPDesktop")
    {
		return true;
    }
	else
	{
		return false;
	}
}




function initBCMainSlider() {

	$("#bc_main_slider1").iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		keyboardControls: true,
		navNextSelector: $("#bc_main_slider1_next"),
		navPrevSelector: $("#bc_main_slider1_prev"),
	});

	$("#bc_main_slider2").iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		keyboardControls: true,
		navNextSelector: $("#bc_main_slider2_next"),
		navPrevSelector: $("#bc_main_slider2_prev"),
	});

	$("#bc_main_slider3").iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		keyboardControls: true,
		navNextSelector: $("#bc_main_slider3_next"),
		navPrevSelector: $("#bc_main_slider3_prev"),
	});

	$("#bc_main_tab2").hide();
	$("#bc_main_tab3").hide();

	$("#bc_main_tablink  li").eq(0).click(function(){

		$("#bc_main_tabpanel").removeClass("bc_main_tabpanel_select1").removeClass("bc_main_tabpanel_select2").removeClass("bc_main_tabpanel_select3");
		$("#bc_main_tabpanel").addClass("bc_main_tabpanel_select1");
		$("#bc_main_tablink  li").removeClass("selected");
		$(this).addClass("selected");
		$(".bc_main_tab").hide();
		$("#bc_main_tab1").show();

	});

	$("#bc_main_tablink  li").eq(1).click(function(){

		$("#bc_main_tabpanel").removeClass("bc_main_tabpanel_select1").removeClass("bc_main_tabpanel_select2").removeClass("bc_main_tabpanel_select3");
		$("#bc_main_tabpanel").addClass("bc_main_tabpanel_select2");
		$("#bc_main_tablink  li").removeClass("selected");
		$(this).addClass("selected");
		$(".bc_main_tab").hide();
		$("#bc_main_tab2").show();

	});

	$("#bc_main_tablink  li").eq(2).click(function(){

		$("#bc_main_tabpanel").removeClass("bc_main_tabpanel_select1").removeClass("bc_main_tabpanel_select2").removeClass("bc_main_tabpanel_select3");
		$("#bc_main_tabpanel").addClass("bc_main_tabpanel_select3");
		$("#bc_main_tablink  li").removeClass("selected");
		$(this).addClass("selected");
		$(".bc_main_tab").hide();
		$("#bc_main_tab3").show();

	});


}




function initCSMainMasonry(){

	var columnWidth = 320;
	if (ismobile()) columnWidth = 540;

	$('#cs_main_container').imagesLoaded( function(){ // preload images

		$('#cs_main_container').masonry({
			columnWidth: columnWidth,
			itemSelector: '.item',
			isAnimated: true,
			isResizable: true,
		});

	});

}





function initCRMainSlider() {

	$(".unippt_slider").iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		keyboardControls: true,
		navNextSelector: $("#cr_main_slider .next").eq(0),
		navPrevSelector: $("#cr_main_slider .prev").eq(0),
	});

}





function initMRMainSlider() {

	$(".unippt_slider").iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		keyboardControls: true,
		navNextSelector: $("#mr_main_slider .next").eq(0),
		navPrevSelector: $("#mr_main_slider .prev").eq(0),
	});

}





function initMainAnimation(){


	window.scrollTo(0,0);
	//$("#skrollr-body").css("opacity",0);
	
	if (!isIEMobile()){
	
		var s = skrollr.init({

			smoothScrolling: true,
			forceHeight: true,
			render: function() {

				//$("#loading").delay(2000).fadeOut(400);
				//$("#skrollr-body").delay(1500).css("opacity",1);

			}

		});	
	
	}

}






function IEVersion(){ 
	var v = 3, div = document.createElement('div'), all = div.getElementsByTagName('i'); 
	while ( 
	div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->', 
	all[0] 
	); 
	return v > 4 ? v : false ; 
}






// GNB PC
function initNavPC(){

	$("header nav li a").each(function(index){
	
		$("header nav li a").eq(index).hover(

			function(){

				//$("#gnb_submenu").stop(true,true).animate({"height":"59px"},400);
				$("#gnb_pc_submenu table").hide();
				$("#gnb_pc_submenu"+ (index+1)).show();

			},
			function(){
				//$("#gnb_submenu").css("opacity","1").delay(600).animate({"height":"0px"},400);
			}

		);	
	
	});

	$("#gnb_pc").hover(

		function(){$("#gnb_pc_submenu").stop(true,true).animate({"height":"59px"},400);},
		function(){
				
			$("#gnb_pc_submenu").css("opacity","1").delay(500).animate({"height":"0px"},400);
				
		}
		
	);

	$("#gnb_pc_submenu").hover(

		function(){$("#gnb_pc_submenu").stop(true,true).animate({"height":"59px"},400);},
		function(){
				
			$("#gnb_pc_submenu").css("opacity","1").delay(500).stop(true,true).animate({"height":"0px"},400);
				
		}
		
	);

}





// GNB Mobile
function initNavMobile(){

	$("#gnb_mobile_btn").click(function(){
	
		$("#gnb_mobile_submenu").show();
	
	});

	$("#gnb_mobile_submenu span").eq(0).click(function(){
	
		$("#gnb_mobile_submenu").hide();
	
	});


}





// Main Key Visual Slider
function initMainSlider(){

	$("#main_kv_slider").iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		keyboardControls: true,
		navNextSelector: $(".main_kv_container .next").eq(0),
		navPrevSelector: $(".main_kv_container .prev").eq(0),
		autoSlide: true,
		infiniteSlider: true,
		navSlideSelector: ".main_kv_container .slideSelectors .item",
		onSlideComplete: slideComplete,
		onSliderLoaded: sliderLoaded,
		onSlideChange: slideChange,
	});

}


function slideChange(args) {
			
	$('.main_kv_container .slideSelectors .item').removeClass('selected');
	$('.main_kv_container .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');

}

function slideComplete(args) {
	
	if(!args.slideChanged) return false;
	
}

function sliderLoaded(args) {
		
	slideChange(args);
	
}

/*教育榜单*/

function initEduList(){

	$(".edu_block").css("height","0px");
	$(".edu_block").eq(0).css("height","auto");
	$(".edu_detail h4").eq(0).attr("class","minus");

	$(".edu_detail h4").eq(0).on("click", function(){
		$(".edu_detail h4").removeClass("minus");
		$(this).attr("class","minus");
	
		$(".edu_block").stop().animate({"height":"0px"},500, function(){
			$(".edu_block").eq(0).stop().animate({"height":"1834px"},500,function(){
				 	$("body").scrollTo('#block1',500); 
			});		
		});
		
	});

	$(".edu_detail h4").eq(1).on("click", function(){
		$(".edu_detail h4").removeClass("minus");
		$(this).attr("class","minus");
		
		$(".edu_block").stop().animate({"height":"0px"},500, function(){
			$(".edu_block").eq(1).stop().animate({"height":"1834px"},500,function(){
				 	$("body").scrollTo('#block2',500); 
			});		
		});
	});

	$(".edu_detail h4").eq(2).on("click", function(){
		$(".edu_detail h4").removeClass("minus");
		$(this).attr("class","minus");
		
		$(".edu_block").stop().animate({"height":"0px"},500, function(){
			$(".edu_block").eq(2).stop().animate({"height":"1834px"},500,function(){
				 	$("body").scrollTo('#block3',500); 
			});		
		});
	});

	$(".edu_detail h4").eq(3).on("click", function(){
		$(".edu_detail h4").removeClass("minus");
		$(this).attr("class","minus");
		
		$(".edu_block").stop().animate({"height":"0px"},500, function(){
			$(".edu_block").eq(3).stop().animate({"height":"1834px"},500,function(){
				 	$("body").scrollTo('#block4',500); 
			});		
		});
	});

	$(".edu_detail h4").eq(4).on("click", function(){
		$(".edu_detail h4").removeClass("minus");
		$(this).attr("class","minus");
		
		$(".edu_block").stop().animate({"height":"0px"},500, function(){
			$(".edu_block").eq(4).stop().animate({"height":"1834px"},500,function(){
					$("body").scrollTo('#block5',500); 
			});		
		});
	});



}

function initFashionList(){

	 $(".fashion_detail").eq(3).children("div").hide();
	 $(".fashion_detail").eq(4).children("div").hide();
	 $(".fashion_detail").eq(5).children("div").hide();
     $(".fashion_detail").eq(6).children("div").hide();
     $(".fashion_detail").eq(7).children("div").hide();
     $(".fashion_detail").eq(8).children("div").hide();
	  $(".fashion_detail").eq(2).children("h2").addClass("hover");

$(".fashion_detail h2").click(function(){
		
		var id=$(this).attr("class"); 

		  var num=id.substr(8);
		 
		  var n=Number(num);
		
		  $(this).siblings("div").slideDown("slow");
		  $(this).addClass("hover");
		  for(i=1;i<8;i++){
			  if(i!=n){
		   $(".fashion_detail h2.fashion_"+i).siblings("div").slideUp("slow");
		   $(".fashion_detail h2.fashion_"+i).removeClass("hover");
		   
		   }
		   }
		})

}
		
