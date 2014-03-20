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

require_once "NonStrictFile.php";
require_once "StrictFile.php";

function get_and_post_main(): string {
  if (isGET()) {
    return sprintf(
      "GET param: %d",
      (new MyGETRequest())->intParamX('myIntParam'),
    );
  } else {
    $request = new MyPOSTRequest();
    return sprintf(
      "POST param: %d",
      (new MyPOSTRequest())->intParamX('myIntParam'),
    );
  }
}
