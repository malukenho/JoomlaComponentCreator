<?php
/**
 *
 * @pluginname Calendar
 * @pluginhelp Insert a calendar field in your component form
 * @plugintype Field
 */
class Calendar{

	public function form()
	{
		$html  = '<dl class="dl-horizontal">';
		
		$html .= '<dt>Calendar</dt>';
		$html .= '<dd><input type="text" name="label" placeholder="Label for field"></dd>';
		
		$html .= '<dt>PlaceHolder</dt>';
		$html .= '<dd><input type="text" name="placeholder" placeholder="Label for field"></dd>';
		
		$html .= '<dt>Required</dt>';
		$html .= '<dd><select name="required"><option value="0">No</option><option value="1">Yes</option></dd>';
		
		$html .= '<dt>Description</dt>';
		$html .= '<dd><textarea name="helper" placeholder="Description of field"></textarea></dd>';
		
		$html .= '<input type="hidden" name="type" value="Calendar" />';
		$html .= '</dl>';
		return $html;
	}
	
	
}
return new Calendar;