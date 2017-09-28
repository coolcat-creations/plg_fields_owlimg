<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Owlimg
 *
 * @copyright   Copyright (C) 2017 NAME. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JFormHelper::loadFieldClass('folderlist');

class JFormFieldOwlimg extends JFormFieldFolderList
{
	public $type = 'Owlimg';
}
