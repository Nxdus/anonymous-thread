<?php 

    include_once("../back-end/conn.php");
    
    if (isset($_GET['del'])) {
        $postid = $_GET['del'];
        $delete = new db_con;

        $result = $delete->delete($postid);

        if ($result) {
            echo '<script>window.location.href = "../"</script>';
        }
    }
?>