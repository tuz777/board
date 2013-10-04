<?	$thr = $data;
?>

<center>
<h1>Post</h1>
<form method="post" action="post.php">
	<textarea name="post" cols="30" rows="10">Your post</textarea>
<?	echo "<input type='hidden' name='thread' value=$thr->op_post>";
?>
	<br>
	<input type="submit" value = "Ready.">
</form>
</center>

<?
	echo "<center><h1><b>".$thr->speed." ".$thr->op_post." ".$thr->title." ".$thr->posts_num."</b></h1><br>";
	echo "<h3>OP_POST: #".$thr->posts[0]->num." <i>".date('r', $thr->posts[0]->issue_time)."</i> ".$thr->posts[0]->post."</h3></center><br>";
	foreach($thr->posts as $i => $post)
	{
		if($i != 0)
			echo "<b>#".$post->num." <i>".date('r', $post->issue_time)."</i></b> ".$post->post."</h3><br>";
	}