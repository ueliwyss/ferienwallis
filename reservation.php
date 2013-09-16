<?

$sendTo=array(
	'ueliwyss@gmx.ch',
	'refim@ntel.ch','wewebgmbh@gmail.com'
);




function getpost($wert)
{

	If ($_GET[$wert] == "") {
         	return $_POST[$wert];
         } else {
         	return $_GET[$wert];
	}

}

$allright = true;
$style = " style='border:2px solid #FF0000;color:#FF0000;font-weight:bold'";
function style($Zahl,$Null,$Text) {
	global $allright;
	If (getpost('control') == "control") {
	        	If ($Zahl == "") {
	                 	If ($Null == false) {
		                         return true;
		                         $allright=false;

		                  } else {
	                           	return false;
	                             }
		         } else {
		         If (Is_Numeric($Zahl) == false And $Text == false) {
	                             return true;
	                             $allright=false;

		            } else {
	                      		return false;
	                       }
		         }
	}
}



$content=array();

if($_POST['send']) {
	global $db;

	$content['main'].='<h2>Vielen Dank!</h2>
	<tr><td class="Bold" style="padding-top:20px"><br>Ihre Anfrage wurde erfolgreich versandt! <br>Wir werden Sie in den nächsten Tagen per E-Mail oder Tel. kontaktieren.</td></tr>';

	$email='Reservationsanfrage:<br>
	<br>
	'.$_POST['name'].' '.$_POST['vorname'].'<br>
	'.$_POST['adresse'].'<br>
	'.$_POST['plz'].' '.$_POST['ort'].'<br>
	<br>
	Tel.:&#009;'.$_POST['Tel_Nr'].'<br>
	E-Mail:&#009;'.$_POST['EMail'].'<br>

	Anzahl Personen:&#009;'.$_POST['personen'].'<br>
	Davon Kinder:&#009;'.$_POST['kinder'].'<br>
	Wohnungsgrösse:&#009;'.$_POST['wohnungsgroesse'].'<br>
	Ankunftsdatum:&#009;'.$_POST['ankunft'].'<br>
	Abreisedatum:&#009;'.$_POST['abreise'].'<br>
	<br>
	Bemerkungen:<br>
	'.$_POST['bemerkungen'];

	$header='MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$header.='From:Ferienwallis.com <'.$_POST['EMail'].'>';

	foreach($sendTo as $address) {
		mail($address,'Reservationsanfrage',$email,$header);
	}

} else {
$content['header'].=div::htm_includeJSFile('datepicker.js');
$content['header'].=div::htm_includeJSFile('admin/library/jsfunc.validateform.js');
$content['header'].='<SCRIPT LANGUAGE="JavaScript" ID="js4">
var cal4 = new CalendarPopup("testdiv1");
cal4.setMonthNames(\''.text::getText('fw_common_months_january').'\',\''.text::getText('fw_common_months_february').'\',\''.text::getText('fw_common_months_march').'\',\''.text::getText('fw_common_months_april').'\',\''.text::getText('fw_common_months_may').'\',\''.text::getText('fw_common_months_june').'\',\''.text::getText('fw_common_months_july').'\',\''.text::getText('fw_common_months_august').'\',\''.text::getText('fw_common_months_september').'\',\''.text::getText('fw_common_months_october').'\',\''.text::getText('fw_common_months_november').'\',\''.text::getText('fw_common_months_december').'\');
cal4.setDayHeaders(\''.text::getText('fw_common_days_abbrev_sunday').'\',\''.text::getText('fw_common_days_abbrev_monday').'\',\''.text::getText('fw_common_days_abbrev_tuesday').'\',\''.text::getText('fw_common_days_abbrev_wednesday').'\',\''.text::getText('fw_common_days_abbrev_thursday').'\',\''.text::getText('fw_common_days_abbrev_friday').'\',\''.text::getText('fw_common_days_abbrev_saturday').'\');
cal4.setWeekStartDay(1);
cal4.setTodayText("'.text::getText('fw_common_today').'");
cal4.setCssPrefix("TEST");
</SCRIPT>
<style type="text/css">
	.TESTcpYearNavigation,
	.TESTcpMonthNavigation
			{
			background-color:#FFFFFF;
			text-align:center;
			vertical-align:center;
			text-decoration:none;
			color:#CE5706;
			font-weight:bold;
			}
	.TESTcpDayColumnHeader,
	.TESTcpYearNavigation,
	.TESTcpMonthNavigation,
	.TESTcpCurrentMonthDate,
	.TESTcpCurrentMonthDateDisabled,
	.TESTcpOtherMonthDate,
	.TESTcpOtherMonthDateDisabled,
	.TESTcpCurrentDate,
	.TESTcpCurrentDateDisabled,
	.TESTcpTodayText,
	.TESTcpTodayTextDisabled,
	.TESTcpText
			{
			font-family:arial;
			font-size:8pt;
			}
	TD.TESTcpDayColumnHeader
			{
			text-align:right;
			border-bottom:1px solid black;
			border-width:0 0 1 0;
			}
	.TESTcpCurrentMonthDate,
	.TESTcpOtherMonthDate,
	.TESTcpCurrentDate
			{
			text-align:right;
			text-decoration:none;
			}
	.TESTcpCurrentMonthDateDisabled,
	.TESTcpOtherMonthDateDisabled,
	.TESTcpCurrentDateDisabled
			{
			color:#D0D0D0;
			text-align:right;
			text-decoration:line-through;
			}
	.TESTcpCurrentMonthDate
			{
			color:#EFB68F;
			font-weight:bold;
			}
	.TESTcpCurrentDate
			{
			color: #FFFFFF;
			font-weight:bold;
			}
	.TESTcpOtherMonthDate
			{
			color:#808080;
			}
	TD.TESTcpCurrentDate, TD.TESTcpCurrentDate a
			{
			color:#ffffff!important;
			background-color: #CE5706;
			border-width:1;
			}
	TD.TESTcpCurrentDateDisabled
			{
			border-width:1;
			border:solid thin #FFAAAA;
			}
	TD.TESTcpTodayText,
	TD.TESTcpTodayTextDisabled
			{
			border:solid thin #CE5706;
			border-width:1 0 0 0;
			}
	A.TESTcpTodayText,
	SPAN.TESTcpTodayTextDisabled
			{
			height:20px;
			}
	A.TESTcpTodayText
			{
			color:#CE5706;
			font-weight:bold;
			}
	SPAN.TESTcpTodayTextDisabled
			{
			color:#D0D0D0;
			}
	.TESTcpBorder
			{
			border:solid thin #CE5706;
			}
	.form_text_error {
		font-family:tahoma,verdana;
		font-size:12px;
		border:2px solid #980000;
		background-color:#FFFFFF;
	}

	.form_select_error {
		font-family:tahoma,verdana;
		font-size:12px;
		font-weight:bold;
		border:2px solid #980000;
		background-color:#980000;
		color:#000000;
	}
	.form_textarea_error {
		font-family:tahoma,verdana;
		font-size:12px;
		border:2px solid #980000;
	}
</style>
';

$content['main'].='<h2>'.text::getText('fw_reservation_header').'</h2>';


$content['main'].='<form name="reservation" method="POST"
onsubmit="if(!validateForm(\'reservation\',\'_EMAIL,EMail,true,E-Mail,_EREG,,^[1-9],personen,true,Anzahl Personen,_EREG,,^[0-9],kinder,true,Anzahl Kinder,_EREG,,^(([0-2]?[0-9]|3[0-1]).([0]?[1-9]|1[0-2]).[1-3][0-9][0-9][0-9])$,ankunft,true,Ankunftsdatum,_EREG,,^(([0-2]?[0-9]|3[0-1]).([0]?[1-9]|1[0-2]).[1-3][0-9][0-9][0-9])$,abreise,true,Abreisedatum,name,true,Name,vorname,true,Vorname,adresse,true,Adresse,_EREG,,^[0-9],plz,true,PLZ,ort,true,Ort,Tel_Nr,true,Tel. Nr.\',\'\')) { return errMessage(\'step1\',\'Es wurden nicht alle Felder korrekt ausgfüllt!\',\'Überprüfen Sie bitte die Rot umrandeten Felder.\', \'submit\', 6000); }; this.onsubmit=\'\';">
<table style="margin-top:0px">
<tr><td  colspan=3 class="Bold" style="padding-top:20px"><br>'.text::getText('fw_reservation_description').'</td></tr>
<tr><td style="padding-top:10px">'.text::getText('fw_reservation_persons').'<span class="special">*</span></td>
<td style="padding-top:10px"><input type="Text" name="personen" value="0" size=3" maxlength="" errorClass="form_text_error">
</td></tr>
<tr><td>'.text::getText('fw_reservation_children').'</td>
<td><input type="Text" name="kinder" value="0" size="3" maxlength="" errorClass="form_text_error">
</td></tr>
<tr><td>'.text::getText('fw_reservation_appartmentSize').'</td>
<td><select name="wohnungsgroesse" errorClass="form_select_error">
<option value="">'.text::getText('fw_common_choose').'</option>
<option value="2 Zimmer">2 '.text::getText('fw_common_room').'</option>
<option value="2.5 Zimmer">2½ '.text::getText('fw_common_room').'</option>
<option value="3 Zimmer">3½ '.text::getText('fw_common_room').'</option>
<option value="3.5 Zimmer">4½ '.text::getText('fw_common_room').'</option>
<option value="4.5 Zimmer">5½ '.text::getText('fw_common_room').'</option>
<option value="6.5 Zimmer">6½ '.text::getText('fw_common_room').'</option>
</select>
</td></tr>
<tr><td><option value="3">'.text::getText('fw_reservation_arrivaldate').'</option><span class="special">*</span></td>
<td><input type="Text" name="ankunft" value="" size="20" maxlength="" errorClass="form_text_error"><A HREF="#" onClick="cal4.select(document.forms[0].ankunft,\'anchor5\',\'dd.MM.yyyy\'); return false;" TITLE="cal4.select(document.forms[0].date4,\'anchor5\',\'dd/MM/yyyy\'); return false;" NAME="anchor5" ID="anchor5"><img src="images/calendar.png"></A>
</td></tr>

<tr><td>'.text::getText('fw_reservation_departuredate').'<span class="special">*</span></td>
<td><input type="Text" name="abreise" value="" size="20" maxlength="" errorClass="form_text_error"><A HREF="#" onClick="cal4.select(document.forms[0].abreise,\'anchor4\',\'dd.MM.yyyy\'); return false;" TITLE="cal4.select(document.forms[0].date4,\'anchor4\',\'dd/MM/yyyy\'); return false;" NAME="anchor4" ID="anchor4"><img src="images/calendar.png"></A>
</td></tr>

<tr><td class="Bold" style="padding-top:20px"><br>'.text::getText('fw_reservation_comment').'</td></tr>
<tr><td colspan=3><textarea name="bemerkungen" errorClass="form_textarea_error"></textarea></td></tr>

<tr><td colspan=3 class="Bold"><br>'.text::getText('fw_reservation_personalInfo').'</td></tr>
<tr><td height="20" width="100" style="padding-top:15px">'.text::getText('fw_reservation_name').'<span class="special">*</span></td>
<td style="padding-top:15px"><input type="Text" name="name" value="" size="30" maxlength="" errorClass="form_text_error">
</td></tr>

<tr><td>'.text::getText('fw_reservation_prename').'<span class="special">*</span></td>
<td><input type="Text" name="vorname" value="" size="30" maxlength="" errorClass="form_text_error">
</td></tr>

<tr><td>'.text::getText('fw_reservation_address').'<span class="special">*</span></td>
<td><input type="Text" name="adresse" value="" size="30" maxlength="" errorClass="form_text_error">
</td></tr>

<tr><td height="20">'.text::getText('fw_reservation_zip/city').'<span class="special">*</span></td>
<td><input type="Text" name="plz" value="" size="4" maxlength="5" errorClass="form_text_error">

<input type="Text" name="ort" value="" size="21" maxlength="" errorClass="form_text_error">
</td></tr>

<tr><td style="padding-top:10px">'.text::getText('fw_reservation_tel').'<span class="special">*</span></td>
<td style="padding-top:10px"><input type="Text" name="Tel_Nr" value="" size="30" maxlength="" errorClass="form_text_error">
</td></tr>

<tr><td>'.text::getText('fw_reservation_email').'<span class="special">*</span></td><td><input type="Text" name="EMail" value="" size="30" maxlength="" errorClass="form_text_error">
</td></tr>



<tr><td colspan=3>(<span class="special">*</span>)'.text::getText('fw_reservation_requiredFields').'</td></tr>
<tr><td colspan=3 style="text-align:center"><input type="Submit" id="submit" name="Submit" align="center" value="'.text::getText('fw_reservation_submit').'"></td></tr>
<tr><td colspan=3>';



$content['main'].='</td></tr>
</table>

<input type="hidden" name="send" value="1">





</td></tr>

</table>
</form>
<DIV ID="testdiv1" STYLE="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>

';
}
