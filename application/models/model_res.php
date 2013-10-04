<?php

class Model_Res extends Model
{
	function get_data($op_post)
	{	
		$db = new PDO('mysql:host=localhost;dbname=test', 'root');
		$q = $db->query("SELECT * FROM posts WHERE thread=$op_post");
		$res = $q->fetchAll();
		$thr = new Thread(); 
		foreach($res as $t)
		{
			$pos = new Post();
			$pos->num = $t[0];
			$pos->issue_time = $t[1];
			$pos->post = $t[2];
			$pos->thread = $t[3];
			array_push($thr->posts, $pos);
		}
		$q = $db->query("SELECT * FROM threads WHERE op_post=$op_post");
		$res = $q->fetch();
		$thr->speed = $res[0];
		$thr->op_post = $res[1];
		$thr->title = $res[2];
		$thr->posts_num = $res[3];
		return $thr;
	}
};
