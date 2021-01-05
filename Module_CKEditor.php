<?php
namespace GDO\CKEditor;

use GDO\Core\GDO_Module;
use GDO\Language\GDO_Language;

final class Module_CKEditor extends GDO_Module
{
    public function getDependencies() { return ['JQuery']; }
    
    public function thirdPartyFolders() { return ['/ckeditor5/']; }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/ckeditor'); }
    
    public function getClasses()
    {
        return [
            GDO_CKFile::class,
        ];
    }
    
    public function onIncludeScripts()
    {
        $this->addJavascript('ckeditor5/ckeditor.js');
        $iso = strtolower(GDO_Language::current()->getISO());
        if ($iso != 'en')
        {
            $this->addJavascript('ckeditor5/translations/'.$iso.'.js');
        }
        
        $this->addJavascript('js/gdo6-ckeditor.js');
    }
    
}
