               </div>
            </div>
        </div>
    </section>
     <!--/#features-->
<?php if(isset($is_home)){?>
    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
	                    
                        <h1 class="title">پشتیبانی در دسترس</h1>
                        <p class="subtitle">با ما از طریق راههای ارتباطی زیر در تماس باشید</p>
                        <p>
	                        <a href="ymsgr:sendIM?azadi_1984"><img src="/assets/images/yahoo.png" style="margin-right: 25px;"></a>
	                        <a target="_blank" href="https://telegram.me/webpurse"><img src="/assets/images/telegram.png"></a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="block"><div id="nextl">
					<h3>نظرات کاربران</h3>
					<?php foreach($comments as $comment){static $i=0;$i++;?>
					<div class="comments" id="comment<?php echo $i;?>" <?php if($i>1){echo 'style="display:none"';}?>>
						<p class="content" style="direction: rtl;text-align: center;">
								<span><?php echo html_escape($comment->comment);?></span>
						</p>
						<div class="sign">
							<strong><?php echo html_escape($comment->name);?></strong>
						</div>
					</div>
					<?php }?>
				</div></div>
                </div>
            </div>
        </div>
     </section>
    <!--/#clients-->
<?php }?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="/assets/images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p class="subtitle" id="footwarning">
	                        این سایت تحت هیچ شرایطی در حوزه فعالیت مرتبط با صرافی ها از جمله خرید و فروش ارز اسکناس / حواله ورود پیدا نکرده و نخواهد کرد بدون تایید هویت
	                         افراد هیچگونه خدماتی ارائه نخواهد کرد و هیچگونه خرید و فروش و اطلاع رسانی نرخ اسکناس ارز و سکه ندارد 
                        </p>
                        <p class="subtitle">
	                       <a class="fbor" href="http://behpardakht.com" target="_blank"><img src="/assets/images/flogos/fbehpardakht.jpg"></a>
	                       <a class="fbor" href="https://blockchain.info" target="_blank"><img src="/assets/images/flogos/fbitcoin.jpg"></a>
	                       <a href="https://perfectmoney.is" target="_blank"><img src="/assets/images/flogos/fperfectmoney.jpg"></a>
	                       <a class="fbor" href="https://passport.wmtransfer.com/asp/CertView.asp?wmid=304709758178" target="_blank"><img src="/assets/images/flogos/fwebmoney.png"></a>
	                       <a class="fbor" href="http://megastock.ru/" target="_blank"><img src="/assets/images/flogos/fwebmoney2.png"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->


<?php if(isset($important_news) && intval($important_news) === 1){?>
<div style="position:fixed;top:0;left:0;right:0;background:#F7EEE6;padding:20px 10px;text-align:center;font-family:Tahoma;font-size:12px;border-bottom:2px solid #333;">
خبر مهمی ارسال شده ، لطفا بخش اخبار را مطالعه فرمایید.
<?php echo anchor('/pages/news/','اینجا کلیک کنید');?>
</div>
<?php }?>


    <script type="text/javascript" src="/assets/js/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/lightbox.min.js"></script>
    <script type="text/javascript" src="/assets/js/wow.min.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>

<?php if(isset($is_home) && $i > 1){?>
<script>
$(function(){
	var max = <?php echo $i;?>;
	var i = 1;
	var timer = 5000;
	
    function comments(i, max, timer)
    {
    	i++;
    	if (i>max){i = 1;}
		$('.comments').hide('fast');
		$('#comment'+i).show('slow');
		
		setTimeout(function() { comments(i, max, timer); }, timer);
	}
	
	setTimeout(function() { comments(i, max, timer); }, timer);
});
</script>
<?php }?>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3kxreiVJBJr5iqKbmmA4GaD3jRUybjwZ";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

</body>
</html>