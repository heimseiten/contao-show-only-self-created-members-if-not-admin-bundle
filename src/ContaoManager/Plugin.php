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

namespace Heimseiten\ContaoShowOnlySelfCreatedMembersIfNotAdminBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

/**
 * Class Plugin
 */
class Plugin implements BundlePluginInterface
{
    /**
     * @return array
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create('Heimseiten\ContaoShowOnlySelfCreatedMembersIfNotAdminBundle\HeimseitenContaoShowOnlySelfCreatedMembersIfNotAdminBundle')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle']),
        ];
    }
}
