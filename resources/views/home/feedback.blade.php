<?php
require('header.php');
?>
	  
      <div class="page-wrap">
        <div class="inner-wrap" style="width:980px;">

<div class="help-cont clearfix">
  <div class="fl tabs">
    <ul>
      <li><a href="/help/feedback" class="feedback active ca-deepgrey">找客服</a></li>
      <li><a href="/help/faq" class="faq ca-deepgrey">常见问题</a></li>
      <li><a href="/help/job" class="attend ca-deepgrey">人才招聘</a></li>
      <li><a href="" class="banma ca-deepgrey">配送合作</a></li>
      <li><a href="/help/inform" class="inform ca-deepgrey">诚信举报</a></li>
    </ul>        
  </div>
  <div class="content">
    <div class="feedback-bar">反馈通道</div>
    <div class="feedback-channel clearfix">
      <div class="channel fl">
      	<div class="phone"><span>客服电话：</span>10109777</div>
        <!-- <div class="phone"><span>客服电话：</span>4008508888</div> -->
        <!-- <div class="phone"><span>客服电话：</span>010-56652722</div>  -->
      </div>
      <div class="channel fl">
        <div class="weixin"><span>客服微信：</span>美团外卖</div>

      </div>
      <div class="tips fl">客服不受理商务合作事宜，提交商务合作信息请点击进入<a href="./ruzhujiameng.php" class="cc-lightred-new kaidian_address">我要开店</a>，在线提交合作信息</div>
    </div><br />
    <form id="feedback-box" class="feedback-box">
      <div class="feedback-bar">反馈留言</div>
      <div class="message-box">
        <textarea name="feedback" placeholder="我们非常珍视您的反馈，请留下您的宝贵意见。"></textarea>
      </div>
      <input type="hidden" name="view_id" value="">
      <a id="send" href="javascript:;" class="send-btn s-btn" title="发送"><span class="s-btn">发送</span></a>
      <span class="error-info"></span>
    </form>
    
  </div>
</div>
      </div>
    </div>
<?php
require('footer.php');
?>
