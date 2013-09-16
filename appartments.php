<?php
$content=array();

$welcome_images = array(
	'images/welcome.jpg',
	'images/welcome2.jpg',
	'images/welcome3.jpg'
);

$welcome_image = $welcome_images[rand(0,count($welcome_images)-1)];


$price=new appartment_price();

$content['main'].='<h2 style="padding-bottom:22px;">'.text::getText('fw_appartments_header').'</h2>
<p>'.text::getText('fw_appartments_note').'</p>';



div::htm_mergeSiteContent($content,$price->getAllAppartmentDescriptions());



?>
