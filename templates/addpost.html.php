<h1 class="label3">Create post</h1>

<div class="postbox2">
    <form action="" method="post" enctype="multipart/form-data">
        <h3><label for='post_title'>Title:</label> </h3>
        <br/>
        <textarea class="postbox4" name="post_title" rows="2" cols="40"></textarea>
        <br/>
        <br/>
        <h3><label for='module'>Module:</label> </h3>
        <select name="post_module_id" class="postbox4" Style="max-width:200px">     
        <option value="">Choose a module</option>
        <?php foreach ($modules as $module):?>
            <option value="<?=htmlspecialchars($module['module_id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['module_name'], ENT_QUOTES,'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br/>
        <br/>
        <h3><label for='post_content'>What are you thinking?:</label> </h3>
        <br/>
        <textarea class="postbox3" name="post_content" rows="10" cols="40"></textarea>
        <br/>
        <br/>
        <div style="display:flex">
            <input type="file" name="fileToUpload">
            <input type="submit" class="createbutton" style="box-shadow: 0 0 10px rgba(0, 0, 0, 5); margin-left:auto" name="submit" value="Create">
        </div>
    </form>
</div>