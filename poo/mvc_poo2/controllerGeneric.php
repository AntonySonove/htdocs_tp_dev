<?php
class controllerGeneric{
    private ViewHeader $header;
    private ViewFooter $footer;

    // public function __construct(ViewHeader $header, ViewFooter $footer){
    //     $this->header = $header;
    //     $this->footer = $footer;
    // }

    
    public function getViewHeader():?ViewHeader{
        return $this->header;
    }
    public function getViewFooter():?viewFooter{
        return $this->footer;
    }
    public function setViewHeader(ViewHeader $header){
        $this->header = $header;
        return $this;
    }
    public function setViewFooter(ViewFooter $footer){
        $this->footer = $footer;
        return $this;
    }
}
?>