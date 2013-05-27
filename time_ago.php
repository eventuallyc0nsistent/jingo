<?php 

/*
-------------------
results for query 2 
-------------------
$notetext = $row2['notetext'];
$hyperlink = $row2['hyperlink'];
$note_time = $row2['Utime'];
$likes = $row2['Nlike'];

*/

/*-- 
function : time_ago 
source : http://css-tricks.com/snippets/php/time-ago-function/
returns : time in 'x'ago format
--*/
function time_ago($tm,$rcs = 0) {
   $cur_tm = time(); $dif = $cur_tm-$tm;
   $pds = array('second','minute','hour','day','week','month','year','decade');
   $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
   for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

   $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
   if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
   return $x;
} 

?>