--TEST--
Closure inside method returned null, expected array
--FILE--
<?php
class foo {
    public function bar() : callable {
        $test = "one";
        return function() use($test) : array {
            return null;
        };
    }
}

$baz = new foo();
var_dump($func=$baz->bar(), $func());
?>
--EXPECTF--
Fatal error: Uncaught TypeError: foo::{closure:%s:%d}(): Return value must be of type array, null returned in %s:%d
Stack trace:
#0 %s(%d): foo->{closure:%s:%d}()
#1 {main}
  thrown in %s on line %d
