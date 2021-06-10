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

if (TL_MODE == 'BE') {
    $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaoshowonlyselfcreatedmembersifnotadmin/show-only-self-created-members-if-not-admin.css|static';
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/heimseitencontaoshowonlyselfcreatedmembersifnotadmin/show-only-self-created-members-if-not-admin.js';

    $objUser = BackendUser::getInstance();
    $objUser->authenticate();
    echo '<div class="admin_id" data-userid="' . $objUser->id . '" data-useradmin="isadmin' . $objUser->admin . '"></div>';
}
