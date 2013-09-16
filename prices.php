<?
$content=array();

$content['main'].='<h2>'.text::getText('fw_appartments_prices').'</h2>';

if($_GET['app_id']) {
	$content['main'].='<p style="text-align:right">
	<a href="'.div::http_getURL(array('id'=>'appartments.php'),'app_id').'#app_'.$_GET['app_id'].'">'.text::getText('fw_appartments_prices_backLink').'</a>
	</p>';
}

$price=new appartment_price();
$calendar=$price->getPriceCalendar($_GET['app_id']);
div::htm_mergeSiteContent($content,$calendar);

?>