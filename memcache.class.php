<?php
    /**
    * Created by PhpStorm.
    * User: Administrator
    * Date: 2017/12/13
    * Time: 20:56
    * Msg: memcache 类的封装
    */

    class Mem
    {
        private $type="Memcache";// Memcache 或者 Memcached
        private $m;
        private $time=0;
        private $error;
        public function __construct(){
            if(!class_exists($this->type)){
                $this->error="No ".$this->type;
                return false;
            }else{
                $this->m=new $this->type;
            }
        }
        // 添加一个Memcache服务器
        public function addServer($url,$fracture){
            $this->m->addServer($url,$fracture);
        }
        // 判断当前为什么操作 1get 2delete 3set
        public function S($key,$values='',$flags,$time=NULL){
            $number = func_num_args();// 判断传入值的个数
            if( $number == 1 ){
                return $this->get($key);
            }elseif ( $number >= 2 ){
                if( $values === NULL ){
                    $this->delete($key);
                }else{
                    $this->set($key,$values,$flags,$time);
                }
            }
        }
        // 返回错误信息 Memcached
        public function getError(){
            if( $this->error ){
                return $this->error;
            }else{
                return $this->m->getResultMessage();
            }
        }
        // 创建或者替换一个key
        public function set($key,$values,$flags,$time=NULL){
            if( $time === NULL ){
                $time = $this->time;
            }
            $this->m->set($key,$values,$flags,$time);
            // if( $this->m->getResultCode() != 0 ){
            //    return false;
            // }
        }
        // 获取一个key的值
        public function get($key){
            return $this->m->get($key);
            //if( $this->m->getResultCode() != 0 ){
            //    return false;
            // }
        }
        // 删除一个key的值
        public function delete($key){
            return $this->m->delete($key);
            //if( $this->m->getResultCode() != 0 ){
            //    return false;
            // }
        }
        // 对一个key进行加法操作
        public function increment($key,$num){
            if( isset($key) && $num ){
                return $this->m->increment($key, $num);
            }else{
                return false;
            }
            //if( $this->m->getResultCode() != 0 ){
            //    return false;
            // }
        }
        // 对一个key进行减法操作
        public function decrement($key,$num){
            if( isset($key) && $num ){
                return $this->m->decrement($key, $num);
            }else{
                return false;
            }
            //if( $this->m->getResultCode() != 0 ){
            //    return false;
            // }
        }
    }







