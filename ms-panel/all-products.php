<?php  
include "common/param.php";
include "common/func.php";
include "common/chk_login.php";
include "assets/include/head.php";
include "assets/include/header.php";

?>

<script language="JavaScript"> 
function chk_form() 
{ 
if (checkempty(document.frm_add.pname,":.. Please enter Product Name.:")==false) return false;
return true; 
} 
function more_prods(id1,id2,id3,id4){ 
        var url; 
        url = '<?=$web_url?>/process/more_prods.php?mid='+id1+'&sec='+id2+'&cat='+id3+'&pid='+id4 
        microsite_window=window.open(url,'microsite_window','toolbar=no,location=no,borders=no,directories=no,status=yes,menubar=no,scrollbars=yes,top=150,left=100,resizable=no,width=1170,height=700')
        microsite_window.focus(); 
} 
function more_styles(id1,id2,id3,id4){ 
        var url; 
        url = '<?=$web_url?>/process/more_styles.php?mid='+id1+'&sec='+id2+'&cat='+id3+'&pid='+id4 
        microsite_window=window.open(url,'microsite_window','toolbar=no,location=no,borders=no,directories=no,status=yes,menubar=no,scrollbars=yes,top=150,left=100,resizable=no,width=825,height=260')
        microsite_window.focus(); 
} 
function related_prods(id1,id2,id3,id4) 
{ 
        var url; 
        url = '<?=$web_url?>/process/related_prods.php?mid='+id1+'&sec='+id2+'&cat='+id3+'&m_pid='+id4 
        microsite_window=window.open(url,'microsite_window','toolbar=no,location=no,borders=no,directories=no,status=yes,menubar=no,scrollbars=yes,top=150,left=100,resizable=no,width=825,height=360')
        microsite_window.focus(); 
} 
function assign_prods(id1,id2,id3,id4) 
{ 
        var url; 
        url = '<?=$web_url?>/process/assign_prods.php?mid='+id1+'&sec='+id2+'&cat='+id3+'&m_pid='+id4 
        microsite_window=window.open(url,'microsite_window','toolbar=no,location=no,borders=no,directories=no,status=yes,menubar=no,scrollbars=yes,top=150,left=100,resizable=no,width=825,height=360')
        microsite_window.focus(); 
} 
function move_prods(id4){ 
        var url; 
        url = '<?=$web_url?>/process/move_prods.php?pid='+id4 
        microsite_window=window.open(url,'microsite_window','toolbar=no,location=no,borders=no,directories=no,status=yes,menubar=no,scrollbars=yes,top=150,left=100,resizable=no,width=600,height=600')
        microsite_window.focus(); 
} 
</script>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
        <h1 class="page-header">
            		<small>Products</small>
        </h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Products</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                            
                            <div class="row">
            	<div class="col-md-4"></div>
                <div class="col-md-4">
                	<div style="margin-bottom:20px;">
                    	<form action="all-products.php" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for..." name="tsearch">
                            <span class="input-group-btn">
                            <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
				<div class="col-md-12">
                	<div class="panel panel-default">
                        <div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Search Products</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	
									<div class="panel-body">
                                    <div id="morris-area-chart">
										
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Heading</th>
                                            <th>Active</th>
                                            <th>Article</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
                                    	<?php
                                        $cur_page = intval(ch_page('cur'));
                                        //$PER_PAGE = 4;
                                        $prod_page = $PER_PAGE;
                                        $perpage = $prod_page;
                                        if ($cur_page == 1)
                                        {
                                        $subt = 0;
                                        }else{
                                        $subt = $cur_page * $prod_page;
                                        $subt = $subt - $prod_page;
                                        }
                                        $sqln = "Select * from ms_prods where pshow = 'Yes' AND (pname Like '%".chf('tsearch')."%' OR part Like '%".chf('tsearch')."%' OR pdetail Like '%".chf('tsearch')."%') order by part";
                                        $queryn = qry_run($sqln);
                                        $rs_n = num_rec($queryn);
                                        ?>
                                        <?php
                                        $sql = "Select * from ms_prods where pshow = 'Yes' AND (pname Like '%".chf('tsearch')."%' OR part Like '%".chf('tsearch')."%' OR pdetail Like '%".chf('tsearch')."%') order by part";
                                        $query = qry_run($sql);
                                        $rs_num = num_rec($query);
                                        if ($rs_num > 0)
                                        {
                                        $p = 1;
                                        while ($rsp = fetch_rec($query))
                                        {
                                        ?>
                                        <?php if(isset($_REQUEST['tsearch']) && $_REQUEST['tsearch'] != ""){?>
                                        <tr>
                                        	<th><?=$p?>.</th>
                                            <th><?=$rsp['pname']?></th>
                                            <th><?=$rsp['pshow']?></th>
                                            <th><?=$rsp['part']?></th>
                                            <th><a href="prods.php?mid=<?=$rsp['mainid']?>&sec=<?=$rsp['secid']?>&cat=<?=$rsp['catid']?>" class="btn btn-primary">View</a></th>
                                        </tr>
                                        <?php }else{?>
                                        <?php }?>
                                    <?php
                                    $p++;
                                    }
                                    }
                                    ?>    
                                    </tbody>
                                    </table>
									</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            
                                <div class="row">
                                	<div class="col-md-12">
									<div class="panel-body">
                                    <div id="morris-area-chart">
                                    
                                    
                                    
                                    <form action="<?=$web_url?>/act-process/all-action.php" id="catsfrm" name="catsfrm" method="post" onSubmit="return chkfrmAct();">
                                    <table>
                                    	<thead>
                                        	<tr>
                                            	<th>
                                                <select name="act" class="form-control" onChange="javascript:ChangeAct(this.value);">
                                                    <option value="">Select Action</option>
                                                    <!--<option value="UpdCRank">Update Rank</option>-->
                                                    <option value="DelCat">Delete Products</option>
                                                    <option value="Active">Active Products</option>
                                                    <option value="Unactive">Unactive Products</option>
                                                    <option value="Featured">Set Featured</option>
                                                    <option value="Special">Set Special</option>
                                                    <option value="New">Set What's New</option>
                                                    <option value="UnFeatured">Un Set Featured</option>
                                                    <option value="UnSpecial">Un Set Special</option>
                                                    <option value="UnNew">Un Set What's New</option>
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
                                            <th><strong>#</strong></th>
                                            <th><strong>Product Name</strong></th>
                                            <th><strong>Art No.</strong></th>
                                            <th><strong>Active</strong></th>
                                            <th><strong>Main Category</strong></th>
                                            <th><strong>Feature</strong></th>
                                            <th><strong>Special</strong></th>
                                            <th><strong>Hot</strong></th>
                                            <th><strong>Ranking</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
									<?php 
                                    $QRY = qry_run("select * from ms_prods order by pid");
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $p = 1; 
                                    while($rs = fetch_rec($QRY)) 
                                    { 
                                    ?>
                                    <?php
                                    $QRYm = qry_run("select * from ms_main where mainid = ".$rs['mainid']." order by ranking");
                                    if (num_rec($QRYm) > 0) 
                                    { 
                                    while($main = fetch_rec($QRYm)) 
                                    {
									?>
                                    <tbody>
                                        <tr>
                                        	<th><input type="checkbox" name="Chk[]" value="<?=$rs['pid'];?>"  class="checkbox"></th>
                                            <th><?=$p?>.</th>
                                            <th><?=$rs['pname']?></th>
                                            <th><?=$rs['part']?></th>
                                            <th><?=$rs['pshow']?></th>
                                            <th><?=$main['pname']?></th>
                                            <th><?=$rs['feature']?></th>
                                            <th><?=$rs['special']?></th>
                                            <th><?=$rs['new']?></th>
                                            <th><input type="text" class="form-control" name="ranking" value="<?=$p?>"></th>
                                            <th><a href="edit-process/edit_prod.php?mid=<?=$rs['mainid']?>&amp;sec=<?=$rs['secid']?>&amp;cat=<?=$rs['catid']?>&amp;pid=<?=$rs['pid']?>" class="btn btn-primary">Edit</a></th>
                                            
                                        </tr>
                                    </tbody>
                                   	<?php 
									}
									}
									?>
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