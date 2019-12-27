<?php
    $path =  "/Mission2.0/print/upload/".$_GET['UserId']."/".$_GET['fileName'];
    // $path = iconv("gb2312","UTF-8",$path);
    echo "<script>window.location.href='$path'</script>";
?>
