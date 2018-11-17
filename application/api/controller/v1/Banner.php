<?php
namespace app\api\controller\v1;

use app\api\validate\IDMustBePostivelint;
use app\api\model\Banner as BannerModel;
use think\Exception;

class Banner {
  //put your code here
  public function getBanner($id){

    (new IDMustBePostivelint())->goCheck();
    $banner= BannerModel::getBannerById($id);
    if(!$banner){
      throw new Exception('wwwwwwwwwww');
      throw new \app\lib\exception\BannerMissException();
    }
    return $banner;
  }
}
