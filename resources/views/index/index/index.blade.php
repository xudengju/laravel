<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>小米商城</title>
    <base href="__PUBLIC__">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<!-- start header -->
<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <li><a href="{{url('index/index')}}" target="_blank">小米商城</a></li>
                <li>|</li>
                <li><a href="">MIUI</a></li>
                <li>|</li>
                <li><a href="">米聊</a></li>
                <li>|</li>
                <li><a href="">游戏</a></li>
                <li>|</li>
                <li><a href="">多看阅读</a></li>
                <li>|</li>
                <li><a href="">云服务</a></li>
                <li>|</li>
                <li><a href="">金融</a></li>
                <li>|</li>
                <li><a href="">小米商城移动版</a></li>
                <li>|</li>
                <li><a href="">问题反馈</a></li>
                <li>|</li>
                <li><a href="">Select Region</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="right fr">
            <div class="gouwuche fr"><a href="{{url('goods/cart')}}">购物车</a></div>
            <div class="fr">
                <ul>
                    <li>
                        <?php if($username){ ?>
                            欢迎<?php echo $username?>登录
                        <?php }?>
                            <?php if($username==''){ ?>
                            <a href="{{url('user/login')}}" target="_blank">未登录，点击登录</a>
                            <?php }?>
                    </li>
                    <li>|</li>
                    <li><a href="{{url('user/register')}}" target="_blank" >注册</a></li>
                    <li>|</li>
                    <li><a href="">消息通知</a></li>
                    <li><a href="{{url('user/loginOut')}}">退出</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</header>
<!--end header -->

<!-- start banner_x -->
<div class="banner_x center">
    <a href="{{url('index/index')}}" target="_blank"><div class="logo fl"></div></a>
    <a href=""><div class="ad_top fl"></div></a>
    <div class="nav fl">
        <ul>
            <li><a href="{{url('goods/list')}}" target="_blank">小米手机</a></li>
            <li><a href="">红米</a></li>
            <li><a href="">平板·笔记本</a></li>
            <li><a href="">电视</a></li>
            <li><a href="">盒子·影音</a></li>
            <li><a href="">路由器</a></li>
            <li><a href="">智能硬件</a></li>
            <li><a href="">服务</a></li>
            <li><a href="">社区</a></li>
        </ul>
    </div>
    <div class="search fr">
        <form action="" method="post">
            <div class="text fl">
                <input type="text" class="shuru"  placeholder="小米6&nbsp;小米MIX现货">
            </div>
            <div class="submit fl">
                <input type="submit" class="sousuo" value="搜索"/>
            </div>
            <div class="clear"></div>
        </form>
        <div class="clear"></div>
    </div>
</div>
<!-- end banner_x -->

<!-- start banner_y -->
<div class="banner_y center">
    <div class="nav">

        <ul>
            @foreach ($type as $k=>$v)
            <li>
                <a href=""><?php echo $v['type_name']?></a>
                @foreach ($v['child'] as $k=>$j)
                <a href=""><?php echo $j['type_name']?></a>
                @endforeach;
                <div class="pop">
                    @foreach($j['child'] as $k=>$r)
                        @if($j['type_id'] == $r['p_id'])
                    <div class="left fl" style="height: 80px;">
                        <div>
                            <div class="xuangou_left fl">
                                <a href="{{$r['url']}}">
                                    <div class="img fl"><img src="/image/xm6_80.png" alt=""></div>
                                    <span class="fl">{{$r['type_name']}}</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_right fr"><a href="{{url('goods/particulars')}}" target="_blank">选购</a></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                        @endif
                      @endforeach
                    <div class="clear"></div>
                </div>
            </li>
            @endforeach
        </ul>

    </div>

</div>

<div class="sub_banner center">
    <div class="sidebar fl">
        <div class="fl"><a href=""><img src="/image/hjh_01.gif"></a></div>
        <div class="fl"><a href=""><img src="/image/hjh_02.gif"></a></div>
        <div class="fl"><a href=""><img src="/image/hjh_03.gif"></a></div>
        <div class="fl"><a href=""><img src="/image/hjh_04.gif"></a></div>
        <div class="fl"><a href=""><img src="/image/hjh_05.gif"></a></div>
        <div class="fl"><a href=""><img src="/image/hjh_06.gif"></a></div>
        <div class="clear"></div>
    </div>
    <div class="datu fl"><a href=""><img src="/image/hongmi4x.png" alt=""></a></div>
    <div class="datu fl"><a href=""><img src="/image/xiaomi5.jpg" alt=""></a></div>
    <div class="datu fr"><a href=""><img src="/image/pinghengche.jpg" alt=""></a></div>
    <div class="clear"></div>


</div>
<!-- end banner -->
<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

<!-- start danpin -->
<div class="danpin center">

    <div class="biaoti center">小米明星单品</div>

    <div class="main center">
        <?php foreach ($res as $k=>$v){?>
        <div class="mingxing fl">
            <div class="sub_mingxing"><a href="{{url('goods/particulars')}}"><img src="{{$v['goods_img']}}" alt=""></a></div>
            <div class="pinpai"><a href=""><?php echo $v['goods_name']?></a></div>
            <div class="youhui">5月9日-21日享花呗12期分期免息</div>
            <div class="jiage"><?php echo $v['goods_price']?>元起</div>
        </div>
            <?php }?>
          <div class="clear"></div>

    </div>
</div>
<div class="peijian w">
    <div class="biaoti center">配件</div>
    <div class="main center">
        <div class="content">
            <div class="remen fl"><a href=""><img src="/image/peijian1.jpg"></a>
            </div>
            @foreach($result as $k=>$rs)
            <div class="remen fl">
                <div class="xinpin"><span>新品</span></div>
                <div class="tu"><a href=""><img src="{{$rs['goods_img']}}"></a></div>
                <div class="miaoshu"><a href="">{{$rs['goods_name']}}</a></div>
                <div class="jiage">{{$rs['goods_price']}}元</div>
                <div class="pingjia">372人评价</div>
                <div class="piao">
                    <a href="">
                        <span>发货速度很快！很配小米6！</span>
                        <span>来至于mi狼牙的评价</span>
                    </a>
                </div>
            </div>
            @endforeach

            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="remen fl"><a href=""><img src="/image/peijian6.png"></a>
            </div>
            <div class="remen fl">
                <div class="xinpin"><span style="background:#fff"></span></div>
                <div class="tu"><a href=""><img src="/image/peijian7.jpg"></a></div>
                <div class="miaoshu"><a href="">小米指环支架</a></div>
                <div class="jiage">19元</div>
                <div class="pingjia">372人评价</div>
                <div class="piao">
                    <a href="">
                        <span>发货速度很快！很配小米6！</span>
                        <span>来至于mi狼牙的评价</span>
                    </a>
                </div>
            </div>

            <div class="remenlast fr">
                <div class="hongmi"><a href=""><img src="/image/hongmin4.png" alt=""></a></div>
                <div class="liulangengduo"><a href=""><img src="/image/liulangengduo.png" alt=""></a></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<footer class="mt20 center">
    <div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
    <div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
    <div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
</footer>
</body>
</html>
