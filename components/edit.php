<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d59719dc94.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php 
        include_once("../back-end/conn.php");
        $postid = $_GET['id'];
        $update = new db_con;

        $result = $update->fecthid($postid);

        if(isset($_POST['post-update'])) {
            $text = $_POST['post-text'];
            $date = date("Y-m-d");
            $time = date("H:i:s");
            $address = getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR');
    
            $updateresult = $update->update($text, $date, $time, $address, $postid);
    
            if ($updateresult) {
                echo "<script>window.location.href='../';</script>";
            }
        }
    ?>

    <div id="post-box" class="flex justify-center">
        <div class="fixed top-0 w-full h-full backdrop-blur-lg z-3"></div>
        <form action="" method="POST" class="fixed top-[25%] w-auto h-auto bg-[#F4F4F4] drop-shadow-xl rounded-xl flex lg:w-[700px] lg:h-[350px]">
            <button href="./" id='close-postBox' type="button" class="fixed right-2 top-2 w-[30px] h-[30px] bg-red-400 rounded-full"><i class="fa-solid fa-x"></i></button>
            <?php foreach($result as $result ) : ?>
            <textarea id="post-text" name="post-text" type="text" class="w-full m-12"><?php echo($result['text'])?></textarea>
            <?php endforeach; ?>
            <button type="submit" name="post-update" class="fixed right-12 w-[70px] h-[30px] bg-green-400 rounded-xl lg:right-2 lg:bottom-2">
                <p class="text-lg font-bold">Post</p>
            </button>
        </form>
    </div>
</body>