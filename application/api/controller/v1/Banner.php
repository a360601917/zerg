<?php
namespace app\api\controller\v1;

use app\api\validate\IDMustBePostivelint;

class Banner {
  //put your code here
  public function getBanner($id){

    (new IDMustBePostivelint())->goCheck();
    $a=$validate->goch;
    dump($a);
  }
}
