<?php
    namespace Core;

    class Exception
    {
        private $errorCode;
        private $errorMessage;

        public function __construct($errorMessage, $errorCode) {
            $this->errorCode = $errorCode;
            $this->errorMessage = $errorMessage;
            view('error', [
                'errorMessage' => \DEBUG ? $this->errorMessage : 'The system is under maintenance, please visit later!',
                'errorCode' => $this->errorCode
            ], true);
        }
    }