//version new
// JavaScript Document

//ON LOAD
jQuery(window).bind("load", function () {

    var wrapper_width = $('#wrapper').width()
    var wrapper_height = $('#wrapper').height()

    //MENU
    $('#mainMenu a.trigger_menu').click(function () {

        vertical_align($(this), 'menu')


    })

    //ARROW NAV HIDE/SHOW
    var item_length = $('.apple_overlay  .i_length').length
    if (item_length > 1) {

        $('.i_nav .prev').show()
        $('.i_nav .next').show()
		

    } else {

        $('.i_nav .prev').hide()
        $('.i_nav .next').hide()
		
    }

    //alert(item_length)

    //SECOND LEVEL
    $('#secondMenu li a').click(function () {

        $('#secondMenu li a').removeClass('selected')
        $(this).toggleClass('selected')
    })

    //THIRD LEVEL
    $('#thirdMenu li a').click(function () {

        $('#thirdMenu li a').removeClass('selected')
        $(this).toggleClass('selected')
    })


    //BRAND NEWS
    $('.openBrand').css({ 'left': wrapper_width - 22 })
    $('#trigger_news').css({ 'height': wrapper_height })

    var over_news = function () {
        $(this).stop().animate({ 'left': wrapper_width - 44 }, 800, 'easeOutQuad')
    }

    var out_news = function () {
        $(this).stop().animate({ 'left': wrapper_width - 22 }, 800, 'easeOutQuad')
    }

    $('.openBrand').bind({ 'mouseover': over_news, 'mouseout': out_news })

    $('#trigger_news').click(function () {

        $('#trigger_news').parent().addClass('openBrand')
        $('.openBrand').unbind({ 'mouseover': over_news, 'mouseout': out_news })

        if ($(this).hasClass('opened')) {

            $(this).parent().stop().animate({ 'left': wrapper_width - 22 }, 1200, 'easeOutQuad', function () {
                $(this).find('#trigger_news').removeClass('opened')
                $('.openBrand').bind({ 'mouseover': over_news, 'mouseout': out_news })
            })

        } else {

            $(this).parent().stop().animate({ 'left': 0 }, 1200, 'easeOutQuad', function () {
                $(this).find('#trigger_news').addClass('opened');
				
				var item_length = $('#hub .din_content .list_item').length
				var result_length = $('.result_side .content_side').length
				
				
				if((item_length == 0) && (result_length == 0) ){
					brandNewsSearch(0);
				}else{
					
					//null	
				}
				
            })

        }

    })

    //CHOOSE LANGUAGES
    $('.chooseLanguages, .sanPellegrinoWorld').hover(function(){

    $(this).find('.list').fadeIn(500).show()
    },function(){
    $(this).find('.list').hide()
    })

    //LOGIN BOX
    $('#makeLogin a.login_trigger').click(function () {

        if ($(this).hasClass('opened')) {

            $(this).parent().animate({ 'right': '-440px' }, 1200, 'easeOutQuad', function () {
                $(this).find('a.login_trigger').removeClass('opened')
            })

        } else {

            $(this).parent().animate({ 'right': 0 }, 1200, 'easeOutQuad', function () {
                $(this).find('a.login_trigger').addClass('opened')
            })
        }

    })

    //HIGHLIGHT
    $('a#trigger_highlight').click(function () {

        if ($(this).hasClass('opened')) {

            $(this).parent().animate({ 'top': '-24px' }, 1200, 'easeOutQuad', function () {
                $(this).find('a#trigger_highlight').removeClass('opened')
                $(this).find('a#trigger_highlight').addClass('closed')
            })

        } else {

            $(this).parent().animate({ 'top': '-114px' }, 1200, 'easeOutQuad', function () {
                $(this).find('a#trigger_highlight').addClass('opened')
                $(this).find('a#trigger_highlight').removeClass('closed')
            })
        }
    })

    //V SCROLL
    $('.scrollbar_content').tinyscrollbar({ sizethumb: 21 });

    //HIGHLIGHT
    var api_highlight = $('#highlight_scroll').scrollable({ speed: 1400})

    //GALLERY
    //var api_gallery = $('#scroll_gallery').scrollable({circular:true})

    //STORY
    var api_story = $('#story').scrollable({ speed: 1400})

    //LIST
    var api_list = $('#list').scrollable({ speed: 1400})

    //GALLERY OVERLAY
    try {
        var api_overlay = $("#overlay_scroll").scrollable({ speed: 1400})
    } catch (apiX) {
    }

    //ICON BOTTLE
    $('.display_image a span').css({ 'display': 'none' })

    var array_content_text = { work: [{ h2: '#title_intro', load_text: '#text_intro', images: '#intro' }, { h2: '#title_tappo', load_text: '#text_tappo', images: '#tappo' }, { h2: '#title_bollo', load_text: '#text_bollo', images: '#bollo' }, { h2: '#title_etichetta', load_text: '#text_etichetta', images: '#etichetta'}] }

    //BIND TRIGGER
    var over_image_icon = function () {
        $(this).find('span').fadeIn()
    }

    var out_image_icon = function () {
        $(this).find('span').fadeOut()
    }

    $('.display_image a').bind({ 'mouseover': over_image_icon, 'mouseleave': out_image_icon })

    $('.display_image a').click(function(){
		
		$('.display_image a').not(this).find('span').fadeOut()
		$('.display_image a').not(this).bind({ 'mouseover': over_image_icon, 'mouseleave': out_image_icon })
		$(this).unbind({ 'mouseover': over_image_icon, 'mouseleave': out_image_icon })
		
		var position_arrow = $(this).css('top')
		$('img.arrow_indice').stop().animate({'top':position_arrow},500)
		
		var index_evidenzia = $(this).index()
		var index_content_h2 = array_content_text.work[index_evidenzia].h2
        var index_content_message = array_content_text.work[index_evidenzia].load_text
        var index_content_images = array_content_text.work[index_evidenzia].images
		
		var url_message = '/gallery.html ' + index_content_message
        var url_images = '/gallery.html ' + index_content_images
		var url_title = '/gallery.html ' + index_content_h2
		
		$('.textual h2').empty()
        $('.textual .overview').empty()
        $('.image_side').empty()
		
		 $('.textual h2').load(url_title)
		 $('.textual .overview').load(url_message, function(){
			
			$('.textual').tinyscrollbar({ sizethumb: 21 });
			$('.textual').tinyscrollbar_update();
		
		})
		
        $('.image_side').load(url_images)
	
	})

    //VERTICAL ALIGN
    vertical_align($('#mainMenu a.trigger_menu'), "index")

})

function vertical_align(menu, where) {
    if (menu.find('span').hasClass('close')) {
        //menu.next().css({'display':'none'})
        menu.find('span').removeClass('close')
    } else {
        //menu.next().css({'display':'block'})
        menu.find('span').addClass('close')
    }
    var time
    var wrapper_content_height = $('#mainMenu').parent().height()
    var wrapper_menu_height = $('#mainMenu').height()
    var wrapper_article_height = $('#side_content').height();
    var top_menu = (wrapper_content_height - wrapper_menu_height) / 2
    if (where == 'index') { time = 0; $('#mainMenu').animate({ 'top': top_menu }, time) } else {
        time = 1200;
        menu.next().slideToggle(120, function () {
            var wrapper_content_height = $('#mainMenu').parent().height()
            var wrapper_menu_height = $('#mainMenu').height()
            var wrapper_article_height = $('#side_content').height();
            var top_menu = (wrapper_content_height - wrapper_menu_height) / 2
            $('#mainMenu').animate({ 'top': top_menu }, time)
        })
    }
    //alert(top)
} 

//ON RESIZE
jQuery(window).bind("resize", function() {

	var wrapper_width = $('#wrapper').width()
	var wrapper_height = $('#wrapper').height()
	
	$('#brandNews').css({'left': wrapper_width-22})
	$('#trigger_news').css({'height': wrapper_height})
	$('#trigger_news').removeClass('opened')
	
	//BRAND NEWS
	var over_news= function(){
		$(this).stop().animate({'left':wrapper_width - 44},800,'easeOutQuad')	
	}

	
	var out_news= function(){
		$(this).stop().animate({'left':wrapper_width - 22},800,'easeOutQuad')	
	}
	
	$('#brandNews').bind({'mouseover' : over_news, 'mouseout' : out_news})
	
	$('#trigger_news').click(function(){
									  
		$('#brandNews').unbind({'mouseover' : over_news, 'mouseout' : out_news})
		
		if($(this).hasClass('opened')){
			
			$(this).parent().stop().animate({'left': wrapper_width-22 },1200,'easeOutQuad',function(){
				$(this).find('#trigger_news').removeClass('opened')							  
				$('#brandNews').bind({'mouseover' : over_news, 'mouseout' : out_news})
			})
			
		}else{
			
			$(this).parent().stop().animate({'left':0},1200,'easeOutQuad',function(){						  
				$(this).find('#trigger_news').addClass('opened')
			})
		
		}
		
	})
	
	//$('#overlay').css({'left':'50%','margin-left':'-350px', 'top':'50%', 'margin-top':'-226px'})

})


var this_id
var this_alt
var index
var itmes
var counter

standardLoadOverlayGallery = function () {
    //OVERLAYER GALLERY

    //remove the old galleries before moving the new ones
    $("#aspnetForm > #bngallery").detach();
    $("#aspnetForm > #bnvideo").detach();

    $("#aspnetForm").append($("div.overlay"));

    $("a[rel]").click(function () {

        this_id = $(this).find('img').attr('itemid')

    })

    $("a[rel], .item_counter img").overlay({
		
		
        mask: {
            color: '#000000',
            loadSpeed: 200,
            opacity: 0.9
        },
        fixed: true,
        left: '50%',
        top: '50%',
        onClose: function () {
            //var api_timeline = $("#overlay_scroll").scrollable()
            //api_timeline.seekTo(0, 0)

            //$('#overlay').css({'left':'50%','margin-left':'-350px', 'top':'50%', 'margin-top':'-226px'})
        },

        onBeforeLoad: function () {
			
			$('#overlay_scroll .items').css('visibility','hidden')
            $('#overlay_scroll .item').each(function () {

                this_alt = $(this).find('img').attr('itemid')
                
                if (this_id == this_alt) {

                index = $(this).index()

                }
				
				
            })
			
	
        },

        onLoad: function () {
			
            var api_timeline = $("#overlay_scroll").scrollable({ speed: 1400 })
            var api_timeline_2 = $(".addgallery").scrollable({ speed: 1400 })
			
			
			try {
				
                api_timeline.seekTo(index, 0)
				$('#overlay_scroll .items').css('visibility','visible')
				
				api_timeline_2.seekTo(0, 0)
				$(".addgallery").css('visibility','visible')
				
            } catch (stdloadovex) {
            }
			
        }

    });
}