<?php
    namespace Core;

    class BaseController
    {
        public function __construct() {
            session_start();
        }
    }