
<div class="postbox2">
    <a class="createbutton" style="display:fixed; margin-left:auto; border-radius: 15px;" href="addmodule.php"><strong>Add module</strong></a>
    <br/>   
    <br/>
    <?php foreach($modules as $module): ?> 
        <div class="postbox5">
        <div style="display: flex;" enctype="multipart/form-data">
                <h2><p class="label4" style="margin-left:50px;">
                <?=htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8'); ?></p></h2>

                <div style="margin-left:auto; margin-top:10px;">
                    <div style="display: flex;">
                        <form action="deletemodule.php" method="post">
                            <input type="hidden" name="module_id" value="<?=$module['module_id']?>">
                            <button class="postbox2" style="margin-left:auto; border-radius: 15px;" value="Delete">Delete</button>
                        </form> 
                    </div>
                    <br/>
                    <a class="postbox2" style="margin-left:auto; border-radius: 15px;" href="editmodule.php?module_id=<?=$module['module_id']?>">Edit Module</a>
                </div>
        </div>
        </div>
        <br/>
    <?php endforeach; ?>
</div>