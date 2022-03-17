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
<body>
<?php
// db接続
function connect():PDO{
    $pdo = new PDO('mysql:host=157.112.147.201;dbname=hiro1103_server;charset=utf8', 'hiro1103_server', 'hiro1103');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    return $pdo;
}

try {
    $staff_name =$_POST['name'];
    $staff_pass =$_POST['pass'];
    $staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'utf-8');
    $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'utf-8');
    
    $pdo = connect();
    $pdo->beginTransaction();
    $sql = 'INSERT INTO customer(name,password) VALUES(?,?)';
    $stmt = $pdo->prepare($sql);
    $data[] = $staff_name;
    $data[] =$staff_pass;
    $stmt->execute($data);
    $pdo->commit();
    $pdo = null;
    print $staff_name;
    print 'さんを追加しました。';
} catch (Exception $e) {
    print '障害が発生しました。';
    rollback();
    exit();
    return;
}
?>
<a href = "staff_list.php">戻る</a>
</body>
