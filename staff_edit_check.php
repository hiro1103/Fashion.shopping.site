<?php 
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login'])==false) {
    print 'ログインされていません';
    print '<br>';
    print '<a href = "../staff_login.html">ログイン画面へ</a>';
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
<title>スタッフ修正一覧画面</title>
</head>
<body>
<?php

// データを取得
$stacc_code=$_POST['code'];
$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass2=$_POST['pass2'];

// セキュリティチェック
$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
$staff_pass2=htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');
$stacc_code=htmlspecialchars($stacc_code,ENT_QUOTES,'UTF-8');

// スタッフ名が入力されているか確認
if ($staff_name=='') {
    print 'スタッフ名が入力されていません。';
    print '<br/>';
} else {
    print 'スタッフ名：';
    print $staff_name;
}

// パスワードが入力されているか確認
if($staff_pass=='') {
    print 'パスワードが入力されていません。';
    print '<br/>';
}

// 入力に間違いがあったら、戻るボタンを表示
if ($staff_name==''||$staff_pass==''||$staff_pass!=$staff_pass2) {
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
} else {
    $staff_pass=md5($staff_pass);
    print '<form method="post" action="staff_edit_done.php">';
    print '<input type="hidden" name="code" value="'.$stacc_code.'">';
    print '<input type="hidden" name="name" value="'.$staff_name.'">';
    print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="ＯＫ">';
    print '</form>';
    
}

?>
</body>