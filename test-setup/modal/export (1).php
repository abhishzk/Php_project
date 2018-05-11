<?php
include '../../config.php';

                    $tid = $_REQUEST['tid'];
                    $cid = $_REQUEST['cid'];
                    $sid = $_REQUEST['sid'];
                    $one = $_REQUEST['one'];


      $sql = mysqli_query($conn,"SELECT * FROM q_temp where test_id='$tid' and subject_id='$sid' and course_id='$cid' and teacher_id='$id1' and status='-1'");
      if($row = mysqli_fetch_array($sql)) 
      {
        $t = 0;
      }
      else
      {
        $query = mysqli_query($conn,"INSERT INTO q_temp (sl, test_id, teacher_id, course_id, subject_id, status) VALUES (NULL, '$tid', '$id1', '$cid', '$sid', '-1')");
      }

                    

?>
<div class="modal-dialog">
  <div class="modal-content" style="border-radius: 0px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Export Excel</h4>
    </div>
    <br>
                <form id="modalform" action="" class="form-horizontal calender" name="modalform" enctype="multipart/form-data" method="post" role="form">

                    <div class="form-group" align="center">

                        <a href="code/excel-export.php?tid=<?php echo $tid;?>&cid=<?php echo $cid;?>&sid=<?php echo $sid;?>&cid=<?php echo $one;?>" class="btn btn-primary btn-md">Download</a>
                    </div>

                    <div class="form-group" align="center">

                        <a href="javascript:void(0);" class="btn btn-success btn-md" onclick="fileExport('<?php echo '1';?>')">Upload</a>
                    </div>
                    
                    <br><br>

                    <input type="hidden" name="">

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


