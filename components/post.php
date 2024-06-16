<?php
    include_once("./back-end/conn.php");
    $insert = new db_con;
   
    if(isset($_POST['post-submit'])) {
        $text = $_POST['post-text'];
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $address = getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR');

        $result = $insert->insert($text, $date, $time, $address);

        if ($result) {
            echo "<script>window.location.href='./';</script>";
        } else {
            echo "<script>window.location.href='./';</script>";
        }
    }
?>
<div id="post-box" class="flex justify-center hidden">
    <div class="fixed top-0 w-full h-full backdrop-blur-lg z-3"></div>
    <form action="" method="POST" class="fixed top-[25%] w-auto h-auto bg-[#F4F4F4] drop-shadow-xl rounded-xl flex lg:w-[700px] lg:h-[350px]">
        <button id='close-postBox' type="button" class="fixed right-2 top-2 w-[30px] h-[30px] bg-red-400 rounded-full"><i class="fa-solid fa-x"></i></button>
        <textarea id="post-text" name="post-text" type="text" class="w-full m-12" ></textarea>
        <button type="submit" name="post-submit" class="fixed right-12 w-[70px] h-[30px] bg-green-400 rounded-xl lg:right-2 lg:bottom-2">
            <p class="text-lg font-bold">Post</p>
        </button>
    </form>
</div>

<div class="fixed bottom-5 right-3 z-0">
    <button id="postButton" class="flex justify-center items-center w-[50px] h-[50px] mr-5 rounded-full bg-orange-400 drop-shadow-xl">
        <i class="fa-solid fa-plus text-white text-4xl"></i>
    </button>
</div>

<script>
    let postBox = document.getElementById('post-box');
    document.getElementById('postButton').addEventListener('click', function(){
        postBox.classList.toggle('hidden');
    })
    document.getElementById('close-postBox').addEventListener('click', function(){
        postBox.classList.toggle('hidden');
    })

</script>
