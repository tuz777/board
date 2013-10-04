<?php

class Model_Index extends Model
{
	
	function get_data()
	{	
		$ret = array();
		$db = new PDO('mysql:host=localhost;dbname=test', 'root');
		$qt = $db->query("SELECT * FROM threads ORDER BY speed DESC");
		$rest = $qt->fetchAll();
		foreach($rest as $t)
		{
			$thr = new Thread(); 
			$thr->speed = $t[0];
			$thr->op_post = $t[1];
			$thr->title = $t[2];
			$thr->posts_num = $t[3];
			$qp = $db->query("SELECT * FROM posts WHERE thread = $thr->op_post");
			$resp = $qp->fetchAll();
			foreach($resp as $p)
			{
				$pos = new Post();
				$pos->num = $p[0];
				$pos->issue_time = $p[1];
				$pos->post = $p[2];
				$pos->thread = $p[3];
				array_push($thr->posts, $pos);
			}
			array_push($ret, $thr);
		}
		return $ret;
	}

}
