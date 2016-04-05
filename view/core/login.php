<?php
setcookie("array_save", "1", time());

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Search web</title>
</head>
<body>
<!--<form name="login" method="POST" action="../action/action_login.php">-->


<form name="login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Title : <br/>
    <input type="text" name="value_title"/>
    Content:<br/>
    <textarea name="value_content"></textarea>
    <br/>
    <?php

    class News
    {
        public $title = "";
        public $content = "";
    }

    $array_news = array();

    if (isset($_POST['value_title']) && isset($_POST['value_content'])) {
        $e = new News();
        $e->title = $_POST['value_title'];
        $e->content = $_POST['value_content'];
        array_push($array_news, $e);
//    $array_news[] = $e;
    }

    if (isset($_POST['value_temp'])) {
        $array = json_decode($_POST['value_temp']);
        $max = count($array);
        for ($i = 0; $i < $max; $i++) {
            array_push($array_news, $array[$i]);
        }

    }

    echo "<input type='hidden' name= 'value_temp' value='" . json_encode($array_news) . "'/>";

    $max = count($array_news);
    for ($i = 0; $i < $max; $i++) {
       $value = $array_news[$i];
        echo "<a   href='detail.php?title='". $value->title.">".$value->title."</a> <br/>";
        echo '<label>'.$value->content.'<label/> <br/>';
//        array_push($array_news, $array[$i]);
    }

    ?>

    <input type="submit" name="submit_name" value="Nhap gia tri"/>
</form>
<?php


if (isset($_COOKIE['array_save'])) {
    $_COOKIE['array_save'] = json_encode($array_news, true);
    echo $_COOKIE["array_save"];
//    array_push($array_news, $_COOKIE[$array_save]);
} else {
    echo "Cookie  isn't set " . " <br>";
}

?>


</body>
</html>
