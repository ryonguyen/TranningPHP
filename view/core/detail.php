<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Search web</title>
</head>
<body>
<p style='color:red;'>Title : </p>
<label><?php echo $_GET['title']; ?></label>
<p style='color:red;'>Content: </p>
<label><?php echo $_GET['content']; ?></label>
<br/>
</form>
<?php


if (isset($_COOKIE['array_save'])) {
    echo $_COOKIE["array_save"];
} else {
    echo "Cookie  isn't set " . " <br>";
}

?>


</body>
</html>
