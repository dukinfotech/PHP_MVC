<?php
    namespace Core;

    class Exception
    {
        private $errorCode;
        private $errorMessage;

        public function __construct($errorCode, $errorMessage) {
            $this->errorCode = $errorCode;
            $this->errorMessage = $errorMessage;
            die($errorMessage);
        }
    }