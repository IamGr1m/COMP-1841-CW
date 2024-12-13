<div class="postbox2">
    <br/>   
    <br/>
    <?php foreach($users as $user): ?> 
        <div class="postbox5">
        <div style="display: flex;" enctype="multipart/form-data">
                <h2><p class="label4" style="margin-left:50px;">
                <?=htmlspecialchars($user['user_name'], ENT_QUOTES, 'UTF-8'); ?></p></h2>
                <?=htmlspecialchars($user['Email'], ENT_QUOTES, 'UTF-8'); ?>
                <?=htmlspecialchars($user['creation_date'], ENT_QUOTES, 'UTF-8'); ?>
                <div style="margin-left:auto; margin-top:10px;">
                    <div style="display: flex;">
                        <form action="deleteuser.php" method="post">
                            <input type="hidden" name="user_id" value="<?=$user['user_id']?>">
                            <button class="postbox2" style="margin-left:auto; border-radius: 15px;" value="Delete">Delete</button>
                        </form> 
                    </div>
                    <br/>
                </div>
        </div>
        </div>
        <br/>
    <?php endforeach; ?>
</div>