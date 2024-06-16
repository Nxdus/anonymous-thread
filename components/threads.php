<?php
    $conn = mysqli_connect("localhost", "root", "", "anonymousthread");
    $result = mysqli_query($conn, "SELECT * FROM posts");
?>

<script type="text/javascript">
            function update(){
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function(){
                    document.getElementById("Chat").innerHTML = this.responseText;
                }

                xhttp.open("GET", "./components/threads.php", true);
                xhttp.send();
            }

            setInterval(update, 5000);
</script>

<div onload="update();" id="Chat" class=" flex flex-col-reverse items-center justify-center">
    <?php foreach($result as $result ) : ?>
        <div class="chat-box m-7 w-[600px] h-[150px] bg-[#F4F4F4] rounded-xl drop-shadow-xl flex justify-center items-center flex-col text-center">
                <p class="text my-6 mx-8">
                    <?php echo $result['text'];?>
                </p>
                <p class="date mb-3"><?php echo $result['date'];?> <?php echo $result['time']?></p>

                <?php 
                    $address = getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR');

                    if ($address == $result['address']) { ?>           
                        <div class="div">
                            <a href="./components/edit.php?id= <?php echo $result['id']?>" class="bg-green-400">EDIT</a>
                            <a href="./components/delete.php?del= <?php echo $result['id']?>" class="bg-red-400">DELETE</a>
                        </div>
                    <?php } 
                ?>
        </div>
    <?php endforeach; ?>
</div>