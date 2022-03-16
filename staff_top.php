<?php 
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login'])==false) {
    print 'ログインされていません';
    print '<br>';
    print '<a href = "staff_login.php">ログイン画面へ</a>';
    exit();
} else {
    print $_SESSION['staff_name'];
    print 'さんログイン中<br>';
    print '<br>';
}
?>
<body>
メインメニュー一覧画面<br><br>
<a href="../staff/staff_list.php">ショップ管理</a><br>
<a href="../shop/shop_list.php">商品管理</a><br>
<a href="../WCBCafe/index.html">カフェホームページ</a><br>
<a href="staff_logout.php">ログアウト</a><br>
</body>
