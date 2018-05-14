<?php

function __autoload($class) {
   $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
   if (file_exists($file)) {
       require_once $file;
   } else {
       throw new \App\PageNFException();
   }
}
