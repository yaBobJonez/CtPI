<?php
namespace app\forms;

use std, gui, framework, app;


class MoreForm extends AbstractForm
{

    /**
     * @event back.action 
     */
    function doBackAction(UXEvent $e = null)
    {    
        $this->loadForm("MainForm", true, true);
    }

    /**
     * @event link.action 
     */
    function doLinkAction(UXEvent $e = null)
    {    
        browse("https://linktr.ee/yaBobJonez");
    }


    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        $this->ctpnconfig->items->clear();
        foreach ($GLOBALS['rl'] as $key => $value) { $this->ctpnconfig->items->add('"'.$key.'" | '.$value); }
    }



}
