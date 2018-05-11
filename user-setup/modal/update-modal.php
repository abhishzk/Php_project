<?php
include '../../config.php';

                    $uid = $_REQUEST['uid'];

                      $get_user = mysqli_query($conn,"SELECT * FROM user_dtls where user_id='$uid'");
                      while($row_user = mysqli_fetch_array($get_user))
                      {
                        $user_get_sl=$row_user['sl'];
                        $user_get_id=$row_user['user_id'];
                        $user_get_nm=$row_user['user_nm'];
                        $user_get_type=$row_user['user_type'];
                        $user_get_add=$row_user['user_add'];
                        $user_get_ph=$row_user['user_ph'];
                        $user_get_email=$row_user['user_email'];
                        $user_get_stat=$row_user['stat'];
                      }
?>
<div class="modal-dialog">
  <div class="modal-content" style="border-radius: 0px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Update Details</h4>
    </div>
    <br>
                <form id="modalform" action="" class="form-horizontal calender" name="modalform" enctype="multipart/form-data" method="post" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">User ID</label>
                        <div class="col-sm-5">
                            <input type="text" value = "<?php echo $uid; ?>" class="form-control" id="user_id" name="user_id" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" value = "<?php echo $user_get_nm; ?>" class="form-control" id="user_nm" name="user_nm">                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <textarea id="user_add" name="user_add" class="form-control"><?php echo $user_get_add; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" value = "<?php echo $user_get_ph; ?>" class="form-control" id="user_ph" name="user_ph" onkeypress='return event.charCode >= 48 && event.charCode <= 57; validate(event)' maxlength="10" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">E-mail <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="email" value = "<?php echo $user_get_email; ?>" class="form-control" id="user_email" name="user_email">
                        </div>
                    </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="confirm" id="confirm">Confirm</button>
                    </div>

                    <input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>">

                  </form>
  </div>
</div>


<div class="modal" id="myModal2" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="btnclose2" aria-hidden="true" onclick="btnClose();">X</button>
          <h4 class="modal-title"></h4>
        </div><div class="container"></div>
        <div class="modal-body" id="modal-body2" align="center">
          Content for the dialog / modal goes here.
        </div>
        <div class="modal-footer">
          <a href="javascript:void(0);" class="btn btn-default" id="btnclose" onclick="btnClose();">Close</a>
        </div>
      </div>
    </div>
</div>

<!-- css for second modal -->

<style type="text/css" media="screen">
    .modal:nth-of-type(even) {
    z-index: 1042 !important;
}
.modal-backdrop.in:nth-of-type(even) {
    z-index: 1041 !important;
}
    
</style>



<script type="text/javascript">
 $(document).ready(function(){

    $("#modal-body2").css({"font-size": "15px"});

    function btnClose()
    {
        $('#btnclose').click(function(event) {
            $('#myModal2').hide();
        });
        $('#btnclose2').click(function(event) {
            $('#myModal2').hide();
        });
    }
            

  $('#confirm').click(function(event) {

    var mobfilter = /^\d{10}$/;

    var emailfilter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    event.preventDefault();

    var user_id = $("#uid").val();
    var user_nm = $("#user_nm").val();
    var user_add = $("#user_add").val();
    var user_ph = $("#user_ph").val();
    var user_email = $("#user_email").val();

    if (user_nm=='') 
    {
                $('#myModal2').show();
                $('#modal-body2').html("Please Enter Full Name");
                btnClose();
    }
    else if (user_add=='') 
    {
                $('#myModal2').show();
                $('#modal-body2').html("Please Enter Address");
                btnClose();
    }
    else if (user_ph=='') 
    {
                $('#myModal2').show();
                $('#modal-body2').html("Please Enter Phone Number");
                btnClose();
    }
    else if (!mobfilter.test(user_ph))
    {
                $('#myModal2').show();
                $('#modal-body2').html("Invalid Phone Number");
                btnClose();
    }
    else if (user_email=='') 
    {
                $('#myModal2').show();
                $('#modal-body2').html("Please Enter Email ID");
                btnClose();
    }
    else if (!emailfilter.test(user_email))
    {
                $('#myModal2').show();
                $('#modal-body2').html("Invalid Email ID");
                btnClose();
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: 'code/update.php',
            data: ({ user_id: user_id, user_nm: user_nm, user_add: user_add, user_email: user_email, user_ph: user_ph }),
            success: function(response_update) {

            if(response_update == 1)
            {
                        $('#myModal2').show();
                        $('#modal-body2').html("Duplicate Phone Number found");
                        btnClose();
                // setTimeout(function(){
                //   window.location.href='update-delete.php';
                // }, 1000);
            }
            else if(response_update == 2)
            {
                        $('#myModal2').show();
                        $('#modal-body2').html("Duplicate E-mail ID found");
                        btnClose();
                // setTimeout(function(){
                //   window.location.href='update-delete.php';
                // }, 1000);
            }
            else
            {
                $('#myModal2').show();
                $('#modal-body2').html("Account Updated");
                btnClose();
                setTimeout(function(){
                  window.location.href='update-delete.php';
                }, 1000);
            }
        }
    });
    } 
});
});

</script>
