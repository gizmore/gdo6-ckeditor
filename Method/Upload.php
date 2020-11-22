<?php
namespace GDO\CKEditor\Method;

use GDO\Core\Method;
use GDO\Core\Website;
use GDO\File\GDT_File;
use GDO\File\GDO_File;
use GDO\Core\GDT_Response;
use GDO\CKEditor\GDO_CKFile;

final class Upload extends Method
{
    public function execute()
    {
        $file = GDO_File::fromForm($_FILES['upload']);
        $gdt = GDT_File::make('upload');
        if (!$gdt->validate($file))
        {
            return GDT_Response::makeWith($gdt);
        }
        
        $ckfile = GDO_CKFile::blank([
            'ckf_file' => $file->getID(),
        ])->insert();
        
        $json = [ 'url' => $ckfile->getHREF() ];
        Website::renderJSON($json);
    }

    
}