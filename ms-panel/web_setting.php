<?php  
include "common/param.php";
include "common/func.php";
include "common/chk_login.php";
include "assets/include/head.php";
include "assets/include/header.php";
$mid = 1;
?>

<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>Website Setting</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Website Setting</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	<form action="<?=$web_url?>/process/web_process.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="sub_mit" value="Y">
                                    <input type="hidden" name="LVL" value="1">
                                    <input type="hidden" name="C_TYPE" value="EDIT">
                                    <input type="hidden" name="mid" value="<?=$mid?>">
									<?php
                                    $QRY = qry_run("select * from ms_webs WHERE mainid = ".$mid."");
                                    if (num_rec($QRY) > 0)
                                    {
                                    $rs = fetch_rec($QRY);
                                    ?>
                                    <?php if (chp('UP') == "Y"){ ?>
                                    <div class="col-md-12">
                                    	<p><font color="#006600"><strong>Updated Successfully.........</strong></font></p>
                                    </div>
                                    <?php }?>
                                	<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Title</label>
                                            <input type="text" class="form-control" name="web_title" value="<?=$rs['web_title']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Name</label>
                                            <input type="text" class="form-control" name="web_name" value="<?=$rs['web_name']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website URL</label>
                                            <input type="text" class="form-control" name="web_url_2" value="<?=$rs['web_url_2']?>">
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Admin Panel URL</label>
                                            <input type="text" class="form-control" placeholder="Do Not Use / in this" name="web_url" value="<?=$rs['web_url']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Email</label>
                                            <input type="text" class="form-control" name="web_email" value="<?=$rs['web_email']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Phone Number</label>
                                            <input type="text" class="form-control" name="phone" value="<?=$rs['phone']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Cell Number</label>
                                            <input type="text" class="form-control" name="mobile" value="<?=$rs['mobile']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Fax Number</label>
                                            <input type="text" class="form-control" name="fax" value="<?=$rs['fax']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company address</label>
                                            <input type="text" class="form-control" name="address" value="<?=$rs['address']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Order Email Received on</label>
                                            <input type="text" class="form-control" name="email_to" value="<?=$rs['email_to']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Owner Name</label>
                                            <input type="text" class="form-control" name="owner_name" value="<?=$rs['owner_name']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Copy Rights</label>
											<textarea name="copy_right" class="form-control " id="ckeditor1"><?=$rs['copy_right']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Design & Develop</label>
											<textarea name="design_develop" class="form-control " id="ckeditor2"><?=$rs['design_develop']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    <?php }?>
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
<script>
CKEDITOR.replace( 'ckeditor1', {
	toolbar: [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image', 'HorizontalRule', 'SpecialChar' ] },
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
	{ name: 'styles', items: [ 'Styles', 'Format' ] },
	]
});
CKEDITOR.replace( 'ckeditor2', {
	toolbar: [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image', 'HorizontalRule', 'SpecialChar' ] },
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
	{ name: 'styles', items: [ 'Styles', 'Format' ] },
	]
});
</script>
<?php include "assets/include/footer.php";?>