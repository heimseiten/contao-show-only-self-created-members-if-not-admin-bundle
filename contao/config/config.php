<?php

use Contao\BackendUser;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')
    ->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))
) {
    $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaoshowonlyselfcreatedmembersifnotadmin/show-only-self-created-members-if-not-admin.css|static';
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/heimseitencontaoshowonlyselfcreatedmembersifnotadmin/show-only-self-created-members-if-not-admin.js';

    $objUser = BackendUser::getInstance();
    if ($objUser->id) {
        // Inject the marker via TL_MOOTOOLS (rendered just before </body>) instead of
        // echoing it here: echoing during framework initialization writes output before
        // <!DOCTYPE>, which on Apache/FPM sends the body early ("headers already sent"),
        // so Contao can no longer set the CSRF token cookie → "Ungültiges Anfrage-Token"
        // on every backend save. The data-div ends up in the same place for the JS to read.
        $GLOBALS['TL_MOOTOOLS'][] = '<div class="user_id" data-userid="' . $objUser->id . '" data-useradmin="isadmin' . $objUser->admin . '"></div>';
    }
}
