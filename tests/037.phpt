--TEST--
FFI 037: Type memory management
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
function foo($ptr) {
	$buf = FFI::new("int*[1]");
	$buf[0] = $ptr;
	//...
	return $buf[0];
}

$int = FFI::new("int");
$int = 42;
var_dump(foo(FFI::addr($int)));
?>
--EXPECTF--
object(FFI\CData:int32_t*)#%d (1) {
  [0]=>
  int(42)
}
