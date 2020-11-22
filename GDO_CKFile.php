<?php
namespace GDO\CKEditor;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\File\GDT_File;
use GDO\File\GDO_File;

final class GDO_CKFile extends GDO
{
    public function gdoColumns()
    {
        return [
            GDT_AutoInc::make('ckf_id'),
            GDT_File::make('ckf_file'),
        ];
    }
    
    /**
     * @return GDO_File
     */
    public function getFile() { return $this->getValue('ckf_file'); }
    public function getFileID() { return $this->getVar('ckf_file'); }
    
    public function getHREF()
    {
        return href('CKEditor', 'Download', "&ckf_id={$this->getID()}");
    }
    
}
