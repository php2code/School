<?php
ob_start();
require_once('../../config/config.php');
ob_get_clean();

if(!isset($_SESSION['userId'])) {
	header("location:".SITEURL."app/index.php");
	exit;
}

// fetching student attendance all records -->
$student_id = $_SESSION['userId'];
//setting month -->
if((int)$_GET['month'])
	$month	=	$_GET['month'];
else
	$month	=	date("n",time());
// setting year ---->
if((int)$_GET['year'])
	$year	=	$_GET['year'];
else
	$year	=	date("Y",time());
$sel_attd	=	"
	SELECT 
		* 
	FROM 
		student_attendance AS SATTD,attendance_date as ATTD_D 
	WHERE 
		SATTD.attendance_date_id = ATTD_D.date_id 
		AND SATTD.attendance_student_id=$student_id
		AND date_month ='".$month."' 
		AND date_year ='".$year."' 
	ORDER BY
		ATTD_D.date_id DESC  ";//echo $sel_attd;

		

$rs_attd	=	$objDb->GetAll($sel_attd);



/*---- attendance calander start -----*/

function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array(), $arr_attendance)
{

    $first_of_month = gmmktime(0,0,0,$month,1,$year);
    #remember that mktime will automatically correct if invalid dates are entered
    # for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
    # this provides a built in "rounding" feature to generate_calendar()

    $day_names = array(); #generate all the day names according to the current locale
    for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
        $day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name

    list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
    $weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
    $title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names

    #Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
    @list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
    if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
    if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
    $calendar = '<table align="center" id="rounded-corner" class="calendar">'."\n".
        '<!--caption class="calendar-month">'.$p.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).$n."</caption-->\n<thead><tr>";

    if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
        #if day_name_length is >3, the full name of the day will be printed
		
		$class="rounded-company";
		$i=0;
        foreach($day_names as $d)
		{
			$i++;
            $calendar .= '<th scope="col" class="'.$class.'" abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
			if($i==6)
			$class="rounded-q4";
			else
			$class="rounded-q3";
			
		}
		$msg="Attendance report not found for $title";
		if(count($arr_attendance)>0)
		{
			$msg="Attendance report for $title";
		}
        $calendar .= '</tr></thead>'."\n".' <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>'.$msg.'</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>
        </tr>
    </tfoot><tr>';
    }

    if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
    for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
        if($weekday == 7){
            $weekday   = 0; #start a new week
            $calendar .= "</tr>\n<tr>";
        }
        if(isset($days[$day]) and is_array($days[$day])){
            @list($link, $classes, $content) = $days[$day];
            if(is_null($content))  $content  = $day;
            $calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>').
                ($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>';
        }		
		else 
		{
			if($arr_attendance[$day]=='A')
			{
				$class_att='attendance-absent';
			}
			else
			{
				$class_att='attendance-present';
			}
			$calendar .= "<td><span id='day'>$day</span><span id='$class_att'>".$arr_attendance[$day]."</span></td>";
		}
		
		
        
    }
    if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days

    return $calendar."</tr>\n</table>\n";
}

  $time = time();

    //$oldlocale = setlocale(LC_TIME, NULL); #save current locale

    //setlocale(LC_TIME, 'es_ES'); #Spanish
	
	foreach($rs_attd as $k=>$v)
	{
	
		$arr_attendance[$v['date_day']]=$v['attendance_check'];
	}
	
    $attendance_calander= generate_calendar($year, $month, NULL, 3, NULL, 1,array(),$arr_attendance);
/*---- attendance calander end -----*/


$objTpl->assign('attendance_calander', $attendance_calander);

$objTpl->assign('login_error', $login_error);
$objTpl->assign('sess', $sess);
$objTpl->assign('month', $month);
$objTpl->assign('year', (int)$year);
$objTpl->assign('cyear', (int)date("Y",time()));
$objTpl->assign('attd_records', $rs_attd);
$objTpl->display('student/student_attendance.tpl');
?>