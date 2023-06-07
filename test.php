<?php
function sayHiMethod($args) {
    return function() use ($args) {
        echo "Hello world!";
    };
}

class MyClass {
    public $greeter = sayHiMethod("");
}


?>