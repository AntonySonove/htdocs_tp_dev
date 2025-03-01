<?php
    class ControllerHome {
        private ViewHome $viewHome;
        private ModelUser $userModel;


        public function __construct(ViewHome $viewHome, ModelUser $userModel) {
            $this->viewHome = $viewHome;
            $this->userModel = $userModel;
        }


        public function getViewHome() {
            return $this->viewHome;
        }
        public function setViewHome(ViewHome $viewHome) {
            $this->viewHome = $viewHome;
            return $this;
        }

        public function getModelUser() {
            return $this->userModel;
        }
        public function setModelUser(ModelUser $userModel) {
            $this->userModel = $userModel;
            return $this;
        }


        public function signln(){
           
        }
    }
?>