<?php

$welcome_images = array(
	'images/welcome.jpg',
	'images/welcome2.jpg',
	'images/welcome3.jpg'
);

$welcome_image = $welcome_images[rand(0,count($welcome_images)-1)];
$content=array();
$content['main']='

<div id="right">
	<div id="sidebar">


		<div class="box">
			<div class="box_header">
				<h2>'.text::getText('fw_contact_resBox_header').'</h2>
			</div>
			<div class="box_content">

				<div class="box_content_text">               
					<p style="width:100%">'.text::getText('fw_contact_resBox_content').'</p>
					<a href="index.php?id=reservation.php">'.text::getText('fw_contact_resBox_link').'</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="left">
<h2>'.text::getText('fw_contact_header').'</h2>
	<p>Ferienohnungen Adora & Selika<br>
   Thelweg<br>
   CH - 3953 Leuk<br>
<br></p>
<table border=0>
<tr>
<td style="padding-right:7px">Mail:</td><td width="100px"><a href="mailto:info@ferienwallis.com">info@ferienwallis.com</a></td>
</tr>
<tr>
<td>Tel.:</td><td>+41 (0)33 855 30 55</td>
</tr>
<tr>
<td>Tel.:</td><td>+41 (0)79 611 66 52</td>
</tr>
<tr>
<td>Fax:</td><td>+41 (0)33 855 30 56</td>
</tr>

</table>
<p>Tel.('.text::getText('fw_contact_forENFR').'): +41 (0)79 417 45 42</p>
</div>

';


?>
