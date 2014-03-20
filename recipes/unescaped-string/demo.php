<?hh
/**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 */

require_once "UnescapedString.php";
require_once "MySecureRequest.php";

function escape_and_print(UNESCAPED_STRING $s): string {
  return escape_unescaped_string($s);
}

function unescaped_string_main(): string {
  $GET_params = Map::fromArray($_GET);
  $str = (new MySecureRequest($GET_params))->stringParam('myStrParam');
  return escape_and_print($str);
}
