<?php
/**
 * JU 2col
 *
 * @package          Joomla.Site
 * @subpackage       JU 2col
 *
 * @author           Denys Nosov, denys@joomla-ua.org
 * @copyright        2019-2021 (C) Joomla! Ukraine, http://joomla-ua.org. All rights reserved.
 * @license          GNU General Public License version 2 or later; see _LICENSE.php
 */

use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die;

?>
<?php if($cck->countFields('header')) : ?>
	<?php echo $cck->renderPosition('header'); ?>
<?php endif; ?>

<?php if($cck->countFields('colleft') || $cck->countFields('colright')) : ?>
	<div class="uk-section-default uk-box-shadow-medium uk-padding-small uk-margin-top uk-form-stacked">
		<div class="uk-grid uk-grid-medium" data-uk-grid>
			<?php if($cck->countFields('colleft')) : ?>
				<div class="<?php echo $width_left; ?>">
					<?php echo $cck->renderPosition('colleft'); ?>
				</div>
			<?php endif; ?>
			<?php if($cck->countFields('colright')) : ?>
				<div class="<?php echo $width_right; ?>">
					<?php echo $cck->renderPosition('colright'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>

<?php if($cck->countFields('mainbody')) : ?>
	<?php echo $cck->renderPosition('mainbody'); ?>
<?php endif; ?>

<?php if($cck->countFields('footer')) : ?>
	<?php echo $cck->renderPosition('footer'); ?>
<?php endif; ?>

<?php
for($i = 1; $i <= 5; $i++)
{
	$suffix = ($i == 1) ? '' : $i;

	if($cck->countFields('modal' . $suffix))
	{
		HTMLHelper::_('bootstrap.modal', 'collapseModal' . $suffix);

		$class = $cck->getPosition('modal' . $suffix)->css;
		$class = ($class) ? ' ' . $class : '';
		?>
		<div class="modal hide fade<?php echo $class; ?>" id="collapseModal<?php echo $suffix; ?>">
			<?php echo $cck->renderPosition('modal' . $suffix); ?>
		</div>
		<?php
	}
}
?>

<?php if($cck->countFields('hidden') && ($buffer = $cck->renderPosition('hidden'))): ?>
	<div style="display: none;">
		<?php echo $buffer; ?>
	</div>
<?php endif; ?>
