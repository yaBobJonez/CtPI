<?php
namespace app\forms;

use facade\Json;
use std, gui, framework, app;
use php\gui\paint\UXColor;

class MainForm extends AbstractForm
{

    /**
     * @event generate.action 
     */
    function doGenerateAction(UXEvent $e = null)
    {    
        $x = 0.5; $y = 0.5;
        $this->canvas->gc()->clearRect($x, $y, $this->canvas->width, $this->canvas->height);
        $this->canvas->gc()->moveTo($x, $y);
        $this->canvas->gc()->lineWidth = 1;
        $text = str_split($this->text->text);
        $pxspace = $this->form("MoreForm")->pxspacing->value;
        $maxx = 448; $maxy = 328;
        foreach ($text as $curchar) {
            $this->canvas->gc()->beginPath();
            $this->canvas->gc()->moveTo($x, $y);
            if (is_numeric($curchar)) { $curchar = "n".$curchar; }
            if ($curchar == " ") { $curchar = "SPACE"; }
            if ($curchar == "\n") { $curchar = "NEWLINE"; }
            $this->canvas->gc()->strokeColor = UXColor::of($GLOBALS['rl'][$curchar]);
            if ($x < $maxx) {
                $this->canvas->gc()->lineTo($x, $y);
                $x = $x + $pxspace;
            } else {
                $x = 0; $y = $y + $pxspace;
                $this->canvas->gc()->moveTo($x, $y);
                $this->canvas->gc()->lineTo($x, $y);
                $x = $x + $pxspace;
            }
            $this->canvas->gc()->stroke();
        }
    }

    /**
     * @event save.action 
     */
    function doSaveAction(UXEvent $e = null)
    {    
        $this->canvas->save($this->saveectp->file->getAbsolutePath(), $this->form("MoreForm")->outtype->value);
    }

    /**
     * @event open.action 
     */
    function doOpenAction(UXEvent $e = null)
    {    
        $this->canvas->gc()->clearRect($x, $y, $this->canvas->width, $this->canvas->height);
        if ($this->form("MoreForm")->clearonopen->selected) { $this->text->text = ""; }
        $openedectp = UXImage::ofUrl("file:///".$this->openectp->file->getAbsolutePath());
        $this->canvas->gc()->drawImage($openedectp, 0, 0);
        for ($cy = 0; $cy < $openedectp->height; $cy++) {
            for ($cx = 0; $cx < $openedectp->width; $cx++) {
                $upx = $openedectp->getPixelColor($cx, $cy);
                $px = $upx->getWebValue();
                $key = $GLOBALS['revrl'][$px];
                if (Regex::match("^n[0-9]", $key)) { $key = substr($key, 1); }
                if ($key == "SPACE") { $key = " "; }
                if ($key == "NEWLINE") { $key = "\n"; }
                $this->text->text .= $key;
            }
        }
    }

    /**
     * @event usesrl.action 
     */
    function doUsesrlAction(UXEvent $e = null)
    {    
        $GLOBALS['rl'] = Json::fromFile("res://.data/SRL.ctpn");
        foreach ($GLOBALS['rl'] as $key => $value) { $GLOBALS['revrl'][$value] = $key; }
    }

    /**
     * @event usecustom.action 
     */
    function doUsecustomAction(UXEvent $e = null)
    {    
        $GLOBALS['rl'] = Json::fromFile("file:///".$this->openctpn->file->getAbsolutePath());
        foreach ($GLOBALS['rl'] as $key => $value) { $GLOBALS['revrl'][$value] = $key; }
    }

    /**
     * @event more.action 
     */
    function doMoreAction(UXEvent $e = null)
    {    
        $this->loadForm("MoreForm", true, true);
    }

    /**
     * @event construct 
     */
    function doConstruct(UXEvent $e = null)
    {    
        if (!isset($this->form("MoreForm")->pxspacing->value)) { $this->form("MoreForm")->pxspacing->value = 1; }
        if (!isset($this->form("MoreForm")->outtype->value)) { $this->form("MoreForm")->outtype->value = "png"; }
        $this->doUsesrlAction();
    }

    /**
     * @event clear.action 
     */
    function doClearAction(UXEvent $e = null)
    {    
        $this->text->text = "";
        $this->canvas->gc()->clearRect($x, $y, $this->canvas->width, $this->canvas->height);
    }


}
