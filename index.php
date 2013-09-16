<?php

include('init.php');
if(isset($_POST['submit'])) { text::updateValues(); }

if(!($id=div::http_getGP('id')) || (!file_exists(div::http_getGP('id')))) {
	$id='home.php';
}


$colors = array(
	'green'=>array(
		'dark'=>'#8ba21e',
		'light'=>'#D6DBAF',
		'images'=>array(
			'box_header'=>'images/boxheader_green.png',
		),
	),
	'blue'=>array(
		'dark'=>'#0d56a0',
		'light'=>'#A8D2EF',
		'images'=>array(
			'box_header'=>'images/boxheader_blue.png',
		),
	),
	'violet'=>array(
		'dark'=>'#705270',
		'light'=>'#F3DCF4',
		'images'=>array(
			'box_header'=>'images/boxheader_violet.png',
		),
	),
	'brown'=>array(
		'dark'=>'#5e3700',
		'light'=>'#d8c1a0',
		'images'=>array(
			'box_header'=>'images/boxheader_brown.png',
		),
	),
	'orange'=>array(
		'dark'=>'#CE5706',
		'light'=>'#EFB68F',
		'images'=>array(
			'box_header'=>'images/boxheader_orange.png',
		),
	),
);

$pages = array(
	'home.php'=>'green',
	'appartments.php'=>'blue',
	'prices.php'=>'blue',
	'equipment.php'=>'blue',
	'destination.php'=>'violet',
	'activities.php'=>'brown',
	'contact.php'=>'orange',
	'reservation.php'=>'orange',
	'toknow.php'=>'blue',
	'activities.php'=>'brown',
	'arrival.php'=>'violet',
);

$color=$pages[$id];

include($id);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php echo $lang; ?>">
<head>
<title>Ferienwohnungen Adora&Selika Leuk - Thel Wallis</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="description" content="Ferienwohnungen bei Leuk im Wallis: An ruhiger Lage und doch in nächster Nähe zur Wellnessdestination Leukerbad oder dem Skigebiet Torrent. Ausgestattet mit Schwimmbad, Tiefgarage, Pizzaofen und vielem mehr.">
<meta name="keywords" content="ferien,wallis,ferienwohnungen,pool,wellness,wandern,golf,kaminofen,skiferien,schwimmbad">
<meta name="title" content="TITEL">
<meta name="robots" content="index,follow">
<meta name="language" content="<?php echo $lang; ?>">
<meta name="zipcode" content="3953">
<meta name="city" content="Leuk">
<meta name="state" content="Wallis">
<meta name="country" content="CH">
<meta name="author" content="Ueli Wyss">
<meta name="pragma" content="no-cache">

<?php echo $content['header']; ?>
<script language="JavaScript" src="library/jsfunc.edit.js" type="text/javascript"></script>
<script language="JavaScript" src="admin/library/jsfunc.tooltip.js" type="text/javascript"></script>

<script language="JavaScript" src="jsfunc.div.js" type="text/javascript"></script>
<script language="JavaScript" src="mootools.v1.11.js" type="text/javascript"></script>

<script type="text/javascript" src="lightbox/js/slimbox.js"></script>
<link rel="stylesheet" href="lightbox/css/slimbox.css" type="text/css" media="screen" />
<style type="text/css">
	.special{
		color : #CC0000;
		font-family : Tahoma, Arial, "MS Sans Serif"
	}

	.Bold{
		font-weight : bold;
	}

	TextArea{
		border : 1px solid #CE5706;
		border-color : #CE5706;
		border-style : solid;
		border-width : 1px;
		height :70px;
		width : 300px;
		font-family : Tahoma, Arial, "MS Sans Serif";
		font-size : 12px;
	}

	Input{
		background-color : #FFFFFF;
		border : 1px solid #CE5706;
		font-family : Tahoma, Arial, "MS Sans Serif";
		font-size : 12px;
	}


	#SBB Input[type="text"] {
		background-color : #FFFFFF;
		border : 1px solid #000000;
		font-family : Tahoma, Arial, "MS Sans Serif";
		font-size : 12px;
	}

	#SBB Input[type="radio"] {
		border:none;
	}

	Input:active {
		background-color : #D5FFCB;
	}
	Select {
		background-color : #FFFFFF;
		border : 1px solid #CE5706;
		font-family : Tahoma, Arial, "MS Sans Serif";
		font-size : 12px;

	}

	Option {
		background-color : #FFFFFF;
		border : 1px solid #CE5706;
		font-family : Tahoma, Arial, "MS Sans Serif";
		font-size : 12px;

	}
	body {
		font-family: "Trebuchet MS",Tahoma,Arial;
		color:black;
		font-size:12px;
		margin:0;
		padding:0;

	}

	#main {
		margin:auto;
		padding:0;

	}

	img {
		border:0;
	}

	#content a{
		color:<?php echo $colors[$color]['dark']; ?>;
		font-weight:bold;
		text-decoration:none;
	}

	#content a:hover{
		color:<?php echo $colors[$color]['dark']; ?>;
		text-decoration:underline;
	}

	#content a:visited{
		color:<?php echo $colors[$color]['dark']; ?>;
		text-decoration:none;
	}


	html {

	}

	#content
	{
		overflow:hidden;
		background-color:white;
		min-height:300px;
		text-align:left;
		background-image:url('symbole/content_background.gif');
		background-repeat:no-repeat;
		background-position:bottom;
		padding:20px;

	}
	#menu
	{
		background-color:white;
		margin:0;padding:0;
		height:295px;
		background-image:url('images/menu_background_<?php echo $lang; ?>.png');
		background-repeat:no-repeat; 
	}

	div#footer, div#footer a
	{

		height:25px;
		width:100%;
		background-color:<?php echo $colors[$color]['dark']; ?>;
		color : #ffffff;
		font-size : 11px;
		text-align:left;
		text-decoration:none;


	}

	ul#footermenu {
		list-style : none; margin : 0;
	    text-align: center;
	    margin-left:5px;
	}

	ul#footermenu li {
		color:#eeeeee;
		float:left;
		padding:5px 2px;
	}

	ul#footermenu li a {
		color:#eeeeee;
		text-decoration:none;
	}

	#content h2 {
		font-family:"Tahoma";
		color:<?php echo $colors[$color]['dark']; ?>;
		font-size:18px;

	}

	#content h3 {
		color:<?php echo $colors[$color]['dark']; ?>;
		font-size:15px;
		font-family:"Trebuchet MS";
		font-weight:bold;
	}


	#main {

		width:702px;
		height:100%;

	}



	td.menu_item {

		padding:0px;
		margin:0px;
	}

	a.menu_item {
		padding-top:0px;
		padding-bottom:0px;
		padding-left:12px;
		padding-right:12px;
		color:#555555;
		font-size:16px;
		font-family:Book Antiqua,Verdana;
		text-decoration:none;
		margin:0px;

	}

	#menuitem_5:hover {
	 color:#FFFFFF;
	 background-color:#CE5706;
	}

	#menuitem_1:hover {
	 color:#FFFFFF;
	 background-color:#8ba21e;
	}

	#menuitem_2:hover {
	 color:#FFFFFF;
	 background-color:#065A93;
	}

	#menuitem_3:hover {
	 color:#FFFFFF;
	 background-color:#705270;
	}

	#menuitem_4:hover {
	 color:#FFFFFF;
	 background-color:#5e3700;
	}

	 #submenu_1 a:visited, #submenu_1, #submenu_1 a {
	  	 background-color : #D6DBAF;
	  	 color:#8ba21e;
	  }
	  #submenu_2 a:visited, #submenu_2, #submenu_2 a {
	  	 background-color : #A8D2EF;
	  	 color:#065A93;
	  }
	   #submenu_3 a:visited, #submenu_3, #submenu_3 a {
	  	 background-color : #F3DCF4;
	  	 color:#705270;
	  }
	    #submenu_4 a:visited, #submenu_4, #submenu_4 a {
	  	 background-color : #d8c1a0;
	  	 color:#5e3700;
	  }

	     #submenu_5 a:visited, #submenu_5, #submenu_5 a {
	  	 background-color : #EFB68F;
	  	 color:#CE5706;
	  }



	  ul#menulist {
		margin:0;padding:0;
		position : absolute;
		top:275px;
	  }

	  ul#menulist li {
	    float : left;
		position : relative;
		 list-style : none;
	  }

	  ul#menulist ul {
	  		display : none; list-style : none;
			position : absolute;
			left : 0;
			top : 20px;
			margin : 0;
			padding : 5px 10px;
			 border-top : 1px solid #fff;
			 z-index:8;
	  }



	  ul#menulist ul li {
	  	float : none; min-width : 150px;
	  	position:relative;
	  }

	  ul#menulist ul li + li{
	  	border-top : 1px solid #ffffff;
	  }

	  ul#menulist ul a {
	  	text-align:left;
	  	display : block;
	  	padding : 2px 3px 1px;
	  	text-transform : uppercase;
	  	text-decoration : none;
	  	font-size : 12px;
	  }

	  ul#menulist ul a:hover {
	  	text-decoration : underline;
	  }

	.subheader {
		font-size:15px;
		font-weight:bold;
		color:#D8D8D8;
		margin-bottom:0px;
		margin-top:0px;
	}

	.title {
		color:white;
		margin-bottom:3px;
		border-bottom:1px solid white;
		font-size:12px;
		font-weight:bold;
		padding-top:20px;
		padding-bottom:3px;
	}


	#sidebar
	{
		font-family:Tahoma,"Trebuchet MS";
		float:right;
		width: 225px;
		margin-top:10px;

	}



	#sidebar h2 {
		margin:2px 0 0 13px;padding:0;
		font-weight:bold;
		font-size: 14px;
		color: #ffffff;
		text-transform:uppercase;
		font-family: Arial;
        font-stretch: condensed;
	}

	#sidebar h3 {
		font-family:Arial Narrow;
		font-size: 13px;
		color: <?php echo $colors[$color]['dark']; ?>;
		font-weight:bold;
		margin:0;padding:0;
	}

	#sidebar a {
		float:right;
		font-size:9px;
		font-weight:bold;
		color:<?php echo $colors[$color]['dark']; ?>;
		text-decoration:none;

	}

	#sidebar a:visited {
		float:right;
		font-size:9px;
		font-weight:bold;
		color:<?php echo $colors[$color]['dark']; ?>;
		text-decoration:none;

	}



	.box_header {
		background:url(<?php echo $colors[$color]['images']['box_header']; ?>) no-repeat 10px 0px;
		height:22px;
		width:100%;
	}

	.box_content p {
		margin:0;padding:0;
	}


	.box {
		background:url(images/boxcontent.png) no-repeat 0 16px;
		list-style : none; margin : 0;
		width:100%;
		height:150px;
	}

	.box_content {
		margin:0 0 0 10px; 
		height:95px;

	}

	.box_content_icon {
		float:left;
		width:64px;
		padding:0;
		height:95px;
	}

	.box_content_text {
		font-size:11px;
		float:left;
		margin:0px 0 0 3px;
		width:85%;
		overflow:hidden;
		height:95px;  
	}




	.sidebarcontent {
		margin: -10px 0 0 0px;
		background-repeat:no-repeat;
		height:100px;
		padding:10px;
	}

	#left
	{
	font-family:Trebuchet MS;
	width: 420px;
	padding: 10px;
	}


	#right
	{
	font-family:"Trebuchet MS";
	float: right;
	width: 220px;
	}

	ul#langmenu {
		list-style : none; margin : 0;
		margin-right:10px;
	    text-align: center;
	    font-size:11px;
	}

	ul#langmenu li {
		color:#bbbbbb;
		float:right;
	}

	ul#langmenu li a {
		color:#bbbbbb;
		text-decoration:none;
	}



<?php echo $content['CSS']; ?>
</style>
<script type="text/javascript">
<?php echo $content['JS']; ?>




var DropNavigation = new Class({
	initialize: function(elements){
		this.timer = null;
		this.active = null;
		this.elements = $$(elements);
		this.elements.each(function(el){
			el.addEvents({
				'mouseenter': this.show.pass(el,this),
				'mouseleave': this.leave.pass(el,this)
			});
		},this);
	},
	show: function(element){
		this.timer = $clear(this.timer);
		if (this.active === element) return false;
		if (this.active) this.hide(this.active);
		this.active = element;

		var subnav = element.getElement('ul');
		if (subnav) subnav.setStyle('display','block');
	},

	leave: function(element){
		this.timer = this.hide.delay(500,this,element);
	},

	hide: function(element){
		var subnav = element.getElement('ul');
		if (subnav) subnav.setStyle('display','none');
		this.active = null;
	}
});

window.addEvent('domready',function(){
	new DropNavigation($$('ul#menulist li.main'));
});
</script>
</head>
<body bgcolor="#dddddd" onload="">
<? if(isset($_GET['edit'])) {echo '<form name="edittext" method="POST" target="">';text::updateValues();} ?>
	<div id="main">
			<div id="menu">
					<?php
						$url_de_add = array(
							'lang'=>'de',
						);

						$url_en_add = array(
							'lang'=>'en',
						);

						$url_fr_add = array(
							'lang'=>'fr',
						);

						$url_it_add = array(
							'lang'=>'it',
						);
					?>
					<ul id="langmenu">
						<li><a href="<?php echo div::http_getURL($url_it_add); ?>">
							italiano
						</a></li>
						<li>&nbsp;|&nbsp;</li>
						<li><a href="<?php echo div::http_getURL($url_fr_add); ?>">
							français
						</a></li>
						<li>&nbsp;|&nbsp;</li>
						<!--<li><a href="<?php echo div::http_getURL($url_en_add); ?>">
							english
						</a></li>
						<li>&nbsp;|&nbsp;</li>-->
						<li><a href="<?php echo div::http_getURL($url_de_add); ?>">
							deutsch
						</a></li>
					</ul>-



					<ul id="menulist">
					    <li class="main">
					    	<a id="menuitem_1" class="menu_item" href="<?php echo div::http_getURL(array('id'=>'home.php'),'app_id'); ?>">
					    		<?php echo text::getText('fw_mainnav_overview'); ?>
					    	</a>

					    </li>

					    <li class="main">
					    	<a id="menuitem_2" class="menu_item" href="<?php echo div::http_getURL(array('id'=>'appartments.php'),'app_id'); ?>">
					    		<?php echo text::getText('fw_mainnav_appartments'); ?>
					    	</a>
					    <ul id="submenu_2">
					    	<li><a href="<?php echo div::http_getURL(array('id'=>'appartments.php'),'app_id'); ?>"><?php echo text::getText('fw_mainnav_appartments_overview'); ?></a></li>
					    	<li><a href="<?php echo div::http_getURL(array('id'=>'equipment.php'),'app_id'); ?>"><?php echo text::getText('fw_mainnav_appartments_equipment'); ?></a></li>
					    	<li><a href="<?php echo div::http_getURL(array('id'=>'prices.php'),'app_id'); ?>"><?php echo text::getText('fw_mainnav_appartments_prices'); ?></a></li>
					    	<li><a href="<?php echo div::http_getURL(array('id'=>'toknow.php'),'app_id'); ?>"><?php echo text::getText('fw_mainnav_appartments_toknow'); ?></a></li>
					    </ul>
						</li>

					    <li class="main">
					    	<a id="menuitem_3" class="menu_item" href="<?php echo div::http_getURL(array('id'=>'arrival.php'),'app_id'); ?>">
					    	<?php echo text::getText('fw_mainnav_destination'); ?>
					    </a>
					    <ul id="submenu_3"><li><a href="<?php echo div::http_getURL(array('id'=>'arrival.php'),'app_id'); ?>"><?php echo text::getText('fw_mainnav_destination_arrival'); ?></a></li></ul>
					    </li>

					    <li class="main">
					    	<a id="menuitem_4" class="menu_item" href="<?php echo div::http_getURL(array('id'=>'activities.php'),'app_id'); ?>">
					    	<?php echo text::getText('fw_mainnav_activities'); ?>
					    </a>
					    <!--<ul id="submenu_4">
					    	<li><a href="">Golf</a></li>
					    	<li><a href="">Ski</a></li>
					    </ul>-->
					    </li>

					    <li class="main">
					    	<a id="menuitem_5" class="menu_item" href="<?php echo div::http_getURL(array('id'=>'reservation.php'),'app_id'); ?>">
					    	<?php echo text::getText('fw_mainnav_contact'); ?>
					    </a>
					    <ul id="submenu_5">
					    	<li><a href="<?php echo div::http_getURL(array('id'=>'contact.php'),'app_id'); ?>"><?php echo text::getText('fw_mainnav_contact_address'); ?></a></li>
					    	<li><a href="<?php echo div::http_getURL(array('id'=>'reservation.php'),'app_id'); ?>"><?php echo text::getText('fw_mainnav_contact_reservation'); ?></a></li>
					    </ul>
					    </li>
  					</ul>
			</div>

			<div id="content">

			<?php
			echo $content['main'];
			?>
			</div>
			<div id="footer">
			<!--<ul id="footermenu">
				<li><a href="<?php echo div::http_getURL(array('id'=>'impressum.php')); ?>"><?php echo text::getText('fw_footnav_impressum'); ?></a></li>
				<li>&nbsp;|&nbsp;</li>
				<li><a href="<?php echo div::http_getURL(array('id'=>'sitemap.php')); ?>"><?php echo text::getText('fw_footnav_sitemap'); ?></a></li>
			</ul>-->
				<div style="text-align:right;padding:4px">Ferienwohnungen Adora & Selika | Thelweg | 3953 Leuk | +41 (0)33 855 30 55 | <a href="mailto:info@ferienwallis.com">info@ferienwallis.com</a></div>

			</div>

		</div>
        
        <? if(isset($_GET['edit'])) { echo '<input type="hidden" value="'.$lang.'" name="lang"><input type="submit" value="speichern" name="submit"></form>';}?>
</body>

</html>