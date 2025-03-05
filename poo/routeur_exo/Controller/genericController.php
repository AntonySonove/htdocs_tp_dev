<?php
class GenericController{
    private ?ViewHeader $header;
    private ?ViewFooter $footer;

    //CONSTRUCTEUR
    public function __construct(){
        $this->header = new ViewHeader();
        $this->footer = new ViewFooter();
    }
    
    //GETTER ET SETTER
    public function getHeader(): ?ViewHeader { return $this->header; }
    public function setHeader(?ViewHeader $header): self { $this->header = $header; return $this; }

    public function getFooter(): ?ViewFooter { return $this->footer; }
    public function setFooter(?ViewFooter $footer): self { $this->footer = $footer; return $this; }
}