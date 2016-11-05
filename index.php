<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <title>mapChipArrayGenerator</title>
  <link rel="stylesheet" href="style.css" />
  <meta name="description" content="取り敢えずマップチップの0,1で配列風に出力するやつ" />
  <meta name="keywords" content="" />
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->
</head>

<body>
  <header role="banner">
    <h1>mapChipArrayGenerator</h1>
  </header>
  <nav>
    <!-- メニューなんて必要無い！ -->
  </nav>
  <div role="main">

    <form action="index.php" method="post">

      <p>
        Height：
        <input type="text" name="height" size="4" value="<?php echo isset($_POST['height']) ? $_POST['height'] : 3 ?>" />
        <br> Width :
        <input type="text" name="width" size="4" value="<?php echo isset($_POST['height']) ? $_POST['width'] : 3 ?>" />
      </p>


      <table>
        <tbody>

          <?php

if(!isset($_POST['width'])){
    echo 'まずはサイズを送信送信！<br>';
    goto endForm;
    
}

//table表示
for ($i = -1; $i < $_POST['height'] ; $i++) {
    echo "<tr><td>";
    echo $i == -1 ? "＼" : $i;
    echo "</td>";
    for ($j = 0; $j < $_POST['width'] ; $j++) {
        if ($i == -1){
            echo '<td>' . $j . '</td>';
        }else{
            echo '<td><input type="checkbox" name="' . $i . "," . $j . '" id="' .  $i . "," . $j;
			echo isset($_POST[$i . "," . $j]) ? '" checked' : '"';
			echo '/></td>';
            // echo '<br><label for="' . $i . "," . $j .  '">' . $i . "," . $j . '</label></td>';
        }
    }
    echo "</tr>";
}

echo "        </tbody>
</table>";

endForm:

echo '<p><input type="submit" value="送信"></p>';

//結果表示
echo '<p><div class="source">';
echo "public int[,] hoge  = new int[" . $_POST['height'] . "," .  $_POST['width'] . "] {<br>";
for ($i = 0; $i < $_POST['height'] ; $i++) {
    echo "{";
        for ($j = 0; $j < $_POST['width'] ; $j++) {
            if ($j != $_POST['width'] - 1){
                echo isset($_POST[$i . "," . $j]) ? "1 ," : "0 ,";
            }else{
                echo isset($_POST[$i . "," . $j]) ? "1" : "0";
            }
        }
    echo "}";
	echo $i == $_POST['height'] - 1 ? "" : ",";
	echo "<br>";
}
echo "}</div></p>"

?>

    </form>

  </div>
  <footer role="contentinfo">
  <a class="f" href="https://github.com/Slime-hatena/mapChipArrayGenerator" target="_blank">mapChipArrayGenerator</a> is released under the MIT License by <a class="f" href="https://twitter.com/Slime_hatena" target="_blank">Slime_hatena</a><br>
  </footer>
</body>

</html>