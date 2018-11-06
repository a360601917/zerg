<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\api\validate;

use think\Validate;
use think\facade\Request;

/**
 * Description of BaseValidate
 *
 * @author 36060
 */
class BaseValidate extends Validate {

  //put your code here
  public function goCheck() {
    //$request = Request::instance();
    //$params = $request->param();
    $params = Request::param();
    $result = $this->check($params);
    if (!$result) {
      $error = $this->error;
      throw new \Exception($error);
    } else {
      return true;
    }
  }

}
