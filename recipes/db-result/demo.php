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

require_once "FakeDB.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/core/funs/init.php';

function db_result_main(): string {
  $ret = '';
  foreach ((new FakeDB())->getDBResults() as $result) {
    $ret .= sprintf(
      "id => %u, name => %s, extra => array('age' => %u)\n",
      $result['id'],
      $result['name'],
      $result['extra']['age'],
    );
  }
  return $ret;
}
