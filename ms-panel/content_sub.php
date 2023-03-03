<?php  
include "common/param.php";
include "common/func.php";
include "common/chk_login.php";
include "assets/include/head.php";
include "assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>Content Pages<a href="add-process/add_sub_page.php?mainid=<?=$_REQUEST['mainid']?>" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add New Sub Page</a></small>
            </h1>
            
			<?php 
			$pname ="";
			$QRY = qry_run("select * from ms_contents where mainid = ".$_REQUEST['mainid']."");
			if (num_rec($QRY) > 0)
			{
			$rs = fetch_rec($QRY);
			$pname = $rs['pname'];
			}
			?> 
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Sub Pages <?=$pname?></h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	
									<div class="panel-body">
                                    <div id="morris-area-chart">
                                    <form action="act-process/content-sub-action.php" id="catsfrm" name="catsfrm" method="post" onSubmit="return chkfrmAct();">
									
                                        <input type="hidden" name="mainid" value="<?=$_REQUEST['mainid']?>">
                                    <table>
                                    	<thead>
                                        	<tr>
                                            	<th>
                                                <select name="act" id="act" class="form-control" onChange="javascript:ChangeAct(this.value);">
                                                    <option value="">Select Action</option>
                                                    <option value="UpdCRank">Update Rank</option>
                                                    <option value="DelCat">Delete</option>
                                                </select>
												<script>
                                                function chkfrmAct(){
                                                if(document.catsfrm.act.value=="DelCat"){
                                                if(confirm('Are you sure you want to delete selected records?')){
                                                return true;
                                                }else{
                                                return false
                                                }
                                                }
                                                }
                                                </script>
                                                </th>
                                                <th>&nbsp;</th>
                                                <th><button type="submit" class="btn btn-danger">Go</button></th>
												
                                            </tr>
                                            <tr>
                                            	<th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        	<th><input type="checkbox" name="select_all" id="select_all" onClick="checkAll(document.getElementById('catsfrm'), 'categories',this);" value="true"></th>
                                            <th>#</th>
                                            <th>Sub Page Heading</th>
                                            <th>Active</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $QRY = qry_run("select * from  ms_contents_sub where mainid = ".$_REQUEST['mainid']."");
                                    if (num_rec($QRY) > 0)
                                    {
                                    $p = 1;
                                    while($rs = fetch_rec($QRY))
                                    {
                                    
                                    ?>
                                    
                                        <tr>
											<th><input type="checkbox" name="Chk[]" value="<?=$rs['subid'];?>"  class="checkbox"></th>
                                            <th><?=$p?>.</th>
                                            <th><?=$rs['pname']?> </th>
                                           
                                            <th><?=$rs['pshow']?></th>
                                           
                                            <th><a href="edit-process/edit_sub_page.php?mainid=<?=$rs['mainid']?>&amp;subid=<?=$rs['subid']?>" class="btn btn-primary">Edit</a></th>
                                        </tr>
                                    </tbody>
                                    <?php
									$p++;
									}
									}
									?>
                                    </table>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
</div>
<?php include "assets/include/footer.php";?>
<script type="text/javascript">
function deleteConfirm(){
    var result = confirm("Are you sure to delete users?");
    if(result){
        return true;
    }else{
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>