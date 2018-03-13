/////////////首頁
$(function() {
	//首頁廣告輪播
	$("#index_banner").each(function(){	
		var owl = $(this);
		owl.owlCarousel({ 
			items : 1,
			navigation:true,
			scrollPerPage : true,
			slideSpeed : 500,
			paginationSpeed : 500,
			rewindNav: true,	
			autoPlay : 7000,
			stopOnHover : true,
		});
	});		
	//便當列表(3個)
	$(".gallery-index .owl-carousel").each(function(){
		var owl = $(this);
		owl.owlCarousel({ 
			items : 3,
			rewindNav: false,
			navigation:true,
			scrollPerPage : true,
			slideSpeed : 500,
			paginationSpeed : 500,
		});
	});
//食材ICON滑動
	$("#index-recentbooks").each(function(){
		var owl = $(this);
		owl.owlCarousel({ 
    	items : 7,
		rewindNav: false,
    	navigation:true,
		scrollPerPage : true,
		slideSpeed : 500,
		paginationSpeed : 500,

		});
	});	
	//當季食材滑動
    $('.boxgrid.captionfull').hover(function() {
        $(".searchResultContent1 h2", this).css("color", "#94b93c");
        $("p", this).css("color", "#999999");
        $(".cover", this).stop().animate({
            top: '65px'
        }, {
            queue: false,
            duration: 200
        });
    }, function() {
        $(".searchResultContent1 h2", this).css("color", "");
        $("p", this).css("color", "");
        $(".cover", this).stop().animate({
            top: '120px'
        }, {
            duration: 300,
            easing: 'easeOutBounce'
        });
    });	
});

/////////////產品頁使用
$(function() {
	//產品頁-：展開、關閉功能
	$("#author_introduction .about").each(function() {
		var sb = $(this).height();
		if (sb > 160) {
			$(this).addClass("close");
			$(this).after("<div class='more'></div>");
			var more = $("#author_introduction .more");
			more.click(function() {
				$(this).prev(".about").toggleClass("close");
			});
		}
	});
	
	//產品頁-可能會喜歡&瀏覽紀錄
	//var owl = $("#slider");
	//owl.owlCarousel({
    $(".blockMain.tab .owl-carousel").each(function(){
        $(this).owlCarousel({
    	   items : 5,
		  rewindNav: false,
    	   navigation:true,
		  scrollPerPage : true,
		  slideSpeed : 500,
		  paginationSpeed : 500,
	   });
    });
	
    //產品頁-tab左右切換 
    $(".blockMain.tab h3 span").click(function(){ 
        $($(this).parent("h3").find(".on")).removeClass('on');
        $(this).parent("h3").nextAll("div").hide();
        $(this).addClass("on");
        $('.' + $(this).attr("id") + 'content').show();          
    });
});