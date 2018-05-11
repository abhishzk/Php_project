<?php
$uid = $_REQUEST['uid'];
?>
<div class="modal-dialog">
  <div class="modal-content" style="border-radius: 0px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Add New</h4>
    </div>
    <br>
                  <form id="modalform" action="" class="form-horizontal calender" name="modalform" enctype="multipart/form-data" method="post" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Course Name<span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" value="" class="form-control" id="c_nm" name="c_nm">                            
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
     var c_nm = $("#c_nm").val();

     event.preventDefault();

     if(c_nm == "")
     {
       $('#myModal2').show();
       $('#modal-body2').html("Please enter course name");
       btnClose();
     }
     else {

     $.ajax({
     type: 'POST',
     url: 'code/new-course.php',
     data: ({ c_nm: c_nm }),
     success: function(response) {

     if(response == 1)
     {
        $('#myModal2').show();
        $('#modal-body2').html("Course already exists");
        btnClose();
     }
     else
     {
        $('#myModal2').show();
        $('#modal-body2').html("New Course Added");
        btnClose();
        setTimeout(function(){
          window.location.href='assign-subject.php';
        }, 1000);
     }
     }
    });
    }
   });
 });
</script>
