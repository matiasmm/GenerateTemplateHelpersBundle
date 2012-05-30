<?php
namespace Matubaum\GenerateTemplateHelpersBundle;

class Wrapper {
    
    protected $o, $handler, $mode;
    
    function __construct($o, $handler, $mode){
        $this->o = $o;
        $this->handler = $handler;
        $this->mode = $mode;
    }
    
    function __call($method, $args){
        $resp = call_user_func_array(array($this->o, $method), $args);
        if('print' == $this->mode){
            print  $resp;
            return $this->handler;
        }else{
            return $resp;
        }
    }
}