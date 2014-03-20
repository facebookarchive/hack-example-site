<?hh // strict
/**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 */

require_once "Assert.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/core/funs/init.php';

function get_assert_demo_data(): array<string, mixed> {
  return array(
    'int' => 123456789,
    'float' => 3.14,
    'string' => 'I am a string',
    'good_array' => array(3.1, 4.1, 5.9),
    'bad_array' => array(1.2, 'duck', 3.4),
  );
}

function add_array_of_floats(array<float> $arr): float {
  $ret = 0.0;
  foreach ($arr as $f) {
    $ret += $f;
  }
  return $ret;
}

function assert_main(): string {
  $data = get_assert_demo_data();
  $ret = sprintf("int is %u\n", Assert::isInt($data['int']));
  $ret .= sprintf("int is %g\n", Assert::isFloat($data['float']));
  $ret .= "string is ".Assert::isString($data['string'])."\n";

  Assert::isNum($data['int']);
  Assert::isNum($data['float']);
  try {
    Assert::isNum($data['string']);
  } catch (AssertException $e) {
    $ret .= '"'.Assert::isString($data['string'])."\" is not a num\n";
  }

  $ret .= sprintf(
    "Sum of floats is %g\n",
    add_array_of_floats(
      Assert::isArrayOf(class_meth('Assert', 'isFloat'), $data['good_array']),
    ),
  );
  try {
    Assert::isArrayOf(class_meth('Assert', 'isFloat'), $data['bad_array']);
  } catch (AssertException $e) {
    $ret .= 'Bad array failed assertion: '.$e->getMessage()."\n";
  }
  return $ret;
}
