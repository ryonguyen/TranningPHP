<?php
setcookie("array_save", "1", time());

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Search web</title>
</head>
<body>
<!--<form name="login" method="POST" action="../action/action_login.php">-->


<form name="login" method="POST">
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
        echo "<a   href='detail.php?title=" . $value->title . "&content=".$value->content."'>" . $value->title . "</a> <br/> <label> " . $value->content . "<label/> <br/>";
    }

    ?>

    <input type="submit" name="submit_name" value="Nhap gia tri"/>
    <br/>
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
