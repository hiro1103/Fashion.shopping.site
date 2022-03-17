
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>スタッフ登録画面</title>
</head>
<body>
<?php

// データを取得

$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass=md5($staff_pass);

// セキュリティチェック
$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');



// スタッフ名が入力されているか確認
if ($staff_name=='') {
    print '氏名が入力されていません。';
    print '<br/>';
} else {
    print '氏名：';
    print $staff_name;
}

// パスワードが入力されているか確認
if($staff_pass=='') {
    print 'パスワードが入力されていません。';
    print '<br/>';
}

// 入力に間違いがあったら、戻るボタンを表示
if ($staff_name==''||$staff_pass=='') {
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
} else {
    print '<form method="post" action="staff_sinnki.php">';
    print '<input type="hidden" name="name" value="'.$staff_name.'">';
    print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="ＯＫ">';
    print '</form>';
    
}

?>
</body>