<?php

declare(strict_types=1);

/*
 * This file is part of show-only-self-created-members-if-not-admin.
 * 
 * (c) heimseiten.de - Webdesign aus Köln 2021 <info@heimseiten.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/heimseiten/contao-show-only-self-created-members-if-not-admin-bundle
 */

namespace Heimseiten\ContaoShowOnlySelfCreatedMembersIfNotAdminBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class HeimseitenContaoShowOnlySelfCreatedMembersIfNotAdminBundle
 */
class HeimseitenContaoShowOnlySelfCreatedMembersIfNotAdminBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);
		
	}
}
