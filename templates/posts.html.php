<h1 class="label3"><b>Welcome,  </b> <?=$_SESSION["user"]?> ! <br/> Post to ask <br/></h1>
<h1 class="label3" name="role" style="color:red; display:flex; margin-left: 90%; " value="<?=$_SESSION['role']?>"><?=$_SESSION['role']?></h1>


<?php foreach($posts as $post): ?> 
    <div class="postbox2">
        <div style="display: flex;" enctype="multipart/form-data">
                <h2><p class="label4" style="margin-left:50px;">
                <?=htmlspecialchars($post['user_name'], ENT_QUOTES, 'UTF-8'); ?></p></h2>

                <div style="margin-left:auto; margin-top:10px;">
                <?php if ($_SESSION['user_id'] == $post['post_user_id'] || $_SESSION['role'] == 'admin'): ?>
                    <div style="display: flex;">
                        <form action="deletepost.php" method="post">
                            <input type="hidden" name="post_id" value="<?=$post['post_id']?>">
                                <button class="postbox2" style="margin-left:auto; border-radius: 15px;" value="Delete">Delete</button>
                        </form> 
                    </div>
                    <br/>
                    <a class="postbox2" style="margin-left:auto; border-radius: 15px;" href="editpost.php?post_id=<?=$post['post_id']?>">Edit Post</a>
                <?php endif; ?>
                </div>
        </div>
        <div>
            <h5 style="margin-bottom:10px;">Module: <?=htmlspecialchars($post['module_name'], ENT_QUOTES, 'UTF-8')?></h5>
        </div>
            <div style="display: flex; margin-left:50px;">

                <p href="post.php?post_id=<?=htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8')?>">
                <h1><b><?=htmlspecialchars($post['post_title'], ENT_QUOTES, 'UTF-8')?></b></h1>
                </p>

                <h5 style="margin-left:auto"><?=htmlspecialchars($post['post_creation_date'], ENT_QUOTES, 'UTF-8'); ?></h5>
            </div>
            <br/>
            <br/>
            <div class="postbox3">
            <h4><?=htmlspecialchars($post['post_content'], ENT_QUOTES, 'UTF-8'); ?></h4> <br/>
            <?php if ($post['post_image'] != null): ?>
                <img src="uploads/<?=$post['post_image']?>" style="max-width:100%; height:auto;">
            <?php endif; ?>
        </div>
        <br/>
        <br/>
        
        <div class="postbox5">  
        <form action="" method="post">
            <input type="hidden" name="answer_post_id" value="<?=$post['post_id'];?>">
                <strong style="display: flex; margin-top:auto;">Comment: </strong>
                <textarea rows="1" cols="80" name="answer_content" style="border-radius: 15px;" placeholder="Comment something!!!"></textarea>
                <input type="submit" class="createbutton" style="box-shadow: 0 0 10px rgba(0, 0, 0, 5); margin-left:auto" name="answer_submit" value="Enter">
        </form>
        </div>
        
        <br/>
        <?php foreach($answers as $answer):?>
        <?php if ($answer['answer_post_id'] == $post['post_id']): ?>
            <div class="postbox5">
                <div class="hstack">
                
                    <div class="col-3">
                    <form action="deleteanswer.php" method="post" style="display:flex">
                        <strong><?=htmlspecialchars($answer['user_name'], ENT_QUOTES, 'UTF-8');?></strong>|
                        <?=htmlspecialchars($answer['answer_content'], ENT_QUOTES, 'UTF-8');?>
                        <input type="hidden" name="answer_id" value="<?=$answer['answer_id']?>">
                        <?php if ($_SESSION['user_id'] == $answer['answer_user_id'] || $_SESSION['role'] == 'admin'): ?>
                            <button class="createbutton" style="margin-left:auto; border-radius: 15px;" value="Delete">Delete answer</button>
                        <?php endif; ?>
                    </form>
                    </div>
                    <div class="vr"></div>
                </div>
            </div>
                <?php endif; ?>
            <?php endforeach;?>
    </div>
    <br/>
<?php endforeach;?>