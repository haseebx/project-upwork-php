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
            	<small>Categories
				<?php 
				$QRYss = qry_run("select * from ms_section where mainid = ".ch_lvl('mid')."  order by ranking");
                 if (num_rec($QRYss) > 0) 
                 { 
				 ?><?php }else {?>
				<a href="add-process/add_products.php?mid=<?=$_REQUEST['mid']?>" class="pull-right btn btn-danger" style="margin-left:10px;"><i class="fa fa-upload"></i> Add New Products</a>
				 <?php }?>
				<a href="add-process/add_secions.php?mid=<?=$_REQUEST['mid']?>" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add New Sub Category</a></small>
            </h1>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php 
                            $cate = ""; 
                            $RNK = qry_run("select * from ms_main where mainid = ".ch_lvl('mid')." order by ranking"); 
                            if (num_rec($RNK) > 0) 
                            { 
                            $rk = fetch_rec($RNK); 
                            $cate = $rk['pname']; 
                            } 
                            $QRY = qry_run("select * from ms_section where mainid = ".ch_lvl('mid')." order by ranking"); 
                            if (num_rec($QRY) > 0) 
                            { 
                            $plink = "No"; 
                            }else{ 
                            $plink = "Yes"; 
                            } 
                            ?>
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Categories | <?=$cate?></h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	
									<div class="panel-body">
                                    <div id="morris-area-chart">
                                    <form action="act-process/sub_action.php?mid=<?=$_REQUEST['mid']?>" id="catsfrm" name="catsfrm" method="post" onSubmit="return chkfrmAct();">
                                    <table>
                                    	<thead>
                                        	<tr>
                                            	<th>
                                                <select name="act" id="act" class="form-control" onChange="javascript:ChangeAct(this.value);">
                                                    <option value="">Select Action</option>
                                                    <option value="UpdCRank">Update Rank</option>
                                                    <option value="DelCat">Delete Categories</option>
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
                                        	<?php if(isset($_REQUEST['er']) && $_REQUEST['er'] == "Y"){?>
                                        	<th height="50" colspan="6" align="center" valign="middle"><font color="#FF0000">Please Delete Products First</font></th>
                                            <?php }else{?>
                                            <?php }?>
                                        </tr>
                                        <tr>
                                        	<th><input type="checkbox" name="select_all" id="select_all" onClick="checkAll(document.getElementById('catsfrm'), 'categories',this);" value="true"></th>
                                            <th>#</th>
                                            <th>Sub Category Name</th>
                                            <th>Active</th>
                                            <th>Ranking</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php 
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $p = 1; 
                                    while($rs = fetch_rec($QRY)) 
                                    { 
                                    $slink = "No"; 
                                    $catid = 0; 
                                    $QRYs = qry_run("select * from ms_prods where mainid = ".$rs['mainid']." AND secid = ".$rs['secid']." AND catid = ".$catid." order by ranking"); 
                                    if (num_rec($QRYs) > 0) 
                                    { 
                                    $slink = "Yes"; 
                                    }else{ 
                                    if ($LVL >=2) 
                                    { 
                                    $slink = "No"; 
                                    }else{ 
                                    $slink = "Yes"; 
                                    } 
                                    } 
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                        	<th><input type="checkbox" name="Chk[]" value="<?=$rs['secid'];?>"  class="checkbox"></th>
                                            <th><?=$p?>.</th>
                                            <th><a href="<?php if ($slink == "Yes"){?>prods.php?mid=<?=$rs['mainid']?>&sec=<?=$rs['secid']?>&cat=0<?php }else{?>subsection.php?mid=<?=$rs['mainid']?>&sec=<?=$rs['secid']?><?php }?>" class="base_link"><?=$rs['pname']?></a></th>
                                            <th><?=$rs['pshow']?></th>
                                            <th><input type="text" class="form-control" name="ranking<?=$rs['secid']?>" value="<?=$rs['ranking']?>"></th>
                                            <th><a href="edit-process/edit_section.php?mid=<?=$rs['mainid']?>&amp;sec=<?=$rs['secid']?>" class="btn btn-primary">Edit</a></th>
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