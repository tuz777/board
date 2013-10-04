<center>
<h1>Create thread</h1>
<form method="post" action="create.php" align="center">
	<input type="text" size="40" name="title" value="title">
	<br>
	<textarea name="op_post" cols="30" rows="10">Your post</textarea>
	<br>
	<input type="submit" value = "Ready.">
</form>
</center>

<?
	foreach($data as $thr)
	{
		echo '<h1><b>'.$thr->speed." #".$thr->op_post." ".$thr->title." ".$thr->posts_num."</b><a href='res.php?op_post=$thr->op_post'>[Reply]</a></h1>";
		foreach($thr->posts as $pos)
			echo "#".$pos->num." ".date('r', $pos->issue_time)." ".$pos->post."<br>";
		echo "<hr>";
	}