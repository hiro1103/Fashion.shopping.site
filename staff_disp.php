<?php 
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login'])==false) {
    print 'ログインされていません';
    print '<br>';
    print '<a href = "../staff_login/staff_login.html">ログイン画面へ</a>';
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
<title>スタッフ参照画面</title>
</head>
<body>

<?php

try
{

$staff_code=$_GET['staffcode'];

$dsn='mysql:host=157.112.147.201;dbname=hiro1103_server;charset=utf8';
$user='hiro1103_server';
$password='hiro1103';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name FROM customer WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$staff_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name'];

$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

スタッフ参照<br />
<br />
スタッフコード<br />
<?php print $staff_code; ?>
<br />
スタッフ名<br>
<?php print $staff_name;?>
<br>
<input type="button" onclick="history.back()" value="戻る">

</body>
</html>