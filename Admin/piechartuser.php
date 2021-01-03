<?php 

	require 'include/dataclass.php';
	$dc = new Dataclass();
	$nou = $dc->getTable("(SELECT COUNT(qid) as nou from question) UNION ALL (SELECT COUNT(id) as nou from user where type = 1) UNION ALL (SELECT COUNT(id) as nou from user where type = 0) UNION ALL (SELECT COUNT(cid) as nou from course)");
	$data = array();

	while ($rw = mysqli_fetch_assoc($nou)) {
	    $data[] = $rw['nou'];
	}
	print json_encode($data);
 ?>