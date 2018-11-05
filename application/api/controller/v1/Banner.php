<?php
namespace app\api\controller\v1;

use app\api\validate\IDMustBePostivelint;

class Banner {
  //put your code here
  public function getBanner($id){
    $data=[
        'id'=>$id,
    ];
    $validate=new IDMustBePostivelint();
    $a=$validate->batch()->check($data);
    dump($a);
  }
}
