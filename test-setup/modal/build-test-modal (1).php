<?php
include '../../config.php';

    $tid = $_REQUEST['tid'];
    $tcd = $_REQUEST['tcd'];
    $tsd = $_REQUEST['tsd'];
    $sem = $_REQUEST['sem'];

?>
<div class="modal-dialog">
  <div class="modal-content" style="border-radius: 0px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Test Details</h4>
    </div>
    <br>
    <form id="modalform" action="" class="form-horizontal calender" name="modalform" enctype="multipart/form-data" method="post" role="form">

    <div class="form-group">
        <label class="col-sm-3 control-label">Total Questions <span class="required">*</span></label>
        <div class="col-sm-5">
            <input type="text" value = "" class="form-control" id="total_q" name="total_q" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57; validate(event)'>   
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Test Date <span class="required">*</span></label>
        <div class="col-sm-5">
            <input type="text" value = "" class="form-control" id="test_date" name="test_date">  
        </div>
    </div>

    <div class="form-group clockpicker" >
        <label class="col-sm-3 control-label">Test Start Time <span class="required">*</span></label>
        <div class="col-sm-5">
        <input type="text" class="form-control" value="" id="ts_time" name="ts_time">
        </div>
    </div>

    <div class="form-group clockpicker" >
        <label class="col-sm-3 control-label">Test End Time <span class="required">*</span></label>
        <div class="col-sm-5">
        <input type="text" class="form-control" value="" id="te_time" name="te_time">
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button type="submit" class="btn btn-danger" name="confirm" id="confirm">Confirm</button>
    </div>

    <input type="hidden" name="blank_id" id="blank_id" value="<?php echo $tid;?>">
    <input type="hidden" name="blank_id2" id="blank_id2" value="<?php echo $tsd;?>">
    <input type="hidden" name="blank_id3" id="blank_id3" value="<?php echo $tcd;?>">
    <input type="hidden" name="blank_id4" id="blank_id4" value="<?php echo $sem;?>">



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

// code for date picker
$( function() {
    $( "#test_date" ).datepicker({ dateFormat: 'dd-mm-yy'});
});

$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true
});


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

    var total_q = $("#total_q").val();
    var test_date = $("#test_date").val();
    var ts_time = $("#ts_time").val();
    var te_time = $("#te_time").val();
    var tid = $("#blank_id").val();
    var tsd = $("#blank_id2").val();
    var tcd = $("#blank_id3").val();
    var sem = $("#blank_id4").val();

    if (total_q=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter total number of questions");
        btnClose();
    }
    else if (test_date=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter the Test Date");
        btnClose();
    }
    else if (ts_time=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter test start time");
        btnClose();
    }
    else if (te_time=='') 
    {
        $('#myModal2').show();
        $('#modal-body2').html("Please enter test end time");
        btnClose();
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: 'code/build-test2.php',
            data: ({ total_q: total_q, test_date: test_date, ts_time: ts_time, te_time: te_time, tid: tid, tsd: tsd, tcd: tcd, sem: sem }),
            success: function(response2) {

            if(response2 != "")
            {
                $('#myModal2').show();
                $('#modal-body2').html("Test has been generated");
                btnClose();
                setTimeout(function(){
                  window.location.href='build-test.php';
                }, 1000);
            }
        }
    });
    } 
});
});

</script>
