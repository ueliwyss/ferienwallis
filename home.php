

<?php

$golfbox='<div class="box">
			<div class="box_header">
				<h2>'.text::getText('fw_overview_box_golf_header').'</h2><img style="float:right;position:relative;top:-38px;right:55px" src="images/golfer.png" alt="">
			</div>
			<div class="box_content">
				<div class="box_content_icon"><img src="images/golfer2.png" alt=""></div>
				<div class="box_content_text" style="width:134px;">
					<h3>'.text::getText('fw_box_golf_subheader').'</h3>
					<p>'.text::getText('fw_box_golf_text').'</p>
				</div>
			</div>
		</div>';

$poolbox='<div class="box">
			<div class="box_header">
				<h2>'.text::getText('fw_overview_box_pool_header').'</h2>
			</div>                         
			<div class="box_content">
				<div class="box_content_icon"><img src="images/ferienwohnung_swimmingpool.jpg" alt=""></div>
				<div class="box_content_text" style="width:134px;">
					<h3>'.text::getText('fw_box_pool_subheader').'</h3>
					<p>'.text::getText('fw_box_pool_text').'</p>
				</div>
			</div>
		</div>';

$welcome_images = array(
	'images/welcome.jpg||Ferienwohnungen - Haus Selika',
	'images/welcome2.jpg||Ferienwohnungen - Haus Adora',
	'images/welcome3.jpg||Ferienwohnungen - Winter',
	'images/welcome4.jpg||Ferienwohnungen - Swimmingpool',
);

$welcome_image = explode("||",$welcome_images[rand(0,count($welcome_images)-1)]);
$welcome_image_size=@getimagesize($welcome_image[0]);

$content=array();
$content['main']='

<div id="right">
	<div id="sidebar">
		<div class="box">
			<div class="box_header">
				<h2>'.text::getText('fw_box_weather_header').'</h2>
			</div>
			<div class="box_content">
				<div class="box_content_icon"><iframe width="100" height="95" scrolling="no" frameborder="0" src="http://www.meteo24.de/hptool/v1?cid=41X56&l=de&style=12"> </iframe>
				</div>

				<div class="box_content_text" style="margin-left:30px;width:105px;">

					<h3></h3>
					<nobr><p style="text-align:right;font-size:10px">&copy; by <a href="http://www.meteo24.de">www.meteo24.de</a></p></nobr>
					<div style="vertical-align:bottom"></div>
				</div>
			</div>
		</div>
		'.$poolbox.'
	</div>
</div>

<div id="left">
<img src="'.$welcome_image[0].'" alt="'.$welcome_image[1].'" width="'.$welcome_image_size[0].'" height="'.$welcome_image_size[1].'">
<h2>'.text::getText('fw_overview_welcome_header').'</h2>
	<p>'.text::getText('fw_overview_welcome_text').'</p>
</div>';
?>
