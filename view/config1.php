<div class="container">

	<form action="?config=2" method="post" class="form-signin center">
    	<h1>Configurations</h1>
		<p class="lead"><span class=" icon-wrench"></span> The First step is to configure your component</p>
		
		<dl class="dl-horizontal">
		
			<dt>Name of component</dt>
			<dd><input required="required" name="component[name]" type="text" placeholder="Name of component"></dd>
			
			<dt>Description</dt>
			<dd><textarea name="component[description]" placeholder="Describe your component here"></textarea></dd>
		
			<dt>Version of Joomla!</dt>
			<dd>
				<select name="component[joomla_version]">
					<option value="2.5">2.5</option>
					<option value="3">3.x</option>
				</select>
			</dd>
			
			<hr />
			
			<dt>Menu Administrator</dt>
			<dd><input name="component[menu_admin]" type="text" placeholder="Name of menu administrator"></dd>
			
			<hr />
			
			<dt>Author name</dt>
			<dd><input name="component[author]" type="text" placeholder="Author name"></dd>
			
			<dt>Author email</dt>
			<dd><input name="component[author_mail]" type="text" placeholder="Author email"></dd>
			
			<dt>Author URL</dt>
			<dd><input  name="component[site]" type="text" placeholder="Author URL"></dd>
			
			<dt>Copyright</dt>
			<dd><input  name="component[copyright]"type="text" placeholder="Copyleft Info :)"></dd>
			
			<dt>Version</dt>
			<dd><input  name="component[version]" type="text" placeholder="0.0.1"></dd>
			
			
			
			
		</dl>
		<div class="form-actions">
		<input type="submit" class="left btn btn-warning btn-large" value="Next" />
		</div>
	</form>

</div>