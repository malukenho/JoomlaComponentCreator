<?php
/**
 *
 * @pluginname Paragraph
 * @pluginhelp This text here apear in help text of this plugin ok?
 * @plugintype HTML
 */
class Header{

	public function form()
	{
		$html  = '<dl class="dl-horizontal">';
		
		$html .= '<dt>Text</dt>';
		$html .= '<dd><input type="text" name="label" placeholder="Text of P tag"></dd>';
		
		$html .= '<dt>Class</dt>';
		$html .= '<dd><input type="text" name="class" placeholder="Class"></dd>';
		
		$html .= '<dt>ID</dt>';
		$html .= '<dd><input type="text" name="id" placeholder="ID"></dd>';
		
		$html .= '<input type="hidden" name="type" value="Paragraph" />';
		$html .= '</dl>';
		return $html;
	}

	
}
return new Header;