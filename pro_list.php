<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品トップメニュー</title>
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

$sql='SELECT code,name,price FROM product WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '商品一覧<br /><br />';

print '<form method="post" action="pro_branch.php">';
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<input type="radio" name="procode" value="'.$rec['code']. '">';
	print $rec['name'].'---';
	print $rec['price'].'円';
	print '<br />';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';
print '<br><br><a href = "../../staff_top.php">管理メニューに戻る</a>';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>