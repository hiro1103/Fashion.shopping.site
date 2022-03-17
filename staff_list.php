<?php 
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login'])==false) {
    print 'ログインされていません';
    print '<br>';
    print '<a href = "../staff_login.php">ログイン画面へ</a>';
    exit();
} else {
    print $_SESSION['staff_name'];
    print 'さんログイン中<br>';
    print '<br>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>スタッフ一覧画面</title>
</head>
<body>

<?php

try
{

$dsn='mysql:host=157.112.147.201;dbname=hiro1103_server;charset=utf8';
$user='hiro1103_server';
$password='hiro1103';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sql='SELECT code,name FROM customer WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print 'スタッフ一覧<br/><br/>';

print '<form method="post" action="staff_branch.php">';
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
	print $rec['name'];
	print '<br />';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '<br><br><a href = "../staff_top.php">管理メニューに戻る</a>';
print '</form>';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>