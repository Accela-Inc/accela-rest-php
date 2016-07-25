<?php

// Simple bootstrap file.

function __autoload($class_name) {
    include 'accela/' . $class_name . '.php';
}
