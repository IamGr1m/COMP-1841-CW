<div class="postbox2">
    <form action="" method="post">
        <input type="hidden" name="post_id" value="<?=$post['post_id'];?>">
        <h2><label for ='post_title'>Edit ur post title here:</label><br/></h2>
        <br/>
        <textarea class="postbox4" name="post_title" rows="3" cols="40">
        <?=$post['post_title']?>
        </textarea>
        <br/>
        <br/>
        <h2><label for ='post_content'>Edit ur post content here:</label></h2>
        <br/>
        <br/>
        <textarea class="postbox4" name="post_content" rows="3" cols="40">
        <?=$post['post_content']?>
        </textarea>
        <br/>
        <input style="display:flex; margin-left:auto; border-radius:15px" type="submit" name="submit" value="Save">
    </form> 
</div>