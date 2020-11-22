<?php
namespace GDO\CKEditor\Method;

use GDO\Core\Method;
use GDO\File\Method\GetFile;
use GDO\CKEditor\GDO_CKFile;
use GDO\Util\Common;

final class Download extends Method
{
    public function execute()
    {
        if ($ckfile = GDO_CKFile::findById(Common::getRequest('ckf_id')));
        {
            $_REQUEST['file'] = $ckfile->getFileID();
            return GetFile::make()->execute();
        }
    }

}
