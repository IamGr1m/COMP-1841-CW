<h1 class="label3">Send email to admin</h1>

<div class="postbox2">
    <form action="mail.php" method="post">
        Name:<input type="text" class="postbox4" name="name"></input>
        
        <br/>
        <br/>
        
        Mail:<input type="text" class="postbox4" name="email"></input>
    
        <br/>
        <br/>

        Subject:<input type="text" class="postbox4" name="subject"></input>

        <br/>
        <br/>

        Message:<input type="text" class="postbox4" name="message"></input>

        <div style="display:flex">
            <input type="submit" class="createbutton" style="box-shadow: 0 0 10px rgba(0, 0, 0, 5); margin-left:auto" name="send" value="Create">
        </div>
    </form>
</div>