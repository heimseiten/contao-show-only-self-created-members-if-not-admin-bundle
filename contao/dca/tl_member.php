<?php

use Contao\BackendUser;
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;
use Contao\Database;

$GLOBALS['TL_DCA']['tl_member']['fields']['user_id'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_member']['user_id'],
    'exclude'   => true,
    'inputType' => 'text',
    'search'    => true,
    'eval'      => array('tl_class' => 'w50 user_id'),
    'sql'       => "char(11) NOT NULL default ''"
];

PaletteManipulator::create()
    ->addField('user_id', 'personal_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_member')
;

// Set user_id SERVER-SIDE when a member record is created. In Contao 4 the (hidden) user_id
// widget was always part of the edit form, so its save_callback filled the value on first save.
// Contao 5 only renders fields to non-admins if they are allowed via the group field permissions
// (alexf) — the widget is missing from the form, the save_callback never runs and user_id stays
// empty, so the member never shows up in the editor's filtered list. The oncreate_callback runs
// independently of forms and permissions and closes that gap.
$GLOBALS['TL_DCA']['tl_member']['config']['oncreate_callback'][] =
function (string $strTable, int $insertId, array $arrRow, DataContainer $dc) {
    if (!empty($arrRow['user_id'])) {
        return; // keep an explicitly provided value (parity with the old save_callback)
    }

    $user = BackendUser::getInstance();

    if ($user->id) {
        Database::getInstance()
            ->prepare("UPDATE tl_member SET user_id = ? WHERE id = ?")
            ->execute('userid_' . $user->id, $insertId);
    }
};

// Keep the save_callback: if an admin empties the (visible) field, it heals itself on save.
$GLOBALS['TL_DCA']['tl_member']['fields']['user_id']['save_callback'][] =
function ($varValue, DataContainer $dc) {
    if (empty($varValue)) {
        $user = BackendUser::getInstance();
        return 'userid_' . $user->id;
    }

    return $varValue;
};
