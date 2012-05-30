<?php
namespace Matubaum\GenerateTemplateHelpersBundle;

class Handler implements \ArrayAccess{

    private $offsets = array();
    private $charset;
    
    private $twig;

    function __construct($dir, $twig){
        $this->twig = $twig;
        
        // Truly Nasty, but i didn't figured out another way to add a global
        $refl = new \ReflectionObject($this->twig);
        $prop = $refl->getProperty('environment');
        $prop->setAccessible(true);
        $environment = $prop->getValue($this->twig);
        
        $environment->addGlobal("sc", $this);
        
        //incluye absolutamente todos los archivos que estan en $dir
        $path = array($dir);

        while (count($path) != 0) {
            $v = array_shift($path);
            foreach (glob($v) as $item) {
                if (is_dir($item))
                    $path[] = $item . '/*';
                elseif (is_file($item) && strrpos($item, ".php")) {
                  require_once $item;
                }
            }
        }  
    }
    
    function setCharset($x){
            $this->charset = $x;
    }
    

    function get($class){
         return new Wrapper(new $class($this->twig), $this, 'get');
    }

    function render($class){
         return new Wrapper(new $class($this->twig), $this, 'print');
    }
    
    /**
     * se usa en twig para poder hacer los includes:
     * sc.Layout.menu()
     * 
     * @param type $method
     * @param type $arguments
     * @return \Wrapper
     * @throws \Exception 
     */
    function __call($method, $arguments){
        if(class_exists($method)){
         return new Wrapper(new $method($this->twig), $this, 'get');
        }
        throw new \Exception("El metodo $method no existe");
    }
    
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->offsets[] = $value;
        } else {
            $this->offsets[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->offsets[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->offsets[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->offsets[$offset]) ? $this->offsets[$offset] : null;
    }

    public function set($variable, $value){
        $this->offsetSet($variabe, $value);
        return $this;
    }

     public function __set($name, $value) {
        $this->daoffsetsta[$name] = $value;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->offsets)) {
            return $this->offsets[$name];
        }
    }

    public function __isset($name) {
        return isset($this->offsets[$name]);
    }

    public function __unset($name) {
        unset($this->offsets[$name]);
    }
}