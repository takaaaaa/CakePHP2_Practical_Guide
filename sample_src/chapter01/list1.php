<?php
//（1）フォームから入力されたキーワードを取得する
$keyword = '';
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
}

//（2）データベースへ接続する
mysql_connect('localhost','user','password');
mysql_select_db('cakephp_sample');
mysql_query('set names utf8');

//（3）入力されたキーワードをもとにクエリを実行する
$sql = sprintf(
  "SELECT id,name,description FROM friends WHERE name LIKE '%s'",
  mysql_real_escape_string('%'.$keyword.'%')
);
$result = mysql_query($sql);
$data = array();
while ($row = mysql_fetch_assoc($result)) {
  $data[] = $row;
}

//（4）クエリの結果をHTMLページとして表示する
?>
<html>
<head>
<title>テストページ</title>
</head>
<body>
<form action="list1.php" method="POST">
<input name="keyword">
<input type="submit">
</form>
<ul>
<?php
foreach ($data as $friend) {
    echo '<li>';
    echo htmlspecialchars($friend['name'],ENT_QUOTES);
    echo '<br/><i>';    
    echo htmlspecialchars($friend['description'],ENT_QUOTES);
    echo '</i>';
    echo '</li>';
}
?>
</ul>
</body>
</html>
