<?php

/*
 * This file is part of show-only-self-created-members-if-not-admin.
 * 
 * (c) heimseiten.de - Webdesign aus Köln 2021 <info@heimseiten.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/heimseiten/contao-show-only-self-created-members-if-not-admin-bundle
 */
declare(strict_types=1);

namespace Heimseiten\ContaoShowOnlySelfCreatedMembersIfNotAdminBundle\Tests\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\DelegatingParser;
use Contao\TestCase\ContaoTestCase;
use Heimseiten\ContaoShowOnlySelfCreatedMembersIfNotAdminBundle\ContaoManager\Plugin;
use Heimseiten\ContaoShowOnlySelfCreatedMembersIfNotAdminBundle\HeimseitenContaoShowOnlySelfCreatedMembersIfNotAdminBundle;

/**
 * Class PluginTest
 *
 * @package Heimseiten\ContaoShowOnlySelfCreatedMembersIfNotAdminBundle\Tests\ContaoManager
 */
class PluginTest extends ContaoTestCase
{
    /**
     * Test Contao manager plugin class instantiation
     */
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(Plugin::class, new Plugin());
    }

    /**
     * Test returns the bundles
     */
    public function testGetBundles(): void
    {
        $plugin = new Plugin();

        /** @var array $bundles */
        $bundles = $plugin->getBundles(new DelegatingParser());

        $this->assertCount(1, $bundles);
        $this->assertInstanceOf(BundleConfig::class, $bundles[0]);
        $this->assertSame(HeimseitenContaoShowOnlySelfCreatedMembersIfNotAdminBundle::class, $bundles[0]->getName());
        $this->assertSame([ContaoCoreBundle::class], $bundles[0]->getLoadAfter());
    }

}
