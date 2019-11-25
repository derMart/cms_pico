<?php
/**
 * CMS Pico - Create websites using Pico CMS for Nextcloud.
 *
 * @copyright Copyright (c) 2017, Maxence Lange (<maxence@artificial-owl.com>)
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

declare(strict_types=1);

namespace OCA\CMSPico\Settings;

use OCA\CMSPico\AppInfo\Application;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\Settings\IIconSection;

class PersonalSection implements IIconSection
{
	/** @var IL10N */
	private $l10n;

	/** @var IURLGenerator */
	private $urlGenerator;

	/**
	 * PersonalSection constructor.
	 *
	 * @param IL10N         $l10n
	 * @param IURLGenerator $urlGenerator
	 */
	public function __construct(IL10N $l10n, IURLGenerator $urlGenerator)
	{
		$this->l10n = $l10n;
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getID(): string
	{
		return Application::APP_NAME;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName(): string
	{
		return $this->l10n->t('Pico CMS');
	}

	/**
	 * {@inheritdoc}
	 */
	public function getPriority(): int
	{
		return 75;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getIcon(): string
	{
		return $this->urlGenerator->imagePath(Application::APP_NAME, 'pico_cms.svg');
	}
}
