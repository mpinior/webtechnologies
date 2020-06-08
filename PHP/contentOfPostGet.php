<?php
include 'menu.php';
header('Content-type: text/plain');
if ( !empty($_POST) ) {
    print_r($_POST);
} else {
    echo "Empty POST";
}
if (!empty($_GET) ) {
    print_r($_GET);
} else {
    echo "Empty GET\n";
}
if (!empty($_FILES) ) {
    print_r($_FILES);
} else {
    echo "Empty FILES\n";
}
?>
