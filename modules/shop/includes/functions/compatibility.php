<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: compatibility.php 1609 2005-07-19 20:57:17Z ajeh $
//
/**
 * @package ZenCart_Functions
*/

/////////////////////////////////////////
// remove in v1.3
/*
// disabled
  if (!function_exists('fmod')) {
    function fmod($zf_x, $zf_y) {
      $zp_i = floor($zf_x/$zf_y);
      return $zf_x - $zp_i/$zf_y;
    }
  }
*/
// mange for values < 1
  if (!function_exists('fmod')) {
    function fmod($x2, $y2) {
      $i2 = fmod($x2*1000,$y2*1000);
      return $i2;
    }
  }
/////////////////////////////////////////


// The following is not tested extensively, but should work in theory:
/*  if (!function_exists('file_get_contents')) {
    function file_get_contents($zf_file) {
      $za_file=file($zf_file);
      foreach ($za_file as $line) {
        $zp_return .= $line;
      }
      return $zp_return;
    }
  }
*/

?>