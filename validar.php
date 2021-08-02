<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtCorreo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : '';
$txtPws = isset($_POST['txtPws']) ? $_POST['txtPws'] : '';

if (isset($txtCorreo) && !empty($txtCorreo) &&
    isset($txtPws) && !empty($txtPws)
    ) {
    echo $txtCorreo .'<br>';
    echo $txtPws .'<br>';
}else{
    echo '
    <script>
        window.location = "login.html"
    </script>
    ';
    // echo '
    // <meta http-equiv="REFRESH" content="0; url=login.html">
    // ';
}

?>