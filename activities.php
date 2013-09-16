<?
$content=array();

$content['CSS'].='
#content img {
	margin-left:-19px;
	margin-bottom:10px;
}

#content h4 {
	font-size:12px;
	color:#ffffff;
	background-color:'.$colors[$color]['light'].';
	margin:0;
	margin-left:-20px;
	width:690px;
	height:15px;
	padding:7px;
	padding-left:19px;
	margin-top:20px;
}';

$content['main'].='<h2>'.text::getText('fw_activities_header').'</h2>
<h3>'.text::getText('fw_activities_hiking_header').'</h3>
<p>'.text::getText('fw_activities_hiking_text').'</p>
<h3>'.text::getText('fw_activities_sports_summer_header').'</h3>
<p>'.text::getText('fw_activities_sports_summer_text').'</p>
<h3>'.text::getText('fw_activities_sports_winter_header').'</h3>
<p>'.text::getText('fw_activities_sports_winter_text').'</p>
<h3>'.text::getText('fw_activities_wellness_header').'</h3>
<p>'.text::getText('fw_activities_wellness_text').'</p>
<h3>'.text::getText('fw_activities_kids_header').'</h3>
<p>'.text::getText('fw_activities_kids_text').'</p>';


?>