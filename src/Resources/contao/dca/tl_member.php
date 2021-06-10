<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_member']['fields']['admin_id'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_member']['admin_id'], 
    'inputType' => 'text', 
    'search'    => true,
    'eval'      => array('tl_class' => 'w50 admin_id'),
    'sql'       => "char(11) NOT NULL default ''" 
];

PaletteManipulator::create()
    ->addField('admin_id', 'personal_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_member') 
;

$GLOBALS['TL_DCA']['tl_member']['fields']['admin_id']['save_callback'][] =
function($varValue, DataContainer $dc) {
    if (empty($varValue)) {
        $this->import('BackendUser', 'User');
        return 'userid_' . $this->User->id;
    } else {
        return $varValue;
    }
};
