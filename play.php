<?php
function getrealurl($url){
	$header = get_headers($url,1);
	if (strpos($header[0],'301') || strpos($header[0],'302')) {
		if(is_array($header['Location'])) {
			return $header['Location'][count($header['Location'])-1];
		}else{
			return $header['Location'];
		}
	}else {
		return $url;
	}
}
 
$url= $_GET['url'];
if(strpos($url,'rtmp') !== false){ 
 $url2 = $url; 
}else{
 $url2 = getrealurl($url); 
}
?>
<html>
<body style="background-color: #cecece; background-size:cover;">
<script type="text/javascript" src="ckplayer/ckplayer.js"></script>
 <font style="font-weight:bold;color:#F19149;">视频地址:</font><?php echo "<a href=".$url2 .">" .$url2. "</a>" ?> 
<div id="video" style="width:520px;margin:0 auto;"></div>
<script type="text/javascript">
	var videoObject = {
		container:'#video',
		variable:'player',
		autoplay:true,
		video:'<?php echo $url2 ?>'
	};
	var player=new ckplayer(videoObject);
</script>
</body>
</html>