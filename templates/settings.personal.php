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

use OCA\CMSPico\AppInfo\Application;


script(Application::APP_NAME, 'vendor/notyf');
style(Application::APP_NAME, 'notyf');

script(
	Application::APP_NAME,
	['personal.result', 'personal.navigation', 'personal.elements', 'personal']
);
style(Application::APP_NAME, 'personal');

?>

<div class="section">
	<h2><?php p($l->t('Site Folders (Pico CMS)')) ?></h2>

	<table cellpadding="10" cellpadding="5">
		<tr>
			<td colspan="2">

				Site folders allows you to create a website as a sub-folder of the cloud.<br/>
				Using the Pico CMS, your files - in Markdown format - will be parsed and served up
				to browsers as html.<br/>

			</td>
		</tr>


		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" class="title">Your current websites</td>
		</tr>
		<tr>
			<td colspan="2">
				<table cellspacing="3" cellpadding="3" id="cms_pico_list_websites"
					   style="margin: 20px; width: 700px;">
					<tr class="header">
						<td width="30%">Name</td>
						<td width="30%">Address</td>
						<td width="30%">Local directory</td>
						<td width="10%">Private</td>
					</tr>

				</table>
			</td>
		</tr>


		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" class="title">Create a new website</td>
		</tr>
		<tr>
			<td colspan="2">
				To create a new Site Folder, you will need to specify the front URL address
				(<?php print(OC::$WEBROOT); ?>/sites/your_site_folder)
				that <br/>
				will be used to access your site and a local directory in your files where your templates
				will be stored.<br/>
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr class="lane">
			<td class="left">Name of the website:<br/>
				<em>The title of your website</em></td>
			<td class="right">
				<input id="cms_pico_new_name" class="field250" value=""
					   placeholder="My new site folder"/>
			</td>
		</tr>

		<tr class="lane">
			<td class="left">Address of the website:<br/>
				<em id="cms_pico_new_url"> </em></td>
			<td class="right">
				<input id="cms_pico_new_website" class="field250" value="" placeholder="my_site"/>
			</td>
		</tr>

		<tr class="lane">
			<td class="left">Local directory:<br/>
				<em><?php p($l->t('The place to store the website files on your cloud')); ?></em></td>
			<td class="right">
				<div style="display: inline;">
					<div style="display: inline;" id="cms_pico_new_path">/</div>
					<div style="margin-left: 50px; display: inline;">
						<input type="submit" class="field250" id="cms_pico_new_folder"
							   value="Choose a folder"/>
					</div>
				</div>
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr class="lane">
			<td colspan="2" class="center">
				<input class="field250" type="submit" id="cms_pico_new_submit"
					   value="Create a new website"/>
			</td>
		</tr>

	</table>

	<script id="tmpl_website" type="text/template">
		<tr class="entry" data-id="%%id%%" data-address="%%address%%" data-path="%%path%%"
			data-private="%%private%%">
			<td style="font-style: italic; font-weight: bold">%%name%%</td>
			<td class="link">%%address%%</td>
			<td class="path">%%path%%</td>
			<td><input type="checkbox" value="1" class="private"/></td>
		</tr>
	</script>

</div>

