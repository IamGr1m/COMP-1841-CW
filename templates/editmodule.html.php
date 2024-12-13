<div class="postbox2">
    <form action="" method="post">
        <input type="hidden" name="module_id" value="<?=$module['module_id'];?>">
        <h2><label for ='post_title'>Edit this module here:</label><br/></h2>
        <br/>
        <textarea class="postbox4" name="module_name">
        <?=$module['module_name']?>
        </textarea>
        <br/>
        <input style="display:flex; margin-left:auto; border-radius:15px" type="submit" name="submit" value="Save">
    </form> 
</div>