<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?php echo $type['title'] ?>-<?php echo $GLOBALS['S']['title'] ?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<meta name="keywords" content="<?php echo $GLOBALS['S']['keywords'] ?> " />
<meta name="description" content="<?php echo $GLOBALS['S']['description'] ?> " />
<SCRIPT type=text/javascript src="<?php echo $GLOBALS['WWW'] ?>images/jQuery.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $GLOBALS['WWW'] ?>images/fade_image.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $GLOBALS['WWW'] ?>images/jquery.easing.1.3.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $GLOBALS['WWW'] ?>images/jquery.tinyscrollbar.min.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $GLOBALS['WWW'] ?>images/jquery.pager.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $GLOBALS['WWW'] ?>images/function.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $GLOBALS['WWW'] ?>images/utils.js"></SCRIPT>
<LINK rel=stylesheet href="<?php echo $GLOBALS['WWW'] ?>images/style.css" media=screen>
<LINK rel=stylesheet href="<?php echo $GLOBALS['WWW'] ?>images/fonts.css" media=screen>
<LINK rel=stylesheet type=text/css href="<?php echo $GLOBALS['WWW'] ?>images/v_scroll.css" media=all>
<LINK rel=stylesheet type=text/css href="<?php echo $GLOBALS['WWW'] ?>images/overlay.css" media=all>
<!-- GA -->
<SCRIPT type=text/javascript>

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-20279737-2']);
        _gaq.push(['_trackPageview']);
        //_gaq.push(['_trackPageloadTime']);

        

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </SCRIPT>
<!-- / GA -->
<SCRIPT type=text/javascript>
    $(document).ready(function () {

        var this_id
        var this_alt
        var index

        $("a[rel]").click(function () {

            this_id = $(this).find('img').attr('itemid')

        })

        //OVERLAYER GALLERY
        $("a[rel]").overlay({

            mask: {
                color: '#000000',
                loadSpeed: 200,
                opacity: 0.9
            },
            fixed: true,
            left: '50%',
            top: '50%',
            onClose: function () {

                var api_timeline = $("#overlay_scroll").scrollable()
                api_timeline.seekTo(0, 0)
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

                var api_timeline = $("#overlay_scroll").scrollable()
                api_timeline.seekTo(index, 0)
				$('#overlay_scroll .items').css('visibility','visible')
                
            }

        });



    });	
	
</SCRIPT>

<SCRIPT type=text/javascript>
            trackEventFromFlash = function (category, action, label, value) {
              //  var val = _gaq.push(['_trackEvent', category, action, label]);
            } 
    </SCRIPT>

<META name=GENERATOR content="MSHTML 8.00.6001.19328"></HEAD>
<BODY><!-- ET --><!-- / ET -->
<!-- gallery per overlay -->
<DIV id=overlay class="apple_overlay i_nav"><A class=close></A><!-- the external content is loaded inside this tag -->
<DIV class=contentWrap>
<DIV id=action_scroll_overlay><A class="prev browse"></A><A 
class="next browse"></A></DIV>
<DIV id=overlay_scroll class=scrollable>
<DIV class=items>
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(18)  order by id asc  limit 0,16");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<DIV class="item i_length"><IMG 
alt="<?php echo $v['title'] ?>" src="<?php echo $v['bigpic'] ?>" 
itemid="<?php echo $v['id'] ?>"> 
<DIV style="FONT-SIZE: 12px" class=footer_image><?php echo $v['description'] ?></DIV></DIV>
<?php } ?>
</DIV>

</DIV></DIV></DIV><!--OVERLAYER--><!--OVERLAYER-->
<DIV id=wrapper>
<!--BRAND NEWS-->
<SCRIPT type=text/javascript>
    $(document).ready(function () {
        $('.list_items').each(function () {
            $(this).find('.list_item:last').css({ 'margin-right': '0px' })
        })


        $('input[name="category"]:checked').removeAttr('checked')
        
        //brandNewsSearch(0);

        var idnews = getParameterByName("onc");
		var viewid = getParameterByName("v");
        if (idnews) {
            //show the layer            
            
            showLayer();
            //loadthenews
            setTimeout('brandNewsLoad(' + viewid + ')', 1000);
            //brandNewsLoad(idnews);
        }

        bnLoadOverlayGallery();

    })

    showLayer = function () {
        $('#trigger_news').trigger('click');
    }

    backToSearch = function () {
        showSearch();
    }

    showSearch = function () {
        $('#news').hide();
        $('#hub').show();
        $('#wait').hide();
		$('#wait span.loading').text("")

    }

    showDetail = function () {
        $('#news').show();
        $('#hub').hide();
        $('#wait').hide();
		$('#wait span.loading').text("")

    }

    showWait = function () {
        $('#news').hide();
        $('#hub').hide();
        $('#wait').show();
		$('#wait span.loading').text("loading contents")

    }

    showPage = function (i) {
        $('.page').hide();
        $('.page').eq(i).show();
        $('#pager>.pagination>a').removeClass('selected');
        $('#pager>.pagination>a').eq(i).addClass('selected');
    }
    brandNewsSearch = function (pagenum) {
		if (!$('#trigger_news').hasClass('opened')) {
            showLayer();
        }
        if (pagenum<1)
		{
			pagenum=27;
		}
        //read the selected categories choices
        showWait();

        var queryData = "tid=" + pagenum;

        //Differenza tra siti di brand /pages/ap/ oppure /pages/sp/
        $.get('/index.php?c=article&a=type&' + queryData, function (data) {

            $('#hub .din_content').html(data);


            showSearch();

            //old loaditems
            $('.list_items').each(function () {

                $(this).find('.list_item:last').css({ 'margin-right': '0px' })
            })
            showPage(0);

        });
    }

    var bngaInstance;
    var bnvdInstance;

    bnLoadOverlayGallery = function () {
        //OVERLAYER GALLERY


        //remove the old galleries before moving the new ones
        $("#aspnetForm > #bngallery").detach();
        $("#aspnetForm > #bnvideo").detach();

        //Move the element as child of page form
        $("#aspnetForm").append($("div.overlay"));
        //$("#aspnetForm").append($("#bngallery"));
        //$("#aspnetForm").append($("#bnvideo"));

        //OVERLAYER GALLERY
        bngaInstance = $("#bngallery").overlay({
            api: true,
            mask: {
                color: '#000000',
                loadSpeed: 200,
                opacity: 0.9
                
            },
            left: '50%',
            top: '50%',
            fixed: true,
            onLoad: function () {
                try {
                    var api_timeline = $("#overlay_scroll").scrollable()
                } catch (x) {

                }
                //api_timeline.seekTo(index, 0)
            }

        });

        bnvdInstance = $("#bnvideo").overlay({
            api: true,
            mask: {
                color: '#000000',
                loadSpeed: 200,
                opacity: 0.9

            },
            left: '50%',
            top: '50%',
            fixed: true,
            onLoad: function () {
                try {
                    var api_timeline = $("#overlay_scroll").scrollable()
                } catch (x) {

                }
                //api_timeline.seekTo(index, 0)
            }

        });
    }

    brandNewsLoad = function (id) {
		
        if (!$('#trigger_news').hasClass('opened')) {
            showLayer();
        }

        showWait();
        //showWait();
        //Differenza tra siti di brand /pages/ap/ oppure /pages/sp/
        $.get('/index.php?c=article&id=' + id, function (data) {

            $('#news').html(data);

            showDetail();
			
            $('.scrollbar_content').tinyscrollbar({ sizethumb: 21 });

            if (!$('#trigger_news').hasClass('opened')) {
                showLayer();
            }

            bnLoadOverlayGallery();

        });

    }


</SCRIPT>

<DIV id=brandNews class=hub_bn>
<DIV id=trigger_news></DIV>
<DIV id=brand_container><!--FILTERS-->
<DIV class=filter_side>
<H2><img src="images/logo.png" /></H2>
<!-- <span class="update_date">Update 07/01/2013 7.29.16</span>
               <span class="close">chiudi bn</span> --><!--BRAND-->

<DIV class=filter>
<H3>栏目</H3><LABEL><INPUT onclick=brandNewsSearch(27) 
value=BN_EVENTS type=radio name=category>事件列表</LABEL> <LABEL><INPUT 
 onclick=brandNewsSearch(28) value=BN_NEWS type=radio  
name=category>合作伙伴</LABEL></DIV><!--END NATION--><!--GEO-->
<!--END GEO--></DIV><!--FILTERS--><!--RESULTS  HUB -->
<DIV id=hub class=result_side>
<H2>最新资讯</H2>
<DIV class=din_content>
<SCRIPT type=text/javascript>
    $(document).ready(function () {
        showPage(0);
    }
    );
</SCRIPT>
<!--LIST-->
<DIV class=list_results>
<!--NAVIGATION-->
<DIV id=pager class=navigation><!--PAGINATION--></DIV>
<!--END NAVIGATION-->
</DIV>
</DIV>
</DIV><!--END RESULTS--><!--RESULTS HUB -->
<DIV style="DISPLAY: none" id=news class=result_side><!-- DETAIL --></DIV>
<DIV style="DISPLAY: none" id=wait class=result_side><!--<h2>Loading contents....</h2>--><SPAN 
class=loading></SPAN>
<P><IMG style="MARGIN-TOP: 68px; MARGIN-LEFT: 131px" alt="Loading contents.." 
src="images/loading_background.gif"> </P></DIV></DIV><BR clear=all></DIV>
<!--END BRAND NEWS-->
<!--HEADER-->
<DIV id=header>
<DIV class=wrapper>
<!--CHOOSE LANGUAGES + SP WORLD -->
<!-- LangCountrySelector.ascx -->
<DIV class=side_languages>
<!--SANPELLEGRINOWPRLD-->
<DIV class=sanPellegrinoWorld><SPAN>请选择您的国家</SPAN> 
    <DIV style="DISPLAY: none" class=list>
    <?php $tablev=syClass("syModel")->syCache(3600)->findSql("select * from dy_links where isshow=1 and taid='2'  order by orders desc,id desc");foreach($tablev as $v){ $v["name"]=stripslashes($v["name"]); ?>
    <a href="<?php echo $v['gourl'] ?>" target="_blank"><?php echo $v['name'] ?></a>
    <?php } ?>
    </DIV>
</DIV>
<!--END SANPELLEGRINO WORLD-->
<!--choose language-->
<DIV class=chooseLanguages><SPAN>请选择您的语言</SPAN> 
    <DIV style="DISPLAY: none" class=list>
    <?php $tablev=syClass("syModel")->syCache(3600)->findSql("select * from dy_links where isshow=1 and taid='3'  order by orders desc,id desc");foreach($tablev as $v){ $v["name"]=stripslashes($v["name"]); ?>
    <a href="<?php echo $v['gourl'] ?>" target="_blank"><?php echo $v['name'] ?></a>
    <?php } ?>
    </DIV>
</DIV>
<!-- END CHOOSE LANGUAGES-->
<BR clear=all></DIV>
<!--END CHOOSE LANGUAGES-->
<!--END CHOOSE LANGUAGES + SP WORLD-->
<!--LOGIN + SOCIAL -->
<DIV class=side_login>
<!--SHARE-->
<A class=share_fb href="http://weibo.com/sanpellegrinochina"  target="_blank">关注我们 </A>
</DIV>
<!--END LOGIN + SOCIAL -->
</DIV>
</DIV>
<!--END HEADER-->
<!--MAIN CONTENT-->
<?php $tn=0;$tablet=syClass("syModel")->syCache(3600)->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  tid='2'  order by orders desc,tid");foreach($tablet as $t){ $t["tid_leafid"]=$sy_class_type->leafid($t["tid"]);$t["n"]=$tn=$tn+1; $t["classname"]=stripslashes($t["classname"]);$t["description"]=stripslashes($t["description"]); $t["url"]=html_url("classtype",$t); ?>
<DIV style="BACKGROUND-IMAGE: url(<?php echo $t['litpic'] ?>)" id=main_content>
<?php } ?>
<!--MAIN MENU--><!--SECOND LEVEL-->
<DIV id=mainMenu>
<H2><A href="/"><IMG 
title="" alt="San Pellegrino" 
src="images/logo.jpg"></A></H2>
<A class=trigger_menu><SPAN 
class=close>导航</SPAN></A> 
<OL class=list_voice>
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  mshow='1' and pid=0  order by orders desc,tid limit 6");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?>
  <LI><A href="<?php echo $v['url'] ?>" <?php if ($v['tid']==$type['tid']){ ?> class='selected'<?php } ?>  <?php if ($v['tid']==$type['pid']){ ?> class='selected'<?php } ?>><?php echo $v['classname'] ?></A></LI>
<?php } ?>
</OL>
<H3><IMG title="Live in Italian" alt="Live in Italian" 
src="images/payoff.jpg"></H3>
</DIV>
<!--END MAIN MENU-->
<!--CONTENT SIDE-->
<DIV id=side_content>
<!--SECOND LEVEL-->
<OL id=secondMenu>
  <?php $ytid=$type[tid];if(!syDB("classtype")->find(array("pid"=>2),null,"tid")){ $ypid=syDB("classtype")->find(array("tid"=>2),null,"pid");$type[tid]=$ypid[pid];} ?><?php $tn=0;$tablet=syClass("syModel")->syCache(3600)->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  pid='2'  order by orders desc,tid");$type[tid]=$ytid;foreach($tablet as $t){ $t["tid_leafid"]=$sy_class_type->leafid($t["tid"]);$t["n"]=$tn=$tn+1; $t["classname"]=stripslashes($t["classname"]);$t["description"]=stripslashes($t["description"]); $t["url"]=html_url("classtype",$t); ?>
  <LI><A  href="<?php echo $t['url'] ?>"<?php if($t['tid']==18){ ?> class=selected <?php } ?>><?php echo $t['classname'] ?></A></LI>
  <?php } ?>
  <BR clear=all>
</OL>
<!--END SECONDO LEVEL--><!--THIRD LEVEL-->

<!--END THIRD LEVEL--><!--CONTENT LOADER--><!--- contenuto pagina --->
<DIV class="article_content story">
<H1>回眸品牌大事记<SPAN></SPAN></H1><!--STORY ITEM-->
<DIV id=story_side class=i_nav><A class="browse prev"></A><A 
class="browse next"></A>
<DIV id=story class=scrollable>
<DIV class=items>
<DIV class="item i_length">
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(18)  order by id asc  limit 0,4");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<DIV class=year><A rel=#overlay><SPAN><IMG alt="<?php echo $v['title'] ?>" src="<?php echo $v['litpic'] ?>" 
itemid="<?php echo $v['id'] ?>" width=130 height="129"> </SPAN><?php echo $v['title'] ?></A></DIV>
<?php } ?>
</DIV>
<DIV class="item i_length">
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(18)  order by id asc  limit 4,4");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<DIV class=year><A rel=#overlay><SPAN><IMG alt="<?php echo $v['title'] ?>" src="<?php echo $v['litpic'] ?>" 
itemid="<?php echo $v['id'] ?>" width=130 height="129"> </SPAN><?php echo $v['title'] ?></A></DIV>
<?php } ?>
</DIV>
<DIV class="item i_length">
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(18)  order by id asc  limit 8,4");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<DIV class=year><A rel=#overlay><SPAN><IMG alt="<?php echo $v['title'] ?>" src="<?php echo $v['litpic'] ?>" 
itemid="<?php echo $v['id'] ?>" width=130 height="129"> </SPAN><?php echo $v['title'] ?></A></DIV>
<?php } ?>
</DIV>
<DIV class="item i_length">
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(18)  order by id asc  limit 12,4");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<DIV class=year><A rel=#overlay><SPAN><IMG alt="<?php echo $v['title'] ?>" src="<?php echo $v['litpic'] ?>" 
itemid="<?php echo $v['id'] ?>" width=130 height="129"> </SPAN><?php echo $v['title'] ?></A></DIV>
<?php } ?>
</DIV>
</DIV></DIV></DIV><!--END STROY ITEM--></DIV><!--END ARTICLE--><!--GALLERY--><!--GALLERY--><!--END CONTENT LOADER--></DIV><!--END CONTENT SIDE--><BR 
clear=all></DIV>
<!--FOOTER-->
<DIV id=footer>
<!--HIGHLIGHTS-->
<DIV id=highlight>
<A id=trigger_highlight class=closed>亮点</A> 
<DIV class=nav><A class="prev browse"></A><A class="next browse"></A>
<BR clear=all></DIV>
<DIV id=highlight_scroll class=scrollable>
<DIV class=items>
<DIV class="item i_length"> 
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(27)  order by id desc  limit 0,3");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<SPAN class=highlight_detail><A class=image_anchor onClick="brandNewsLoad(<?php echo $v['id'] ?>)">
<IMG alt="<?php echo $v['title'] ?>" src="<?php echo $v['litpic'] ?>"></A> 
<SPAN class=title_abs><A onClick="brandNewsLoad(<?php echo $v['id'] ?>)"><SPAN><?php echo $v['title'] ?></SPAN></A> </SPAN></SPAN>
<?php } ?>

</DIV>

<DIV class="item i_length">
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(27)  order by id desc  limit 3,3");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<SPAN class=highlight_detail><A class=image_anchor onClick="brandNewsLoad(<?php echo $v['id'] ?>)">
<IMG alt="<?php echo $v['title'] ?>" src="<?php echo $v['litpic'] ?>"></A> 
<SPAN class=title_abs><A onClick="brandNewsLoad(<?php echo $v['id'] ?>)"><SPAN><?php echo $v['title'] ?></SPAN></A>  </SPAN></SPAN>
<?php } ?>
</DIV>
<DIV class="item i_length">
<?php $vn=0;$tablev=syClass("syModel")->syCache(3600)->findSql("select id,tid,sid,title,style,trait,gourl,addtime,hits,htmlurl,htmlfile,litpic,orders,mrank,mgold,isshow,keywords,description,pics,video,bigpic,video1 from dy_article a left join dy_article_field b on (a.id=b.aid) where isshow=1 and tid in(27)  order by id desc  limit 6,3");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
<SPAN class=highlight_detail><A class=image_anchor onClick="brandNewsLoad(<?php echo $v['id'] ?>)">
<IMG alt="<?php echo $v['title'] ?>" src="<?php echo $v['litpic'] ?>"></A> 
<SPAN class=title_abs><A onClick="brandNewsLoad(<?php echo $v['id'] ?>)"><SPAN><?php echo $v['title'] ?></SPAN></A> </SPAN></SPAN>
<?php } ?>

</DIV></DIV></DIV></DIV>
<!--END HIGHLIGHTS-->
<!--INNER FOOTER-->
<DIV class=wrapper>
<!--FOOTER MENU-->
<OL class=menu>
  <LI><A 
  href="/index.php?c=article&a=type&tid=7">关于我们</A> </LI>
  <LI><A 
  href="/index.php?c=article&a=type&tid=8">法律声明</A> 
  </LI>
  <LI><A 
  href="index.php?file=sitemap.html">网站地图</A> </LI>
  <LI class=copy>Copyright - 2013 圣培露 S.p.A. - P.Iva 00753740158 
</LI></OL><!--END FOOTER MENU--><!--LOGHI FOOTER--><!-- start /Webcontrols/LoghiFooter.ascx -->
<DIV id=loghi_footer><A href="http://www.acquapanna.com/int/default.aspx" 
target=_blank><IMG 
style="BORDER-RIGHT-WIDTH: 0px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px" 
id=ctl00_ctl00_img1 title="Acqua Panna" alt="Acqua Panna" 
src="images/ap_logo_footer.gif"></A> <A 
href="http://www.finedininglovers.com/" target=_blank><IMG 
style="BORDER-RIGHT-WIDTH: 0px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px" 
id=ctl00_ctl00_img2 title="Fine Dining Lovers" alt="Fine Dining Lovers" 
src="images/fdl_logo_footer.gif"></A> <A 
href="http://www.sanpellegrinobeverages.com/" target=_blank><IMG 
style="BORDER-RIGHT-WIDTH: 0px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px" 
id=ctl00_ctl00_img3 title="Sparkling Fruit Beverages" 
alt="Sparkling Fruit Beverages" src="images/sfb_logo_footer.gif"></A> 
</DIV><!--END LOGHI FOOTER-->
<BR clear=all>
</DIV><!--END INNER FOOTER--></DIV>
<!--END FOOTER--></DIV>
</BODY></HTML>
