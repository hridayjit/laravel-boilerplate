<?php
    namespace WhatPress;

    Class Credential{

        private $config;

        public function __construct(){
            $this->config = parse_ini_file('cred.ini');
        }

        protected function get(){
            $cred['adminusername'] = $this->config['adminusername'];
            $cred['adminpassword'] = $this->config['adminpassword'];
            $cred['apikey'] = $this->config['apikey'];
            return $cred;
        }
    }





?>