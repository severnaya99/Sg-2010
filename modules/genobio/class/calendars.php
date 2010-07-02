<?php

class HijriCalendar
{
   function monthName($i) // $i = 1..12
   {
       static $month  = array("Muharram ul Haram", "Safar", "Rabi' al-awwal", "Rabi' al-akhir",
           "Jumada al-awwal", "Jumada al-akhir", "Rajab", "Sha'aban",
           "Ramadan", "Shawwal", "Dhu al-Qi'dah", "Dhu al-Hijjah");
       return $month[$i-1];
   }

   function GregorianToHijri($time = null)
   {
       if ($time === null) $time = time();
       $m = date('m', $time);
       $d = date('d', $time);
       $y = date('Y', $time);

       return HijriCalendar::JDToHijri(
           cal_to_jd(CAL_GREGORIAN, $m, $d, $y));
   }

   function HijriToGregorian($m, $d, $y)
   {
       return jd_to_cal(CAL_GREGORIAN,
           HijriCalendar::HijriToJD($m, $d, $y));
   }

   # Julian Day Count To Hijri
   function JDToHijri($jd)
   {
       $jd = $jd - 1948440 + 10632;
       $n  = (int)(($jd - 1) / 10631);
       $jd = $jd - 10631 * $n + 354;
       $j  = ((int)((10985 - $jd) / 5316)) *
           ((int)(50 * $jd / 17719)) +
           ((int)($jd / 5670)) *
           ((int)(43 * $jd / 15238));
       $jd = $jd - ((int)((30 - $j) / 15)) *
           ((int)((17719 * $j) / 50)) -
           ((int)($j / 16)) *
           ((int)((15238 * $j) / 43)) + 29;
       $m  = (int)(24 * $jd / 709);
       $d  = $jd - (int)(709 * $m / 24);
       $y  = 30*$n + $j - 30;

       return array($m, $d, $y);
   }

   # Hijri To Julian Day Count
   function HijriToJD($m, $d, $y)
   {
       return (int)((11 * $y + 3) / 30) +
           354 * $y + 30 * $m -
           (int)(($m - 1) / 2) + $d + 1948440 - 385;
   }
};


function JapaneseCalendar($unix_time, $gmt, $monthsystem = 0) {

	$months[0]['name'] = array(	'ichigatsu','nigatsu','sangatsu',
								'shigatsu','gogatsu','rokugatsu',
								'shichigatsu','hachigatsu','kugatsu',
								'jugatsu','juichigatsu','junigatsu');
								
	$months[0]['cause'] = array(	'first month',
								'second month',
								'third month',
								'forth month',
								'fifth month',
								'six month',
								'seventh month',
								'eighth month',
								'ninth month',
								'tenth month',
								'elventh month',
								'twelve month');

	$months[1]['name'] = array(	'mutsuki','kinusaragi','yayoi',
								'uzuki','satsuki','minatsuki',
								'fumizuki','hazuki','nagatsuki',
								'kaminazuki','shimotsuki','shiwasu');
								
	$months[1]['cause'] = array(	'affection month',
								'changing clothes',
								'new life',
								'u-no-hana month',
								'fast month',
								'month of water',
								'book month',
								'leaf month',
								'long month',
								'month of gods',
								'frost month',
								'priests run');
								
	$days['roman'] = array(	'nichiyobi','getsuyobi','kayobi',
							'suiyobi','mokuyobi','kin\'yobi','doyobi');
	$days['element'] = array('Sun','Moon','Fire','Water','Wood','Gold','Earth');
	$days['day'] = array( 'tsuitachi','futsuka','mikka','yokka','itsuka',
							'muika','nanoka','yoka','kokonoka','toka',
							'juichinichi','juninichi','jusannichi','juyokka',
							'jugonichi','jurokunichi','jushichinichi','juhachinichi',
							'jukunichi','hatsuka','nijuichinichi',
							'nijuninichi','nijusannichi','nijuyokka','nijugonichi',
							'nijurokunichi','nijushichinichi','nijuhachinichi',
							'nijukunichi','sanjunichi','sanjuichinichi');
							
	return  array("date"=>$days['roman'][date('w', $unix_time)].' '.$days['day'][date('d', $unix_time)-1].' '.
			$months[$monthsystem]['name'][date('n', $unix_time)-1].' '.date('Y', $unix_time),
			"cause" => $days['element'][date('w', $unix_time)].' '.$months[$monthsystem]['cause'][date('n', $unix_time)-1],
			"time" => date('h:i:s A', $unix_time));
}

function RounCalendar($unix_time, $gmt, $poffset = '2008-05-11 14:45:38', $pweight = '-1.59999999979000000007349999997428', $defiency='deficient', $timeset= array("hours" => 24, "minutes" => 60, "seconds" => 60))
    {
    // Code Segment 1 – Calculate Floating Point
    $tme = $unix_time;

    if ($gmt>0){
        $gmt=-$gmt;
    } else {
        $gmt=abs($gmt);
    }
    
    $ptime = strtotime($poffset)+(60*60*gmt);
    $weight = $pweight+(1*gmt);

    $roun_xa = ($tme)/(24*60*60);
    $roun_ya = $ptime/(24*60*60);
    $roun = (($roun_xa -$roun_ya) - $weight)+(microtime/999999);
    
    // Code Segment 2 – Set month day arrays
    $nonedeficient = array("seq1" => array(31,30,31,30,30,30,31,30,31,30,31,30),
                           "seq2" => array(31,30,31,30,31,30,31,30,31,30,31,30),    
                           "seq3" => array(31,30,31,30,30,30,31,30,31,30,31,30),
                           "seq4" => array(31,30,31,30,30,30,31,30,31,30,31,30));

    $deficient =     array("seq1" => array(31,30,31,30,30,30,31,30,31,30,31,30),
                           "seq2" => array(31,30,31,30,31,30,31,30,31,30,31,30),    
                           "seq3" => array(31,30,31,30,31,30,31,30,30,30,31,30),
                           "seq4" => array(30,30,31,30,31,30,31,30,31,30,31,30));

    $monthusage = isset($defiency) ? ${$defiency} : $deficient;
    
    // Code Segment 3 – Calculate month number, day number, day count etc
    foreach($monthusage as $key => $item){
        $i++;
        foreach($item as $numdays){
            $ttl_num=$ttl_num+$numdays;
            $ttl_num_months++;
        }
    }
    
   	// As well as Function MayanTihkalCalendar
	$revolutionsperyear = $ttl_num / $i;
	$numyears = floor((ceil($roun) / $revolutionsperyear));
	$avg_num_month = $ttl_num_months/$i;
	$jtl = abs(abs($roun) - ceil($revolutionsperyear*($numyears+1)));
	while($month==0){
		$day=0;
		$u=0;
		foreach($monthusage as $key => $item){
			$t=0;   
			foreach($item as $numdays){
				$t++;
				$tt=0;
				for($sh=1;$sh<=$numdays;$sh++){
					$ii=$ii+1;
					$tt++;
					if ($ii==floor($jtl)){
						if ($roun<0){
							$daynum = $tt;
							$month = $t;
						} else {
							$daynum = $numdays-($tt-1);
							$month = $avg_num_month-($t-1);
						}
						$sequence = $key;
						$nodaycount=true;
					}
				}
				if ($nodaycount==false)
					$day++;
			}
			$u++;
		}
	}
    

    
    $timer = substr($roun, strpos($roun,'.')+1,strlen($roun)-strpos($roun,'.')-1);
    $roun_out= $numyears.'/'.$month.'/'.$daynum.' '.$day.'.'. floor(intval(substr($timer,0,2))/100*$timeset['hours']).':'. floor(intval(substr($timer,2,2))/100*$timeset['minutes']).':'. floor(intval(substr($timer,4,2))/100*$timeset['seconds']).'.'.substr($timer,6,strlen($timer)-6);
 
   $roun_obj = array('year'=>$numyears,'month'=>$month, 'day'=>$daynum, 'jtl'=>$jtl, 'day_count'=>$day,'hours'=>floor(intval(substr($timer,0,2))/100*$timeset['hours']),'minute'=> floor(intval(substr($timer,2,2))/100*$timeset['minutes']),'seconds'=> floor(intval(substr($timer,4,2))/100*$timeset['seconds']),'microtime'=>substr($timer,6,strlen($timer)-6),'strout'=>$roun_out);

    return $roun_obj;
}

function EgyptianCalendar($unix_time, $gmt, $poffset = '1970-02-26 7:45 PM', $pweight = '-9777600.22222222223', $defiency='nonedeficient', $timeset= array("hours" => 24, "minutes" => 60, "seconds" => 60))
    {
    // Code Segment 1 – Calculate Floating Point
    $tme = $unix_time;

    if ($gmt>0){
        $gmt=-$gmt;
    } else {
        $gmt=abs($gmt);
    }
    
    $ptime = strtotime($poffset)+(60*60*gmt);
    $weight = $pweight+(1*gmt);

    $roun_xa = ($tme)/(24*60*60);
    $roun_ya = $ptime/(24*60*60);
    $roun = (($roun_xa -$roun_ya) - $weight)+(microtime/999999);
    
    // Code Segment 2 – Set month day arrays
    $nonedeficient = array("seq1" => array(30,30,30,30,30,30,30,30,30,30,30,30,5));

	$monthnames = array("seq1" => array('Thoth','Phaophi','Athyr','Choiak','Tybi',
										'Mecheir','Phamenoth','Pharmuthi','Pachon',
										'Payni','Epiphi','Mesore','epagomenai'));
										
    $monthusage = isset($defiency) ? ${$defiency} : $deficient;
    
    // Code Segment 3 – Calculate month number, day number, day count etc
    foreach($monthusage as $key => $item){
        $i++;
        foreach($item as $numdays){
            $ttl_num=$ttl_num+$numdays;
            $ttl_num_months++;
        }
    }
    
   // You need to replace this section in Function EgyptianCalendar
	// As well as Function MayanTihkalCalendar
	$revolutionsperyear = $ttl_num / $i;
	$numyears = floor((ceil($roun) / $revolutionsperyear));
	$avg_num_month = $ttl_num_months/$i;
	$jtl = abs(abs($roun) - ceil($revolutionsperyear*($numyears+1)));
	while($month==0){
		$day=0;
		$u=0;
		foreach($monthusage as $key => $item){
			$t=0;   
			foreach($item as $numdays){
				$t++;
				$tt=0;
				for($sh=1;$sh<=$numdays;$sh++){
					$ii=$ii+1;
					$tt++;
					if ($ii==floor($jtl)){
						if ($roun<0){
							$daynum = $tt;
							$month = $t;
						} else {
							$daynum = $numdays-($tt-1);
							$month = $avg_num_month-($t-1);
						}
						$sequence = $key;
						$nodaycount=true;
					}
				}
				if ($nodaycount==false)
					$day++;
			}
			$u++;
		}
	}
    
	//$numyears = abs($numyears);
	
    $timer = substr($roun, strpos($roun,'.')+1,strlen($roun)-strpos($roun,'.')-1);
    $roun_out= $numyears.'/'.$month.'/'.$daynum.' '.$day.'.'. floor(intval(substr($timer,0,2))/100*$timeset['hours']).':'. floor(intval(substr($timer,2,2))/100*$timeset['minutes']).':'. floor(intval(substr($timer,4,2))/100*$timeset['seconds']).'.'.substr($timer,6,strlen($timer)-6);
 
    $roun_obj = array('year'=>$numyears,'month'=>$month, 'mname' => $monthnames[$sequence][$month-1],'day'=>$daynum, 'jtl'=>$jtl, 'day_count'=>$day,'hours'=>floor(intval(substr($timer,0,2))/100*$timeset['hours']),'minute'=> floor(intval(substr($timer,2,2))/100*$timeset['minutes']),'seconds'=> floor(intval(substr($timer,4,2))/100*$timeset['seconds']),'microtime'=>substr($timer,6,strlen($timer)-6),'strout'=>$roun_out);

    return $roun_obj;
}

function MayanTihkalCalendar($unix_time, $gmt, $poffset = '2012-12-21 8:24 PM', $pweight = '-1872000.22222222223', $defiency='nonedeficient', $timeset= array("hours" => 24, "minutes" => 60, "seconds" => 60))
    {
    // Code Segment 1 – Calculate Floating Point
    $tme = $unix_time;

    if ($gmt>0){
        $gmt=-$gmt;
    } else {
        $gmt=abs($gmt);
    }
    
    $ptime = strtotime($poffset)+(60*60*gmt);

    $roun_xa = ($tme)/(24*60*60);
    $roun_ya = $ptime/(24*60*60);
    $roun = (($roun_xa -$roun_ya) - $pweight)+(microtime/999999);
    
    // Code Segment 2 – Set month day arrays
    $nonedeficient = array("seq1" => array(20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,5));

	$monthnames = array("seq1" => array('Pop', 'Uo', 'Zip', 'Zot\'z', 'Tzec', 'Xul', 'Yaxkin', 'Mol', 
										'Ch\'en', 'Yax', 'Zac', 'Ceh', 'Mac', 'Kankin', 'Muan', 'Pax', 
										'Kayab', 'Cumku', 'Uayeb'));
	$daynames = array("seq1" => array('Imix', 'Ik', 'Akbal', 'Kan', 'Chicchan', 'Cimi','Manik', 'Lamat', 
									  'Muluc', 'Oc', 'Chuen', 'Eb', 'Ben', 'Ix', 'Men', 'Cib', 'Caban', 
									  'Etz\'nab', 'Cauac', 'Ahau'));
	
    $monthusage = isset($defiency) ? ${$defiency} : $deficient;
    
    // Code Segment 3 – Calculate month number, day number, day count etc
    foreach($monthusage as $key => $item){
        $i++;
        foreach($item as $numdays){
            $ttl_num=$ttl_num+$numdays;
            $ttl_num_months++;
        }
    }
    
	// As well as Function MayanTihkalCalendar
	$revolutionsperyear = $ttl_num / $i;
	$numyears = floor((ceil($roun) / $revolutionsperyear));
	$avg_num_month = $ttl_num_months/$i;
	$jtl = abs(abs($roun) - ceil($revolutionsperyear*($numyears+1)));
	while($month==0){
		$day=0;
		$u=0;
		foreach($monthusage as $key => $item){
			$t=0;   
			foreach($item as $numdays){
				$t++;
				$tt=0;
				for($sh=1;$sh<=$numdays;$sh++){
					$ii=$ii+1;
					$tt++;
					if ($ii==floor($jtl)){
						if ($roun<0){
							$daynum = $tt;
							$month = $t;
						} else {
							$daynum = $numdays-($tt-1);
							$month = $avg_num_month-($t-1);
						}
						$sequence = $key;
						$nodaycount=true;
					}
				}
				if ($nodaycount==false)
					$day++;
			}
			$u++;
		}
	}
    

	//$numyears = abs($numyears);
	
    $timer = substr($roun, strpos($roun,'.')+1,strlen($roun)-strpos($roun,'.')-1);
    $roun_out= $numyears.'/'.$month.'/'.$daynum.' '.$day.'.'. floor(intval(substr($timer,0,2))/100*$timeset['hours']).':'. floor(intval(substr($timer,2,2))/100*$timeset['minutes']).':'. floor(intval(substr($timer,4,2))/100*$timeset['seconds']).'.'.substr($timer,6,strlen($timer)-6);
 
    $roun_obj = array('longcount'=>MayanLongCount($tme),'year'=>abs($numyears),'month'=>$month, 'mname' => $monthnames[$sequence][$month-1],'day'=>$daynum, 'dayname'=>$daynames[$sequence][$daynum-1], 'day'=>$daynum, 'jtl'=>$jtl, 'day_count'=>$day,'hours'=>floor(intval(substr($timer,0,2))/100*$timeset['hours']),'minute'=> floor(intval(substr($timer,2,2))/100*$timeset['minutes']),'seconds'=> floor(intval(substr($timer,4,2))/100*$timeset['seconds']),'microtime'=>substr($timer,6,strlen($timer)-6),'strout'=>$roun_out);

    return $roun_obj;
}

function MayanLongCount($tme){
	
	$config = array('ppo' => array(13,0,0,0,0),
					'epoch' => strtotime('2012-12-21'));

	$diff=(($tme-$config['epoch'])/(60*60*24));
	$ppo = changemaya($config['ppo'],ceil($diff));

	return $ppo[0].'.'.$ppo[1].'.'.$ppo[2].'.'.$ppo[3].'.'.$ppo[4];
}

function changemaya($ppo,$diff){
	if ($diff>0) { $amount=1; } else { $amount=-1; }
	for ($sh=1;$sh<abs($diff);$sh++){
		if ($ppo[4]+$amount>20){
			if ($ppo[3]+$amount>20){
				if ($ppo[2]+$amount>20){
					if ($ppo[1]+$amount>20){
						if ($ppo[0]+$amount>20){
							$ppo[0]=0;
							$ppo[1]=0;
							$ppo[2]=0;
							$ppo[3]=0;
							$ppo[4]=0;
						} else {
							$ppo[1]=0;
							$ppo[0]=$ppo[0]+$amount;
						}		
					} else {
						$ppo[2]=0;
						$ppo[1]=$ppo[1]+$amount;
					}		
				} else {
					$ppo[3]=0;
					$ppo[2]=$ppo[2]+$amount;
				}
			} else {
				$ppo[4]=0;
				$ppo[3]=$ppo[3]+$amount;
			}
		} elseif ($ppo[4]+$amount<0){
			if ($ppo[3]+$amount<0){
				if ($ppo[2]+$amount<0){
					if ($ppo[1]+$amount<0){
						if ($ppo[0]+$amount<0){
							$ppo[0]=20;
							$ppo[1]=0;
							$ppo[2]=0;
							$ppo[3]=0;
							$ppo[4]=0;
						} else {
							$ppo[1]=20;
							$ppo[0]=$ppo[0]+$amount;
						}		
					} else {
						$ppo[2]=20;
						$ppo[1]=$ppo[1]+$amount;
					}		
				} else {
					$ppo[3]=20;
					$ppo[2]=$ppo[2]+$amount;
				}
			} else {
				$ppo[4]=20;
				$ppo[3]=$ppo[3]+$amount;
			}
		} else {
			$ppo[4]=$ppo[4]+$amount;
		}
	}
	return $ppo;
	
}

function jde_date_create($month, $day, $year){

	if ($month ==0) {
		$month = date('m');
	}
	
	if ($day ==0) {
		$day = date('d');
	}
	
	if ($year ==0) {
		$year = date('Y');
	}
	
   /*
   *  NOTE: $month and $day CANNOT have leading zeroes, 
   *        $year must be'YYYY' format
   */
   $jde_year_prefix = substr($year, 0, 1) - 1;
   $jde_year_suffix = substr($year, -2);
   
   //note that valid years for mktime are 1902-2037
   $timestamp = mktime(0,0,0,$month, $day, $year);
   $baseline_timestamp = mktime(0,0,0,1,0,$year);
   
   $day_count = round(($timestamp - $baseline_timestamp)/86400);
   $day_count_padded = str_pad($day_count,3,"0",STR_PAD_LEFT);

   return ($jde_year_prefix . $jde_year_suffix . $day_count_padded);
   
}

if (!function_exists('cal_days_in_month')){
       function cal_days_in_month($a_null, $a_month, $a_year) {
               return date('t', mktime(0, 0, 0, $a_month+1, 0, $a_year));
       }
}

if (!function_exists('cal_to_jd')){
       function cal_to_jd($a_null, $a_month, $a_day, $a_year){

             
			   if ( $a_month <= 2 ){
                     $a_month = $a_month + 12 ;
                     $a_year = $a_year - 1 ;
               }
               $A = intval($a_year/100);
               $B = intval($A/4) ;
               $C = 2-$A+$B ;
               $E = intval(365.25*($a_year+4716)) ;
               $F = intval(30.6001*($a_month+1));
               return intval($C+$a_day+$E+$F-1524) ;
       }
}

if (!function_exists('get_jd_dmy')) {
   function get_jd_dmy($a_jd){
     $W = intval(($a_jd - 1867216.25)/36524.25) ;
     $X = intval($W/4) ;
     $A = $a_jd+1+$W-$X ;
     $B = $A+1524 ;
     $C = intval(($B-122.1)/365.25) ;
     $D = intval(365.25*$C) ;
     $E = intval(($B-$D)/30.6001) ;
     $F = intval(30.6001*$E) ;
     $a_day = $B-$D-$F ;
     if ( $E > 13 ) { 
       $a_month=$E-13 ;
       $a_year = $C-4715 ; 
     } else {
       $a_month=$E-1 ;
       $a_year=$C-4716 ;
     }
     return array($a_month, $a_day, $a_year) ;
   }
}

if (!function_exists('jdmonthname')) {
       function jdmonthname($a_jd,$a_mode){
               $tmp = get_jd_dmy($a_jd) ;
               $a_time = "$tmp[0]/$tmp[1]/$tmp[2]" ;
               switch($a_mode) {
                       case 0:
                               return strftime("%b",strtotime("$a_time")) ;
                       case 1:
                               return strftime("%B",strtotime("$a_time")) ;
               }
       }
}

if (!function_exists('jddayofweek')) {
       function jddayofweek($a_jd,$a_mode){
               $tmp = get_jd_dmy($a_jd) ;
               $a_time = "$tmp[0]/$tmp[1]/$tmp[2]" ;
               switch($a_mode) {
                       case 1:
                               return strftime("%A",strtotime("$a_time")) ;
                       case 2:
                               return strftime("%a",strtotime("$a_time")) ;
                       default:
                               return strftime("%w",strtotime("$a_time")) ;
               }
       }
}
$jd = cal_to_jd(CAL_GREGORIAN,date('m',$tme ),date('d',$tme ),date('y',$tme ));
//$jd =unixtojd(time);
$tmp=get_jd_dmy($jd);
$julian = $tmp[0].'-'.$tmp[1].'-'.$tmp[2] .' ('.jddayofweek($jd,1).'/'.jdmonthname($jd,1).')';
//$french_date = jdtofrench($jd);

 //correct for half-day offset
  $dayfrac = date('G') / 24 - .5;
  if ($dayfrac < 0) $dayfrac += 1;

  //now set the fraction of a day
  $frac = $dayfrac + (date('i') + date('s') / 60) / 60 / 24;

  $julianDate = $jd+$frac; 

	$g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	$j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
	$j_month_name = array("", "Farvardin", "Ordibehesht", "Khordad", "Tir",
						  "Mordad", "Shahrivar", "Mehr", "Aban", "Azar",
						  "Dey", "Bahman", "Esfand");


	function div($a, $b)
	{
	   return (int) ($a / $b);
	} 
	  
	function gregorian_to_jalali($g_y, $g_m, $g_d)
	{
	   global $g_days_in_month;
	   global $j_days_in_month;
	   
	   $gy = $g_y-1600;
	   $gm = $g_m-1;
	   $gd = $g_d-1;
	
	   $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400);
	
	   for ($i=0; $i < $gm; ++$i)
		  $g_day_no += $g_days_in_month[$i];
	   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0)))
		  /* leap and after Feb */
		  ++$g_day_no;
	   $g_day_no += $gd;
	 
	   $j_day_no = $g_day_no-79;
	 
	   $j_np = div($j_day_no, 12053);
	   $j_day_no %= 12053;
	 
	   $jy = 979+33*$j_np+4*div($j_day_no,1461);
	
	   $j_day_no %= 1461;
	 
	   if ($j_day_no >= 366) {
		  $jy += div($j_day_no-1, 365);
		  $j_day_no = ($j_day_no-1)%365;
	   }
	 
	   for ($i = 0; $j_day_no >= $j_days_in_month[$i]; ++$i) {
		  $j_day_no -= $j_days_in_month[$i];
	   }
	   $jm = $i+1;
	   $jd = $j_day_no+1;
	
	
	   return array($jy, $jm, $jd);
	}
	
	function farsinum($str)
	{
	  if (strlen($str) == 1)
		  $str = "0".$str;
	  $out = "";
	  for ($i = 0; $i < strlen($str); ++$i) {
		$c = substr($str, $i, 1); 
		$out .= pack("C*", 0xDB, 0xB0 + $c);
	  }
	  return $out;
	}
	if (!function_exists(date_format)){
		function date_format($datestamp)
		{
		  $tzoffset = 0;
		  list($date,$time) = explode(" ",$datestamp);
		  list($year,$month,$day) = explode("-",$date);
		  list($hour,$minute,$second) = explode(":",$time);
		  $hour = $hour + $tzoffset;
		
		  list($jyear, $jmonth, $jday) = gregorian_to_jalali($year,$month,$day);
		
		  $sDate = ($jyear - 1300)."/".($jmonth)."/".($jday)
				   ." - ".($hour).":".($minute);
			
		  return $sDate;
		}
	}
// Write a little function to return the proper ordinal suffix for a number
function get_ordinal_suffix ($number) {
    $last_2_digits = substr (0, -2, $number);
    if (($number % 10) == 1 && $last_2_digits != 11)
        return 'st';
    if (($number % 10) == 2 && $last_2_digits != 12)
        return 'nd';
    if (($number % 10) == 3 && $last_2_digits != 13)
        return 'rd';
    return 'th'; //default suffix
}


/* the output will be:
    18 Brumaire VIII

*/

function gregorian2FrenchDateArray($m, $d, $y)
{

    $julian_date = gregoriantojd($m, $d, $y);
    $french = jdtofrench($julian_date);
    if($french == "0/0/0")
        return "" ;

    $arD = split("/", $french) ;
    
    // get the month name 
    $monthname = FrenchMonthNames($arD[0]) ;
    
    /* convert the year number to roman digits (as most historians do and documents of the time did */
    $stryear = decrom($arD[2]) ;
    return array($monthname, $arD[1], $stryear ) ;
}

function FrenchMonthNames($mo)
{
    /* The names have been invented by Fabre d'Églantine, a second or rather third rank poet
of primarily pastoral poems, with each name referring to the respective period in the agricultural year; e.g. "Vendémiaire" (approx. September) is derived from "vendange" ("harvest"), "Brumaire" (Ocotober/November) from "brume" ("fog") and so on ...     */
    
    
    $arMo = array("Vendémiaire", 
                      "Brumaire",
                      "Frimaire",
                      "Nivôse", 
                      "Pluviôse",
                      "Ventôse", 
                      "Germinal",
                      "Floréal", 
                      "Prairial",
                      "Messidor", 
                      "Thermidor", 
                      "Fructidor",
                      "Sansculottide") ;

    if($mo < count($arMo)+1) 
        return $arMo[$mo-1] ;
    
}

function decrom($dec){
       $digits=array(
           1 => "I",
           4 => "IV",
           5 => "V",
           9 => "IX",
           10 => "X",
           40 => "XL",
           50 => "L",
           90 => "XC",
           100 => "C",
           400 => "CD",
           500 => "D",
           900 => "CM",
           1000 => "M"
       );
       krsort($digits);
       $retval="";
       foreach($digits as $key => $value){
           while($dec>=$key){
               $dec-=$key;
               $retval.=$value;
           }
       }
       return $retval;
} 


function LatinMonthNames($timeseed)
{
  
   //SEGMENT 1.0
   $arSeg1 = array("Ianuarius", 
                     "Februarius",
                     "Martius",
                     "Aprilis", 
                     "Maius",
                     "Iunius", 
                     "Iulius",
                     "Augustus", 
                     "October",
                     "Messidor", 
                     "November",
                     "December") ;
	//SEGMENT 2.0
   $arSeg2 = array("Ianuariis", 
                     "Februariis",
                     "Martiis",
                     "Aprilibus", 
                     "Maiis",
                     "Iuniis", 
                     "Iuliis",
                     "Augustis", 
                     "Septembribus",
                     "Octobribus", 
                     "Novembribus",
                     "Decembribus") ;

	//SEGMENT 3.0
   $arSeg3 = array("Ianuarias", 
                     "Februarias",
                     "Martias",
                     "Apriles", 
                     "Maias",
                     "Iunias", 
                     "Iulias",
                     "Augustas", 
                     "Septembres",
                     "Octobres", 
                     "Novembres",
                     "Decembres") ;
					 

/*
	   if ((date('L'))==1){ 
	   		return $arSeg3[(date('n')-1];
	   } else {
			if (rand(1,2) == 1) {
				return $arSeg2[(date('n'))-1];
			} else {
				return $arSeg1[(date('n'))-1];
			}
	   }
		*/
   
}

function GetLatinDate($timeseed) {

	return decrom((date('yyyy'))) . ' of year ' . LatinMonthNames($timeseed) . ' in day ' . decrom((date('t')));

}

//$arDateFrench = gregorian2FrenchDateArray(date('d',$tme), date('m',$tme), date('Y',$tme)) ;

$gregorianMonth = date(n,$tme);
$gregorianDay = date(j,$tme);
$gregorianYear = date(Y,$tme);

$arDateFrench = cal_from_jd(gregoriantojd($gregorianMonth,$gregorianDay,$gregorianYear), CAL_FRENCH);


$jdDate = gregoriantojd($gregorianMonth,$gregorianDay,$gregorianYear); 

$hebrewMonthName = jdmonthname($jdDate,4);

$hebrewDate = jdtojewish($jdDate); 

list($hebrewMonth, $hebrewDay, $hebrewYear) = split('/',$hebrewDate); 



?>