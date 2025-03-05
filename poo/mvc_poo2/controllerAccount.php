<?php
class ControllerAccount extends controllerGeneric {
    private ?ViewAccount $viewAccount;

    public function __construct(?ViewAccount $viewAccount) {   
        $this->viewAccount = $viewAccount;
        $this->setViewHeader(new ViewHeader);
        $this->setViewFooter(new ViewFooter);
    }

    public function getViewAccount(): ?ViewAccount {
        return $this->viewAccount;
    }
    public function setViewAccount(?ViewAccount $viewAccount) {
        $this->viewAccount = $viewAccount;
        $this->setViewHeader(new ViewHeader);
    }


    public function render():void{

        echo $this->getViewHeader()->displayView();
        echo $this->getViewAccount()->displayView();
        echo $this->getViewFooter()->displayView();
    }

    
}
    $account=new ControllerAccount(new ViewAccount());
    $account->render();
?>