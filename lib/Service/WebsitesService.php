<?php
/**
 * CMS Pico - Integration of Pico within your files to create websites.
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2017
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
 *
 */

namespace OCA\CMSPico\Service;

use OCA\CMSPico\Db\WebsitesRequest;
use OCA\CMSPico\Exceptions\WebsiteAlreadyExistException;
use OCA\CMSPico\Exceptions\WebsiteDoesNotExistException;
use OCA\CMSPico\Model\Webpage;
use OCA\CMSPico\Model\Website;
use OCP\IL10N;

class WebsitesService {

	/** @var IL10N */
	private $l10n;

	/** @var WebsitesRequest */
	private $websiteRequest;

	/** @var TemplatesService */
	private $templatesService;

	/** @var PicoService */
	private $picoService;

	/** @var MiscService */
	private $miscService;

	/**
	 * WebsitesService constructor.
	 *
	 * @param IL10N $l10n
	 * @param WebsitesRequest $websiteRequest
	 * @param TemplatesService $templatesService
	 * @param PicoService $picoService
	 * @param MiscService $miscService
	 */
	function __construct(
		IL10N $l10n, WebsitesRequest $websiteRequest, TemplatesService $templatesService,
		PicoService $picoService, MiscService $miscService
	) {
		$this->l10n = $l10n;
		$this->websiteRequest = $websiteRequest;
		$this->templatesService = $templatesService;
		$this->picoService = $picoService;
		$this->miscService = $miscService;
	}


	/**
	 * @param string $name
	 * @param string $userId
	 * @param string $site
	 * @param string $path
	 * @param int $template
	 *
	 * @throws WebsiteAlreadyExistException
	 */
	public function createWebsite($name, $userId, $site, $path, $template) {
		$this->templatesService->templateHasToExist($template);

		$website = new Website();
		$website->setName($name)
				->setUserId($userId)
				->setSite($site)
				->setPath($path)
				->setTemplateSource(TemplatesService::TEMPLATES[$template]);

		try {
			$website->hasToBeFilledWithValidEntries();
			$website = $this->websiteRequest->getWebsiteFromSite($website->getSite());
			throw new WebsiteAlreadyExistException($this->l10n->t('Website already exist.'));
		} catch (WebsiteDoesNotExistException $e) {
			// In fact we want the website to not exist (yet).
		}

		$this->templatesService->installTemplates($website);
		$this->websiteRequest->create($website);
	}


	/**
	 * @param int $siteId
	 *
	 * @return Website
	 */
	public function getWebsiteFromId($siteId) {
		return $this->websiteRequest->getWebsiteFromId($siteId);
	}


	/**
	 * @param string $website
	 */
	public function updateWebsite($website) {
		$this->websiteRequest->update($website);

	}

	/**
	 * @param string $userId
	 *
	 * @return Website[]
	 */
	public function getWebsitesFromUser($userId) {
		$websites = $this->websiteRequest->getWebsitesFromUserId($userId);

		return $websites;
	}


	/**
	 * @param string $site
	 * @param string $viewer
	 *
	 * @return string
	 */
	public function getWebpageFromSite($site, $viewer) {

		$website = $this->websiteRequest->getWebsiteFromSite($site);
		$website->setViewer($viewer);

		return $this->picoService->getContent($website);
	}


}