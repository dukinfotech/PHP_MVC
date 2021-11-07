<?php
    namespace Core;

    class Exception
    {
        private $errorCode;
        private $errorMessage;

        public function __construct($errorMessage, $errorCode) {
            $this->errorCode = $errorCode;
            $this->errorMessage = $errorMessage;
            die($errorMessage);
        }
    }