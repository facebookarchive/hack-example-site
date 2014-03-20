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

require_once "UserID.php";
require_once "UsingUserID.php";

function user_id_main(): string {
  $ret = get_user_string(assert_user_id(123));
  $ret .= get_cow_string(assert_cow_id(222));
  return $ret;
}
