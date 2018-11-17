<?php

namespace app\lib\exception;

use think\Exception;
use think\exception\Handle;

class ExceptionHandler extends Handle{
  
  private $code;
  private $msg;
  private $errorCode;
  
  public function render(\Exception $e) {
    if($e instanceof BaseException){
      $this->code=$e->code;
      $this->msg=$e->msg;
      $this->errorCode=$e->errorCode;
    }else{
      $this->code=500;
      $this->msg='服务器内部错误';
      $this->errorCode=999;
      $this->recordErrorLog($e);
    }
    $request= \think\facade\Request::instance();
    $result=[
        'msg'=> $this->msg,
        'error_code'=> $this->errorCode,
        'request_url'=>$request->url()
    ];
    return json($result, $this->code);
  }
  
  private function recordErrorLog(Exception $e){
    \think\facade\Log::init([
    'type'        => 'File',
    // 日志保存目录
    'path'        => '',
    // 日志记录级别
    'level'       => ['error'],
    // 单文件日志写入
    'single'      => false,
    // 独立日志级别
    'apart_level' => [],
    // 最大日志文件数量
    'max_files'   => 0,
    // 是否关闭日志写入
    'close'       => false,
    ]);
    \think\facade\Log::record($e->getMessage(),'error');
    //\think\facade\Log::record('wwwwwwwwwwwwwwwwwwwwwwwwww','error');
  }
}
