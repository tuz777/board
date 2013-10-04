<?
class Model_Create{
	function post_data($data)
	{
		$db = new PDO('mysql:host=localhost;dbname=test', 'root');
		$num = $db->query("SELECT SUM(posts_num) FROM threads");
		$num = $num->fetch();
		$num = $num[0];
		if($num == null)
			$num = 1;
		$sp = 1000+$num;
		$db->exec("INSERT INTO threads VALUES($sp, $num, '$data[0]', 1, ".time().")");
		$db->exec("INSERT INTO posts VALUES($num, ".time().", '$data[1]', $num)");
	}
};