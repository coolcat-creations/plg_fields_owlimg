<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Owlimg
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('JFolder', JPATH_LIBRARIES . '/joomla/filesystem/folder.php');

$folder = $field->value;
if (!$folder)
{
	return;
}

$customclass       = $fieldParams->get('customclass', 'myowl');
$items             = $fieldParams->get('items', '3');
$margin            = $fieldParams->get('margin', '');
$stagepadding      = $fieldParams->get('stagepadding', '');
$center            = $fieldParams->get('center', false);
$autowidth         = $fieldParams->get('autowidth', false);
$loop              = $fieldParams->get('loop', false);
$rewind            = $fieldParams->get('rewind', true);
$lazyload          = $fieldParams->get('lazyload', false);
$mousedrag         = $fieldParams->get('mousedrag', true);
$touchdrag         = $fieldParams->get('touchdrag', true);
$pulldrag          = $fieldParams->get('pulldrag', true);
$freedrag          = $fieldParams->get('freedrag', false);
$nav               = $fieldParams->get('nav', false);
$navtext           = $fieldParams->get('navtext', '&#x27;next&#x27;,&#x27;prev&#x27;');
$dots              = $fieldParams->get('dots', true);
$autoplay          = $fieldParams->get('autoplay', false);
$hoverpause        = $fieldParams->get('hoverpause', false);
$autoplayspeed     = $fieldParams->get('autoplayspeed', false);
$responsive        = $fieldParams->get('responsive', false);
$responsiveoptions = $fieldParams->get('responsiveoptions', '');
$animatein         = $fieldParams->get('animatein', false);
$animateout        = $fieldParams->get('animateout', false);

$images = JFolder::files('images/' . $folder);

if (!empty($images))
{

	$folderpath = 'images/' . $folder . '/';

	JHtml::_('jquery.framework');
	JHtml::_('script', 'media/plg_fields_owlimg/js/owl.carousel.min.js');
	JHtml::_('stylesheet', 'media/plg_fields_owlimg/css/owl.carousel.min.css');
	JHtml::_('stylesheet', 'media/plg_fields_owlimg/css/owl.theme.default.min.css');

	if ($animatein || $animateout)
	{
		JHtml::_('stylesheet', 'media/plg_fields_owlimg/css/animate.css');
	}
?>

	<div class="owl-carousel <?php echo ($customclass) ? $customclass : ''; ?> owl-theme">
		<?php foreach ($images as $image) : ?>
			<div class="item">
				<img src="<?php echo $folderpath . $image; ?>">
			</div>
		<?php endif; ?>
	</div>

	<script>
		(function ($) {
			$('.<?php echo ($customclass) ? $customclass : ''; ?>').owlCarousel({
				<?php echo ($items) ? 'items:' . $items . ',' : ''; ?>
				<?php echo ($margin) ? 'margin:' . $margin . ',' : ''; ?>
				<?php echo ($stagepadding) ? 'stagePadding:' . $stagepadding . ',' : ''; ?>
				<?php echo ($center) ? 'center:' . $center . ',' : ''; ?>
				<?php echo ($autowidth) ? 'autoWidth:' . $autowidth . ',' : ''; ?>
				<?php echo ($loop) ? 'loop:' . $loop . ',' : ''; ?>
				<?php echo ($rewind) ? 'rewind:' . $rewind . ',' : ''; ?>
				<?php echo ($lazyload) ? 'lazyLoad:' . $lazyload . ',' : ''; ?>
				<?php echo ($mousedrag) ? 'mouseDrag:' . $mousedrag . ',' : ''; ?>
				<?php echo ($touchdrag) ? 'touchDrag:' . $touchdrag . ',' : ''; ?>
				<?php echo ($pulldrag) ? 'pullDrag:' . $pulldrag . ',' : ''; ?>
				<?php echo ($freedrag) ? 'freeDrag:' . $freedrag . ',' : ''; ?>
				<?php echo ($nav) ? 'nav:' . $nav . ',' : ''; ?>
				<?php echo ($nav && $navtext) ? 'navText:[' . $navtext . '],' : ''; ?>
				<?php echo ($dots) ? 'dots:' . $dots . ',' : ''; ?>
				<?php echo ($autoplay) ? 'autoplay:' . $autoplay . ',' : ''; ?>
				<?php echo ($autoplay && $hoverpause) ? 'autoplayHoverPause:' . $hoverpause . ',' : ''; ?>
				<?php echo ($autoplay && $autoplayspeed) ? 'autoplaySpeed:' . $autoplayspeed . ',' : ''; ?>
				<?php echo ($animatein) ? "animateIn:'" . $animatein . "'," : ""; ?>
				<?php echo ($animateout) ? "animateOut:'" . $animateout . "'," : ""; ?>
				<?php echo ($responsive) ? $responsiveoptions : ''; ?>
			});
		})(jQuery);
	</script>

	<?php
}
