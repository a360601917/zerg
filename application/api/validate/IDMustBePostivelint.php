<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\api\validate;

/**
 * Description of IDMustBePostivelint
 *
 * @author 36060
 */

class IDMustBePostivelint extends BaseValidate{
  //put your code here
  protected $rule=[
      'id'=>'require|isPostiveInterger'
  ];
  protected function isPostiveInterger($value,$rule,$data='',$field=''){
       //is_numeric($value) && is_int($value+0) && ($value+0)>0     
    if(preg_match('#^[1-9]\d?$#', $value)){
      return TRUE;
    }else{
      return FALSE;
    }
  }
}
