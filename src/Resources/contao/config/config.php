<?php

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')
    ->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))
) {
    $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaoshowonlyselfcreatedmembersifnotadmin/show-only-self-created-members-if-not-admin.scss|static';
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/heimseitencontaoshowonlyselfcreatedmembersifnotadmin/show-only-self-created-members-if-not-admin.js';

    $objUser = BackendUser::getInstance();
    $objUser->authenticate();
    echo '<div class="user_id" data-userid="' . $objUser->id . '" data-useradmin="isadmin' . $objUser->admin . '"></div>';
}
