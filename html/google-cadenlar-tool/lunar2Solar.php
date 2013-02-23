<?php 
/**
 * Write:gxk
 * 2012-1-3
 */

session_start();
global $lunarInfo, $ganArr, $zhiArr, $animalArr, $jieqiArr, $jieqiInfo, $numArr, $monthArr, $dayArr;
//农历相关信息
$lunarInfo = array(19416, 19168, 42352, 21717, 53856, 55632, 91476, 22176, 
	39632, 21970, 19168, 42422, 42192, 53840, 119381, 46400, 54944, 44450, 38320, 
	84343, 18800, 42160, 46261, 27216, 27968, 109396, 11104, 38256, 21234, 18800, 25958, 
	54432, 59984, 28309, 23248, 11104, 100067, 37600, 116951, 51536, 54432, 120998, 
	46416, 22176, 107956, 9680, 37584, 53938, 43344, 46423, 27808, 46416, 86869, 19872, 
	42416, 83315, 21168, 43432, 59728, 27296, 44710, 43856, 19296, 43748, 42352, 21088, 
	62051, 55632, 23383, 22176, 38608, 19925, 19152, 42192, 54484, 53840, 54616, 46400, 
	46752, 103846, 38320, 18864, 43380, 42160, 45690, 27216, 27968, 44870, 43872, 38256, 
	19189, 18800, 25776, 29859, 59984, 27480, 21952, 43872, 38613, 37600, 51552, 55636, 
	54432, 55888, 30034, 22176, 43959, 9680, 37584, 51893, 43344, 46240, 47780, 44368, 
	21977, 19360, 42416, 86390, 21168, 43312, 31060, 27296, 44368, 23378, 19296, 42726, 
	42208, 53856, 60005, 54576, 23200, 30371, 38608, 19415, 19152, 42192, 118966, 53840, 
	54560, 56645, 46496, 22224, 21938, 18864, 42359, 42160, 43600, 111189, 27936, 44448, 84835);
$ganArr = array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
$zhiArr = array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
$animalArr = array("鼠","牛","虎","兔","龙","蛇","马","羊","猴","鸡","狗","猪");
$jieqiArr = array("小寒", "大寒", "立春", "雨水", "惊蛰", "春分", "清明", "谷雨", "立夏", 
	"小满", "芒种", "夏至", "小暑", "大暑", "立秋", "处暑", "白露", "秋分", "寒露", "霜降", 
	"立冬", "小雪", "大雪", "冬至");
//节气相关信息
$jieqiInfo = array(0, 21208, 42467, 63836, 85337, 107014, 128867, 150921, 173149, 
	195551, 218072, 240693, 263343, 285989, 308563, 331033, 353350, 375494, 397447, 
	419210, 440795, 462224, 483532, 504758);
$numArr = array("日","一","二","三","四","五","六","七","八","九","十");
$monthArr = array("正", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "腊");
$dayArr = array("初","十","廿","卅");

function getLunarDayName($day) {
	global $dayArr, $numArr;
	$name = '';
		switch ($day) {
		case 10:
				$name = "初十";
				break;
		case 20:
				$name = "二十";
				break;
		case 30:
				$name = "三十";
				break;
		default:
				$name = $dayArr[(floor($day / 10))];
				$name .= $numArr[$day % 10];
		}
		return $name;
}
function getLunarMonthDays($year, $month) {
	global $lunarInfo;
	return (($lunarInfo[$year - 1900] & (65536 >> $month)) ? 30 : 29);
}
function getLunarYearDays($year) {
	global $lunarInfo;
		$days = 348;
		for ($o = 32768; $o > 8; $o >>= 1) {
				$days += (($lunarInfo[$year - 1900] & $o) ? 1 : 0);
		}
		return ($days + getLeapMonthDays($year));
}
function getLeapMonthDays($year) {
	global $lunarInfo;
		if (getLeapMonth($year)) {
				return ($lunarInfo[$year - 1900] & 65536) ? 30 : 29;
		} else {
				return 0;
		}
}
function getLeapMonth($year) {
	global $lunarInfo;
		return $lunarInfo[$year - 1900] & 15;
}
//农历年月日获得公历时间
function getSolar($year, $month, $day){
	//2011年正月初一距离2011年1月1日33天
	$totalDays = 33;
	for($i=2011; $i<$year; $i++){
		$totalDays += getLunarYearDays($i);
	}

	for($i=1;$i<=$month-1;$i++){
		$totalDays += getLunarMonthDays($year, $i);
	}
	
	$leapMonth = getLeapMonth($year);
	if($leapMonth < $month){
		$totalDays += getLeapMonthDays($year);
	}
	$totalDays += $day-1;

	//当前$totalDays为距离2011年1月1日的天数
	return strtotime("2011-01-01 +{$totalDays}days");
}

function createIcs($date){
	$uid = md5(uniqid(rand(), true));
	$created = date('Ymd\THis\Z');
		$icsStr .= "BEGIN:VEVENT
DTSTART:{$date}T010000Z
DTEND:{$date}T020000Z
DTSTAMP:{$created}
UID:{$uid}@guoxk.com
CREATED:{$created}
DESCRIPTION:{$_SESSION['description']}
LAST-MODIFIED:{$created}
LOCATION:{$_SESSION['location']}
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:{$_SESSION['summary']}
TRANSP:TRANSPARENT
";
if($_SESSION['email'])
	$icsStr .= "BEGIN:VALARM
ACTION:EMAIL
DESCRIPTION:This is an event reminder
SUMMARY:Alarm notification
ATTENDEE:mailto:{$_SESSION['email']}
TRIGGER:-P1D
END:VALARM
";
$icsStr .= "END:VEVENT
";
	return $icsStr;
}

$thisYear = date('Y');
$toYear = 2037;
if($_REQUEST['act'] == 'show'){
	
	$_SESSION['lunarMonth'] = $_POST['lunarMonth'];
	$_SESSION['lunarDay'] = $_POST['lunarDay'];
	$_SESSION['location'] = $_POST['location'];
	$_SESSION['summary'] = $_POST['summary'];
	$_SESSION['description'] = $_POST['description'];
	$_SESSION['email'] = $_POST['email'];
	
	$monthName = $monthArr[$_SESSION['lunarMonth']-1];
	$dayName = getLunarDayName($_SESSION['lunarDay']);
	echo "<table cellpadding='5' ><tr><th>年份</th><th>{$monthName}月{$dayName}</th></tr>";
	for ($i = $thisYear; $i<=$toYear; $i++ ){
		$tempTime = getSolar($i, $_SESSION['lunarMonth'], $_SESSION['lunarDay']);
		$date = date('m月d日', $tempTime);
		echo "<tr><td>{$i}</td><td>{$date}</td></tr>";
	}
	echo '</table>';
	exit();
}elseif($_REQUEST['act'] == 'export'){
	if(!$_SESSION['summary'] || !$_SESSION['lunarMonth'] || !$_SESSION['lunarDay']){
		exit('-1');
	}
	$icsStr = "BEGIN:VCALENDAR
PRODID:-//Google Inc//Google Calendar 70.9054//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:gxk9933@163.com
X-WR-TIMEZONE:Asia/Shanghai
BEGIN:VTIMEZONE
TZID:Asia/Shanghai
X-LIC-LOCATION:Asia/Shanghai
BEGIN:STANDARD
TZOFFSETFROM:+0800
TZOFFSETTO:+0800
TZNAME:CST
DTSTART:19700101T000000
END:STANDARD
END:VTIMEZONE
";
	for ($i = $thisYear; $i<=$toYear; $i++ ){
		$tempTime = getSolar($i, $_SESSION['lunarMonth'], $_SESSION['lunarDay']);
		$date = date('Ymd', $tempTime);
		$icsStr .= createIcs($date);
	}
	$icsStr .= "END:VCALENDAR";
	header("charset=utf-8");
	header("Content-Disposition:attachment;filename={$_SESSION['lunarMonth']}-{$_SESSION['lunarDay']}.ics");
	
	echo $icsStr;
	exit();
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>谷歌日历工具</title>
		<meta content="text/html;charset=utf-8" http-equiv="content-type">
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript">
		google.load("jquery","1.3.2");
		</script>
		
	</head>

	<body>
	<form id="lunar2Solar" action="" method="POST" >
	农历转公历&nbsp;&nbsp;
	<input type="submit" value="转换"/><br/><br/>
	内容：<input name="summary" value="" /><br/><br/>
	农历月：<select name="lunarMonth">
	<?php 
	for($i=1 ; $i<=12 ;$i++){
		$monthName = $monthArr[$i-1];
		echo "<option value='{$i}'>{$monthName}月</option>";
	}
	?>
	</select>
	&nbsp;
	农历日：<select name="lunarDay">
	<?php 
	for($i=1 ; $i<=30 ;$i++){
		$dayName = getLunarDayName($i);
		echo "<option value='{$i}'>{$dayName}</option>";
	}
	?>
	</select>
	<br/><br/>
	地点：<input name="location" value="" /><br/><br/>
	说明：<textarea name="description" value=""></textarea><br/><br/>
	提醒邮件：<input name="email" value="" /><br/><br/>
	<input type="submit" value="转换"/>
	</form>
	<div id="result"></div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#lunar2Solar').submit(function(){
				var summary = $('input[name=summary]').val();
				if(!summary){
					alert('请填写内容');return false;
					}
				$.ajax({
					type:"POST",
					url:"./lunar2Solar.php?act=show",
					data:$(this).serialize(),
					error:function(){alert('error'); },
					success:function(html){
						$('#result').html(html);
						window.location='?act=export';			
					}
				});
				return false;
			});
		});
	
	</script>
	</body>
</html>