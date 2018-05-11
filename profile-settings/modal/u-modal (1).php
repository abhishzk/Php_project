<?php
include '../../config.php';

    $id = $_REQUEST['id'];

  $get_user = mysqli_query($conn,"SELECT * FROM user_dtls where user_id = '$id1'");
  while($row_user=mysqli_fetch_array($get_user))
  {
    $nm=$row_user['user_nm'];
    $add=$row_user['user_add'];
    $phone=$row_user['user_ph'];
    $email=$row_user['user_email'];
    $password=$row_user['user_pass'];
  }

?>
<div class="modal-dialog">
  <div class="modal-content" style="border-radius: 0px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Profile Update</h4>
    </div>
    <br>
    <form id="modalform" action="" class="form-horizontal calender" name="modalform" enctype="multipart/form-data" method="post" role="form">

<?php 

if ($id == "nm") 
{

?>

    <div class="form-group">
        <label class="col-sm-3 control-label">Name <span class="required">*</span></label>
        <div class="col-sm-5">
            <input type="text" value = "<?php echo $nm; ?>" class="form-control" id="name" name="name">   
        </div>
    </div>
<?php 

}

elseif ($id == "add") 
{

?>

    <div class="form-group">
        <label class="col-sm-3 control-label">Address <span class="required">*</span></label>
        <div class="col-sm-5">
            <input type="text" value = "<?php echo $add; ?>" class="form-control" id="address" name="address">   
        </div>
    </div>
<?php 

}

elseif ($id == "ph") 
{

?>

    <div class="form-group">
        <label class="col-sm-3 control-label">Phone <span class="required">*</span></label>
        <div class="col-sm-5">
            <input type="text" value = "<?php echo $phone; ?>" class="form-control" id="phone" name="phone">   
        </div>
    </div>
<?php 

}

elseif ($id == "email") 
{

?>

    <div class="form-group">
        <label class="col-sm-3 control-label">E-mail ID <span class="required">*</span></label>
        <div class="col-sm-5">
            <input type="text" value = "<?php echo $email; ?>" class="form-control" id="email" name="email">   
        </div>
    </div>
<?php 

}

elseif ($id == "pass") 
{

?>

    <div class="form-group">
        <label class="col-sm-3 control-label">E-mail ID <span class="required">*</span></label>
        <div class="col-sm-5">
            <input type="text" value = "<?php echo $password; ?>" class="form-control" id="pass" name="pass">   
        </div>
    </div>
<?php 

}

?>

<br>


    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button type="submit" class="btn btn-danger" name="confirm" id="confirm">Confirm</button>
    </div>

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

    event.preventDefault();

    var name = $("#name").val();
    var address = $("#address").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var pass = $("#pass").val();

    if (name=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter name");
        btnClose();
    }
    else if (address=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter address");
        btnClose();
    }
    else if (phone=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter phone number");
        btnClose();
    }
    else if (email=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter email");
        btnClose();
    }
    else if (pass=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter password");
        btnClose();
    }
    else
    {
        if($('#user_gender').is(':checked'))
        {
            var gender = "1";
        }
        else
        {
            var gender = "2";
        }

        $.ajax({
            type: 'POST',
            url: 'code/u-update.php',
            data: ({ name: name, address: address, gender: gender, phone: phone, email: email, pass: pass }),
            success: function(response2) {

            if(response2 == "1")
            {
                $('#myModal2').show();
                $('#modal-body2').html("Data updated");
                btnClose();
                setTimeout(function(){
                  window.location.href='settings.php';
                }, 1000);
            }
        }
    });
    } 
});
});

</script>
