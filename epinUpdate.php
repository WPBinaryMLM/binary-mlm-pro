<?php
require_once('../../../wp-config.php');
global $wpdb;
$table_prefix = mlm_core_get_table_prefix();

extract($_REQUEST);
$user_key=getuserkeybyid($user_id);
if(!empty($epin))
{
    $sql = "update {$table_prefix}mlm_epins set user_key='{$user_key}', date_used=now(), status=1 where epin_no ='{$epin}' ";
    $epinUpdate=$wpdb->query($sql);
    $userUpdate=mlmUserUpdateePin($user_id,$epin);
    
	
	
	if($epinUpdate && $userUpdate)
    {
        _e("<span class='error' style='color:green'>ePin Update.</span>");
    }
    else
    {
        _e("<span class='error' style='color:red'>ePin Not update.</span>");
    }
}



?>