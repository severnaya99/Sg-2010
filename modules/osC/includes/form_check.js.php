<?php
 if (ACCOUNT_GENDER == 'true')  {
   $xoopsTpl->assign("fc_gender",1);
 }
 if (ACCOUNT_DOB == 'true') {
    $xoopsTpl->assign("fc_dob",1);
 }
 if (ACCOUNT_STATE == 'true') {
 $xoopsTpl->assign("fc_state",1);
 }
?>