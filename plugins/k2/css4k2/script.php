<?php
/**
* @version 			Css4K2 1.8.x
* @package			Css4K2
* @url				http://www.jiliko.net
* @editor			Jiliko - www.jiliko.net
* @copyright		Copyright (C) 2012 JILIKO. All Rights Reserved.
* @license 			GNU General Public License version 2 or later; see _LICENSE.php
**/

// No Direct Access
defined( '_JEXEC' ) or die;

// Script
class plgK2Css4K2InstallerScript
{
	// install
	function install( $parent )
	{
	}
	
	// uninstall
	function uninstall( $parent )
	{
	}
	
	// update
	function update( $parent )
	{		
	}
	
	// preflight
	function preflight( $type, $parent )
	{
	}
	
	// postflight
	function postflight( $type, $parent )
	{
		$app	=	JFactory::getApplication();
		$db		=	JFactory::getDBO();
		
		$db->setQuery( 'UPDATE #__extensions SET enabled = 1 WHERE folder="k2" AND element = "css4k2"' );
		$db->execute();
		
		$language = JFactory::getLanguage();
		$language->load('plg_k2_css4k2', JPATH_ADMINISTRATOR, 'en-GB', true);
		$language->load('plg_k2_css4k2', JPATH_ADMINISTRATOR, null, true);
	}
	
}
?>