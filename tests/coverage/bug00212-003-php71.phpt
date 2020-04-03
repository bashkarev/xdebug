--TEST--
Test for bug #212: coverage coverage inaccurate (3) (< PHP 7.4)
--SKIPIF--
<?php
require __DIR__ . '/../utils.inc';
check_reqs('PHP < 7.4');
?>
--INI--
xdebug.default_enable=1
xdebug.auto_trace=0
xdebug.trace_options=0
xdebug.collect_params=1
xdebug.collect_return=0
xdebug.auto_profile=0
xdebug.profiler_enable=0
xdebug.dump_globals=0
xdebug.show_mem_delta=0
xdebug.trace_format=0
xdebug.overload_var_dump=0
xdebug.coverage_enable=1
--FILE--
<?php
	xdebug_start_code_coverage( XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE );
	$file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug00212-003.inc';
	include $file;
	$cc = xdebug_get_code_coverage();
	xdebug_stop_code_coverage();
	var_dump($cc[$file]);
?>
--EXPECT--
Hello World
array(3) {
  [5]=>
  int(1)
  [10]=>
  int(1)
  [12]=>
  int(1)
}
