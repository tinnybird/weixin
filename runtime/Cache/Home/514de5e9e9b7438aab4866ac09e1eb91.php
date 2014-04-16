<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?php echo C('site_name');?>—<?php echo C('site_title');?></title>
<meta name="keywords" content="<?php echo C('keyword');?>"/>
<meta name="description" content="<?php echo C('content');?>"/>
<script src="<?php echo RES;?>/js/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/index.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/project.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/carouFredSel.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/dm-index.js"></script>
<link rel="shortcut icon" href="<?php echo RES;?>/images/favicon.ico" />
</head>
<body>
<div class="nav clearfix">
	<div class="nav-content">
		<h1 class="left" href="/"><?php echo C('site_name');?></h1>
		<div class="left city" style="padding-left:20px;">
			<h2>全国</h2>
				<a href="#">
					切换城市<i class="tri4"></i>
				</a>
		</div>
		<div class="right line-li">
			<ul>
				<li><a href="/"  class="hover">首页</a></li>
                <li><a href="<?php echo U('Home/Index/fc');?>">功能介绍</a></li>
                <li><a href="<?php echo U('Home/Index/common');?>">客户案例</a></li>
                <li><a href="<?php echo U('Home/Index/about');?>">关于我们</a></li>
				<?php if($_SESSION[uid]==false): ?><li><a href="<?php echo U('Index/login');?>">登录后台</a></li>
				<li><a href="<?php echo U('Index/reg');?>">申请试用</a></li>
					<?php else: ?>
                <li><a href="<?php echo U('User/Index/index');?>">管理中心</a></li>
				<li><a href="/#" onClick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a></li><?php endif; ?>	
                <li <?php if((ACTION_NAME) == "help"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="header clearfix">
	<div class="hd-c">
		<div class="banner">
			<ul>
					<li class="pic-intro" >
						<div class="text">
							<h4>
								已有<font>1066</font>商家入驻，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/index.php?g=Home&m=Index&a=reg" title="入驻<?php echo C('site_name');?>"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/images/banner-a.png" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>1066</font>商家入驻，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/index.php?g=Home&m=Index&a=reg" title="入驻<?php echo C('site_name');?>"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/images/banner-b.png" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>1066</font>商家入驻，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/index.php?g=Home&m=Index&a=reg" title="入驻<?php echo C('site_name');?>"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/images/banner-c.png" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>1066</font>商家入驻，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/index.php?g=Home&m=Index&a=reg" title="入驻<?php echo C('site_name');?>"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/images/banner-d.png" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>1066</font>商家入驻，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/index.php?g=Home&m=Index&a=reg" title="入驻<?php echo C('site_name');?>"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/images/banner-e.png" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>1066</font>商家入驻，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/index.php?g=Home&m=Index&a=reg" title="入驻<?php echo C('site_name');?>"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/images/banner-f.png" class="png-24" alt="banner" />
						</div>
					</li>
							</ul>
			<div class="frame">
				<span class="changing-over">
					<a href="#" class="now"></a>
					<a href="#" ></a>
					<a href="#" ></a>
					<a href="#" ></a>
					<a href="#" ></a>
					<a href="#" class="last"></a>
				</span>
			</div>
		</div>
	</div>
</div>

<!-- trade -->
<div class="content clearfix">
			<div id="notice-panel">
			<div style="width:600px; margin:0 auto; position:relative;">
				<h1><div class="notice_icon"></div>最新公告：</h1>
				<div class="notice">
					<label>
						<a href="javascript:;" onClick="javascript:$('#notice_mask').show(), $('#notice_message').show();" title="">豆苗云微信公众营销平台开放公测</a>
						<span class="date">2014-03-10</span>
					</label>
				</div>
			</div>
		</div>
		<div class="feature-content">
		<script>
			$(document).ready(function(){
				$(".feature-content dd").hover(
					function(){
						$(this).addClass("active")
					},
					function(){
						$(this).removeClass("active");
					}
				);
			});
		</script>
		<dl class="clearfix">
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#site">
					<div class="fimg icon website"></div>
					<h3>微官网</h3>
				</a>
				<p>5分钟轻松建站<br>打造酷炫微官网</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#member">
					<div class="fimg icon member"></div>
					<h3>微会员</h3>
				</a>
				<p>方便携带&nbsp;永不挂失<br>消费积分&nbsp;一卡配备</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#activities">
					<div class="fimg icon activities"></div>
					<h3>微活动</h3>
				</a>
				<p>吸引用户参与<br>增强用户沉淀</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#push">
					<div class="fimg icon Push"></div>
					<h3>微推送</h3>
				</a>
				<p>无线周边推广<br>提高品牌知名度</p>
			</dd>
			<dd>
				<a href="/index.php?g=Home&m=Index&a=fc#services">
					<div class="fimg icon service"></div>
					<h3>微服务</h3>
				</a>
				<p>提供生活服务<br>增加用户粘性</p>
			</dd>
		</dl>
		<div class="line"></div>
		<dl class="clearfix">
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#message">
					<div class="fimg icon message"></div>
					<h3>微留言</h3>
				</a>
				<p>意见？需求？疑问？<br>一键留言&nbsp;&nbsp;一键回复</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#photo">
					<div class="fimg icon albums"></div>
					<h3>微相册</h3>
				</a>
				<p>各行各业<br>照片展现轻松搞定</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#menu">
					<div class="fimg icon menu"></div>
					<h3>自定义菜单</h3>
				</a>
				<p>无需定制 完全自定义<br>无需触发 完全可视化</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#research">
					<div class="fimg icon research"></div>
					<h3>微调研</h3>
				</a>
				<p>无需人力&nbsp;电子调研<br>为市场调研加一份有力数据</p>
			</dd>
			<dd>
				<a href="/index.php?g=Home&m=Index&a=fc#addup">
					<div class="fimg icon mtatistics"></div>
					<h3>微统计</h3>
				</a>
				<p>折线图清晰查询数据<br>助力企业营销</p>
			</dd>
		</dl>
		<div class="line"></div>
		<dl class="clearfix">
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#estate">
					<div class="fimg icon mstate"></div>
					<h3>微房产</h3>
				</a>
				<p>房产行业有力的解决方案<br>360度看房更给力</p>
			</dd>
			<dd  class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#car">
					<div class="fimg icon car"></div>
					<h3>微汽车</h3>
				</a>
				<p>预约试驾或保养 车主关怀<br>360度看车应有尽有</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#wedd">
					<div class="fimg icon card"></div>
					<h3>微喜帖</h3>
				</a>
				<p>电子喜帖&nbsp;微信来袭<br>提供用户特别服务</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#medical">
					<div class="fimg icon medical"></div>
					<h3>微医疗</h3>
				</a>
				<p>在线挂号或咨询<br>了解病情 微信都可以</p>
			</dd>
			<dd>
				<a href="/index.php?g=Home&m=Index&a=fc#hotels">
					<div class="fimg icon hotel"></div>
					<h3>微酒店</h3>
				</a>
				<p>在线订房融入微信<br>酒店营销多一条有力途径</p>
			</dd>
		</dl>
        
        <div class="line"></div>
		<dl class="clearfix">
           <dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#reser">
					<div class="fimg icon reserve"></div>
					<h3>微预约</h3>
				</a>
				<p>各种预约 一键即可<br>短信邮件会立即通知商户</p>
			</dd>
			<dd class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#vshop">
					<div class="fimg icon vshop"></div>
					<h3>微商城</h3>
				</a>
				<p>小微信也有大商城<br>电商轻松就能走入微信</p>
			</dd>
			<dd  class="vborder">
				<a href="/index.php?g=Home&m=Index&a=fc#cate">
					<div class="fimg icon cate"></div>
					<h3>微餐饮</h3>
				</a>
				<p>扫一扫<br>微信也能够实时点餐</p>
			</dd>
			<dd class="vborder">
				<a>
					<div class="fimg icon life"></div>
					<h3>微生活</h3>
				</a>
				<p>微信公众号建立商圈<br>吃喝玩乐应有尽有</p>
			</dd>
            <dd>
				<a>
					<div class="fimg icon buy"></div>
					<h3>微团购</h3>
				</a>
				<p>团购搬进微信公众平台<br>同微信分享6亿用户</p>
			</dd>

			
		</dl>
	</div>
</div>
<!-- case -->
<div>
	<div class="list_carousel">
		<ul id="foo2">
										<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case1.jpg" alt="case1.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case2.jpg" alt="case2.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case3.jpg" alt="case3.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case4.jpg" alt="case4.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case5.jpg" alt="case5.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case6.jpg" alt="case6.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case7.jpg" alt="case7.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case8.jpg" alt="case8.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case9.jpg" alt="case9.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case10.jpg" alt="case10.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case11.jpg" alt="case11.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case12.jpg" alt="case12.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case13.jpg" alt="case13.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case14.jpg" alt="case14.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case15.jpg" alt="case15.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case16.jpg" alt="case16.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case17.jpg" alt="case17.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case18.jpg" alt="case18.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case19.jpg" alt="case19.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/images/case20.jpg" alt="case20.jpg" />
					</a>
				</li>
					</ul>
		<div class="clearfix"></div>
		<a id="prev2" class="prev" href="#"></a>
		<a id="next2" class="next" href="#"></a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#foo2').carouFredSel({
					//auto: true,
					prev: '#prev2',
					next: '#next2',
					pagination: "#pager2",
					mousewheel: true,
					swipe: {
						onMouse: true,
						onTouch: true
					}
				});
			});
		</script>
	</div>
</div>
<!--公告信息-->
	<div id="notice_mask"></div>
	<div id="notice_message" style="position: absolute; left: 373.5px; top: 20%; height:300px;">
		<div class="title">最新公告<a onClick="javascript:jQuery('#notice_mask').hide(),jQuery('#notice_message').hide();">×</a></div>
		<div class="content">
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo C('site_name');?>·微信营销系统目前处于初营业阶段，有任何问题和改善建议欢迎向我们反馈，我们会第一时间做修正，为把<?php echo C('site_name');?>·微信营销系统做得更方便，更完美而努力。
		<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--<?php echo C('site_name');?>研发团队
	</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#notice_mask').click(function(){
			$('#notice_mask').hide();
			$('#notice_qrcode').hide();
			$('#notice_message').hide();
		});

		$(window).resize(function(){
			$('#notice_qrcode').css({
				position:'absolute',
				left: ($(window).width() - $('#notice_qrcode').outerWidth())/2,
				top: ($(window).height() - $('#notice_qrcode').outerHeight())/2
			});

			$('#notice_message').css({
				position:'absolute',
				left: ($(window).width() - $('#notice_message').outerWidth())/2,
				top: ($(window).height() - $('#notice_message').outerHeight())/2
			});
		});
	});
</script>
<div class="erwei" title="微信扫一扫">
	<span class="hudongzhushou">官方微信</span>
	<div class="erwei_big" style="display:none;">
		<p>扫一扫，关注<?php echo C('site_name');?>官方微信，体验<?php echo C('site_name');?>智能服务<br>
		<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('site_qq');?>:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var erwei_time = null;
		$(".erwei").hover(function(){
			$(".erwei_big").show();
		}).mouseleave(function(){
				erwei_time = setTimeout(function(){
					$(".erwei_big").hide();
				},1000);
			});
		$(".erwei_big").mouseenter(function(){
			if(erwei_time){
				clearTimeout(erwei_time);
			}
		}).mouseleave(function(){
				erwei_time = setTimeout(function(){
					$(".erwei_big").hide();
				},1000);
			});
	});
</script>
<!--QQ咨询-->
<script charset="utf-8" type="text/javascript" src="<?php echo RES;?>/js/wpa.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/qqserver.css"/>

<div id="onlinebox" class="onlinebox onlinebox_1 onlinebox_1_2" style="position: fixed; top: 80px; right:35px; ">
	<div class="onlinebox-showbox" id="onlinebox-showbox" onMouseMove="qq(0)"><span>在<br>线<br>客<br>服<br></span></div>
	<div class="onlinebox-conbox" id="onlinebox-conbox" style="position: absolute; left: -94px; width: 118px; display:none;">
		<div class="onlinebox-top" id="onlinebox-top" title="点击可隐藏" onClick="qq(1)"><span>在线客服</span></div>
		<div class="onlinebox-center">
			<div class="onlinebox-center-box">
				<dl>
					<dt>使用帮助</dt>
						<dd><a href="tencent://message/?uin=<?php echo C('site_qq');?>&amp;Site=&amp;Menu=yes" title="QQ咨询服务">
						<img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('site_qq');?>:41"></a>
						</dd>
					</dl>
				<div class="clear"></div>
				<dl>
					<dt>技术询问</dt>
					<dd>
						<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes">
							<img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('site_qq');?>:41" alt="在线咨询服务"/>
						</a>
					</dd>
				</dl>
				<div class="clear"></div>
				<dl><dt>合作加盟</dt>
				<dd>
					<a href="tencent://message/?uin=<?php echo C('site_qq');?>&amp;Site=&amp;Menu=yes" title="QQ合作加盟">
						<img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('site_qq');?>:41">
					</a>
				</dd>
				</dl>
				<div class="clear"></div>
			</div>
		</div>
		<div class="onlinebox-bottom">
			<div class="onlinebox-bottom-box">
				<div class="online-tbox">
					<div style="text-align: center; "><strong>在线时间	</strong><br>	09:30-22:30<br>
					</div>
				</div>
			</div>
		</div>
		<div class="onlinebox-bottom-bg"></div>
	</div>
</div>
<div class="footer">
	<div class="footer-content clearfix">
		<div class="foot-menu">
			<p>
				<a href="/">网站首页</a>&nbsp;|&nbsp;
				<a href="<?php echo U('Index/reg');?>" target="_blank">申请入驻</a>&nbsp;|&nbsp;
				<a href="<?php echo U('Home/Index/about');?>" target="_blank">渠道代理</a>&nbsp;|&nbsp;
				<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes" target="_blank">业务定制</a>&nbsp;|&nbsp;
				<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes" target="_blank">微信托管</a>&nbsp;|&nbsp;
				<a href="<?php echo U('Home/Index/about');?>" target="_blank">关于我们</a>
			</p>
			<p>客服QQ：<?php echo C('site_qq');?>&nbsp;&nbsp;&nbsp;邮箱：<?php echo C('site_email');?></p>
		</div>
		<div class="foot-menu">
			<p><a href="http://www.miibeian.gov.cn/" title="备案信息" target="_blank"><?php echo C('ipc');?></a></p>
		</div>
		<div style="display:none;">
			<?php echo htmlspecialchars_decode(C('counts'),ENT_QUOTES);?>
		</div>
		<div class="copyright"><?php echo C('copyright');?></div>
	</div>
</div>
</body>
</html>