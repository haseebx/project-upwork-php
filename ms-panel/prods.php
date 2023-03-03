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
            	<small>Categories<a href="add-process/add_products.php?mid=<?=$_REQUEST['mid']?>&amp;sec=<?=$_REQUEST['sec']?>&amp;cat=<?=$_REQUEST['cat']?>" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add New Products</a></small>
            </h1>
            
            <div class="row">
            	<div class="col-md-4"></div>
                <div class="col-md-4">
                	<div style="margin-bottom:20px;">
                    	<form action="prods.php?mid=<?=$_REQUEST['mid']?>&sec=<?=$_REQUEST['sec']?>&cat=<?=$_REQUEST['cat']?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for..." name="tsearch">
                            <span class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i class="fa fa-search"></i></button>
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
											  <th><a href="javascript:more_prods(<?=$rs['mainid']?>,<?=$rs['secid']?>,<?=$rs['catid']?>,<?=$rs['pid']?>);" class="btn btn-success">Upload More Views</a> - <a href="javascript:move_prods(<?=$rs['pid']?>);" class="btn btn-info">Move/Copy</a> - <a href="edit-process/edit_prod.php?mid=<?=$rs['mainid']?>&amp;sec=<?=$rs['secid']?>&amp;cat=<?=$rs['catid']?>&amp;pid=<?=$rs['pid']?>" class="btn btn-primary">Edit</a> - <a href="cat_prcess.php?mid=<?=$rsp['mainid']?>&sec=<?=$rsp['secid']?>&cat=<?=$rsp['catid']?>&pid=<?=$rsp['pid']?>&C_TYPE=DEL&LVL=4" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
                                          
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
                            $section = ""; 
                            $RNK = qry_run("select * from ms_section where secid = ".ch_lvl('sec')." order by ranking");
                            if (num_rec($RNK) > 0) 
                            { 
                            $rk = fetch_rec($RNK); 
                            $section = $rk['pname']; 
                            } 
                            $category = ""; 
                            $RNK = qry_run("select * from ms_cat where catid = ".ch_lvl('cat')." order by ranking");
                            if (num_rec($RNK) > 0) 
                            { 
                            $rk = fetch_rec($RNK); 
                            $category = $rk['pname']; 
                            } 
                            ?>
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Categories | <?php if (ch_lvl('mid') != 0){ ?><?=$cate?></a><?php }?><?php if (ch_lvl('sec') != 0){ ?> | <?=$section?></a><?php }?><?php if (ch_lvl('cat') != 0){ ?> | <?=$category?></a><?php }?></h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	
									<div class="panel-body">
                                    <div id="morris-area-chart">
                                    <form action="act-process/products_action.php?mid=<?=$_REQUEST['mid']?>&amp;sec=<?=$_REQUEST['sec']?>&amp;cat=<?=$_REQUEST['cat']?>" id="catsfrm" name="catsfrm" method="post" onSubmit="return chkfrmAct();">
                                    <table>
                                    	<thead>
                                        	<tr>
                                            	<th>
                                                <select name="act" id="act" class="form-control" onChange="javascript:ChangeAct(this.value);">
                                                    <option value="">Select Action</option>
                                                    <option value="UpdCRank">Update Rank</option>
                                                    <!--<option value="MoveCopy">Move / Copy</option>-->
                                                    <option value="DelCat">Delete Products</option>
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
                                            <th>Product Heading</th>
                                            <th>Art# No</th>
                                            <th>Active</th>
                                            <th>Ranking</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php 
                                    $QRY = qry_run("select * from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." order by ranking");
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $p = 1; 
                                    while($rs = fetch_rec($QRY)) 
                                    { 
                                    ?>
                                    <tbody>
                                        <tr>
                                        	<th><input type="checkbox" name="Chk[]" value="<?=$rs['pid'];?>"  class="checkbox"></th>
                                            <th><?=$p?>.</th>
                                            <th><?=$rs['pname']?></th>
                                            <th><?=$rs['part']?></th>
                                            <th><?=$rs['pshow']?></th>
                                            
                                            <th><input type="text" class="form-control" name="ranking<?=$rs['pid']?>" value="<?=$rs['ranking']?>"></th>
                                           
                                            <th><a href="javascript:more_prods(<?=$rs['mainid']?>,<?=$rs['secid']?>,<?=$rs['catid']?>,<?=$rs['pid']?>);" class="btn btn-success">Upload More Views</a> - <a href="javascript:move_prods(<?=$rs['pid']?>);" class="btn btn-info">Move/Copy</a> - <a href="edit-process/edit_prod.php?mid=<?=$rs['mainid']?>&amp;sec=<?=$rs['secid']?>&amp;cat=<?=$rs['catid']?>&amp;pid=<?=$rs['pid']?>" class="btn btn-primary">Edit</a></th>
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