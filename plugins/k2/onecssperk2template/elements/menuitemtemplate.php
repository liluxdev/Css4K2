<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.html.parameter.element');

class JElementMenuItemTemplate extends JElement
{

	var $_name = 'MenuItemTemplate';

	function fetchElement($name, $value, & $node, $control_name) {

		$mainframe = &JFactory::getApplication();

		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
		
		require_once (JPATH_ROOT.DS.'libraries'.DS.'joomla'.DS.'html'.DS.'parameter'.DS.'element'.DS.'menuitem.php');
		require_once (JPATH_ROOT.DS.'libraries'.DS.'joomla'.DS.'html'.DS.'html'.DS.'menu.php');
		
		//We load the plugin parameters
		$plugin =& JPluginHelper::GetPlugin('k2', 'onecssperk2template');
		$pluginParams = new JParameter($plugin->params);
		
		if(JFile::exists(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_k2templates'.DS.'helpers'.DS.'templates.php')) {
			
			require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_k2templates'.DS.'helpers'.DS.'templates.php');
			
			$html = '';
			
			$K2Templates = K2HelperTemplates::getTemplates(false);
			
			foreach($K2Templates as $K2TemplateName) {
			
				$attributes = 'class="inputbox" multiple="multiple"';

				$html.= '<p>'.$K2TemplateName.'</p>';
				//$html.= JElementMenuItem::fetchElement($name, $value, &$node, $control_name);
				$html.= JHTML::_('select.genericlist',  JHTMLMenu::linkoptions(), ''.$control_name.'['.$name.ucfirst($K2TemplateName).'][]', $attributes, 'value', 'text', (array) $pluginParams->get( $name.ucfirst($K2TemplateName), array() ) );
				$html.= '<br/>';
			}

			return $html;
		} else {
			return JText::_('You must install K2 Template Manager for this feature');
		}
	}

}
