<?php
/**
 * CMS Pico - Create websites using Pico CMS for Nextcloud.
 *
 * @copyright Copyright (c) 2019, Daniel Rudolf (<picocms.org@daniel-rudolf.de>)
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/** @var $_ array */
/** @var $l \OCP\IL10N */
/** @var $theme OCP\Defaults */

?>

<div class="body-login-container update">
	<div class="icon-big icon-attention-circled icon-white"></div>
	<h2><?php p($l->t('Internal Server Error')); ?></h2>
	<p class="infogroup"><?php p($_['message'] ?? ''); ?></p>
	<p><a class="button primary" href="<?php p(\OC::$server->getURLGenerator()->linkTo('', 'index.php')); ?>">
		<?php p($l->t('Back to %s', [ $theme->getName() ])); ?>
	</a></p>
</div>
