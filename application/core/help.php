<?
class Thread{
	public $speed, $op_post, $title, $posts_num, $issue_time;
	public $posts = array();
};

class Post{
	public $num, $issue_time, $post, $thread;
};