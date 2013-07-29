<?php
class Load
{
	public static function view($file)
	{
		if(file_exists(ROOT_PATH . "/view/{$file}.php"))
			require ROOT_PATH . "/view/{$file}.php";
	}
	
	public static function gravatarImage($email = 'none@none.com.br', $size = 200)
	{
		$email = md5(strtolower(trim($email)));
		return 'http://gravatar.com/avatar/' . $email . '?s=' . $size;
	}
	
	public static function plugins($type = 'Field')
	{
		$extension = array('php', 'php4', 'php5');
		$files     = new DirectoryIterator(PLUGINS_PATH);
		
		foreach($files as $field)
		{	
			if($field->isDot() || !$field->isFile()) continue;
			
			$info = pathinfo($field->getFileName());
			
			if (! in_array($info['extension'], $extension)) continue;
			
			require_once PLUGINS_PATH . "/" . $field->getFileName();
			$class = substr($field->getfileName(), 0, strrpos($field->getFileName(), '.'));
			self::analizeClass($class, $type);
		}
	}
	
	/**
	 * Analyze and display plugin to use in your componente.
	 * 
	 *
	 */
	public static function analizeClass($class, $type)
	{
		if(! class_exists($class)) return false;

		$reflection = new ReflectionClass($class);
		$dockblock  = $reflection->getDocComment();
		
		$classInstance = new $class();
		
		preg_match_all('/\@(\w+) (.+)/', $dockblock, $match);
		
		for($i = 0; $i < count($match[1]); $i++)
			$config[$match[1][$i]] = $match[2][$i];
		
		if($config['plugintype'] != $type) return false;
		
		$uniqueID = md5(microtime());
		
		$result =  "<tr><td title='{$config['pluginhelp']}'>
					<a data-toggle='modal' href='#{$uniqueID}'>
						{$config['pluginname']}
					</a>
					</td>
				</tr>";
		
		$result .= "<!-- Modal of {$config['pluginname']} -->
<div id='{$uniqueID}' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
    <h3 id='myModalLabel'>{$config['pluginname']}</h3>
  </div>
  <div class='modal-body'>
  	<blockquote><p><small><cite>" . $config['pluginhelp'] . "</small></cite></p></blockquote>
    <p>" . $classInstance->form() . "</p>
  </div>
  <div class='modal-footer'>
    <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
    <button class='btn send btn-primary' data-loading-text='Loading...'>Insert Field</button>
  </div>
</div>";
		
		$result .= '<script>
		$(document).ready(function(){
				$("#' . $uniqueID . ' .send").click(function(){
				
					var html = "<tr><td>";
					
					html += "<p class=\"leader\">" + $("#' . $uniqueID . ' input[name=\"label\"]").val() + "</p>";
					
					$("#' . $uniqueID . ' input,#' . $uniqueID . ' text,#' . $uniqueID . ' hidden,#' . $uniqueID . ' checkbox,#' . $uniqueID . ' textarea").each(function(){
						html += "<input type=\"hidden\" value=\"" + $(this).val() +"\" name=\"" + $(this).attr("name") + "\" />";
					});
					
					html += "</td>";
					
					html += "<td>" +  $("#' . $uniqueID . ' input[name=\"type\"]").val() + "</td>";
					
					html += "<td>delete</td>";
					
					html += "</tr>";
					
					/*$.post(\'actions/saveFields.php\',	  { 
						data: $("#' . $uniqueID . '").html()
					});*/
					
					$("#' . $uniqueID . ' input[type=\"text\"],#' . $uniqueID . ' textarea").each(function(){ $(this).val(""); });
					
					$("#fieldsInComponent tbody").append(html);
					$("#' . $uniqueID . '").modal("hide");
				});
			});
		</script>';
		
		echo $result;
		
		
	}
	

}