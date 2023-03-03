<?php 

include "../common/param.php";

include "../common/func.php";

include "../common/chk_login.php";

$sql = "UPDATE ms_prods SET mainid = '1' WHERE secid = '17' AND '18' ";

$res = qry_run($sql);
 return $res;
?>