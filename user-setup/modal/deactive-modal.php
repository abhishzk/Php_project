<?php
$uid = $_REQUEST['uid'];
?>
<div class="modal-dialog">
  <div class="modal-content" style="border-radius: 0px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Authentication</h4>
    </div>
    <form id="user_delete" name="user_delete" method="POST" action="code/delete.php">
      <div class="modal-body">
        <center>
          <h3><strong>Are you sure?</strong></h3>
          <input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>">
          <div id="success_msg">

          </div>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button type="submit" class="btn btn-danger" name="delete" id="delete">Confirm</button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
$(function() {
  $('#delete').click(function(event) {
     var uid = $("#uid").val();

     event.preventDefault();
     var z = "0";
     $.ajax({
     type: 'POST',
     url: 'code/delete.php',
     data: ({ uid: uid, z: z }),
     success: function(response) {
     if(response = "1")
     {
       $("#success_msg").html("<p>Account Deactivated.</p>").fadeIn("fast");
       setTimeout(function(){
         window.location.href='update-delete.php';
       }, 1000);
     }
     else
     {
       $("#delete").html("Confirm").fadeIn("fast"); /* For load Remove confirm button */
       $("#success_msg").html("<p>Undefine Error.</p>").fadeIn("fast"); /* For Success Msg */
     }
     }
    });
   });
 });
</script>
