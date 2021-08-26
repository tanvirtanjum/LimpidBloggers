<div style="width: calc(100%)">
    <div style="width: calc(80%);float:left;">
        <input type="text" class="inputText1" name="commentTB" id="commentTB" placeholder="Write Comment Here...">
    </div>
    <div style="width: calc(20%);float:right;" align="center">
        <button name="commentBTN" id="commentBTN" class="btnLogin" onclick="return validateComment();">Comment</button>
    </div>
    <center>
        <span class="error"><?php echo $msg; ?></span>
    </center>
</div>