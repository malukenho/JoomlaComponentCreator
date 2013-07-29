<?php if(! isset($_SESSION['component']))	$_SESSION = $_POST; ?>
<style>
.drogstyle{
	border: 3px dashed #CCC;
}
.componentcontent{
	background: #F1F1F1;
	border: 1px solid #CCC;
	border-radius: 5px 5px;
	padding: 2% 5%;
	width: 90%;
	position: relative;
}
.main{
	height: 500px;
	padding: 20px;
}
.mt20{ margin-top: 20px; }
</style>
<div class="container">

  <div class="form-signin center">
  	<img src="<?php echo Load::gravatarImage($_SESSION['component']['author_mail'], 40); ?>" class="img-circle" style="float: left; margin-right: 10px">
	<h3 id="componentname"><?php echo $_SESSION['component']['name']; ?> - <small>v<?php echo $_SESSION['component']['version']; ?></small></h3>
	
	<a class="btn btn-success" style="float: right;" href="javascript:return false;"><span class=" icon-download-alt"></span>Download</a>
	<a class="btn" style="float: right; margin-right: 10px;" target="_blank" href="http://twitter.com/malukenho">@malukenho</a>
	
	<blockquote><p><small><cite>Nyaapy! </cite></small></p></blockquote>
  </div>

<hr/>

<!-- Previewer -->
<div class="span8 drogstyle main">

<h4 class="leader">Component Fields</h4>


<div class="mt20">
	<table id="fieldsInComponent" class="table table-bordered table-striped">
		<thead><tr><td>Name</td><td>Type</td><td>Actions</td></tr></thead>
		<tbody></tbody>
	</table>
</div>


</div><!-- / Previewer -->


<!-- Tabs -->
<div class="span3">
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Fields</a></li>
  <li><a href="#profile" data-toggle="tab">Html Elements</a></li>
</ul>

	<div class="tab-content">
	
	<div class="tab-pane active" id="home">
  		<table class="table table-bordered">
  			<?php Load::plugins('Field'); ?>
		</table>
  	</div>
  		
  		<div class="tab-pane" id="profile">
  		<table class="table table-bordered">
  			<?php Load::plugins('HTML'); ?>
		</table>
  		</div>
	</div>
</div>

</div><!-- / Tabs -->


    
    
<script>
  $(function () {
    $( "#fieldsInComponent tbody" ).sortable();
    $( "#fieldsInComponent tbody" ).disableSelection();
    $('#myTab a:last').tab('show');
  })
</script>