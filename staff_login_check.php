<?php
try {
    // ログインID
    $staff_code = $_POST['code'];
    
    // パスワード
    $staff_pass = $_POST['pass'];
	$staff_pass = md5($staff_pass);
    $staff_code = htmlspecialchars($staff_code, ENT_QUOTES, 'utf-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'utf-8');

    // DB接続

    $pdo = new PDO('mysql:host=157.112.147.201;dbname=hiro1103_server;charset=utf8', 'hiro1103_server', 'hiro1103');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // トランザクション開始
    $pdo->beginTransaction();

    $sql = 'SELECT name,password FROM customer WHERE name=? AND password = ?';
    $stmt = $pdo->prepare($sql);
    $data[] = $staff_code;
    $data[] = $staff_pass;
    $stmt->execute($data);

    $pdo = null;
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec === false) {
        print 'ユーザーIDかパスワードが間違っています。';
        print '<br>';
        print '<a href = "staff_login.php">戻る</a>';
    } else {
		// 暗号化
	  //  $staff_pass = md5($staff_pass);

        // セションスタート
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['staff_code'] = $staff_code;
        $_SESSION['staff_name'] = $rec['name'];
        header('Location: staff_top.php');
        exit();
    }
} catch (Exception $e) {

    print 'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
}
?>
