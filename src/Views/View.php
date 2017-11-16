<?php
namespace Views;

abstract class View {
    //załadowanie modelu
    public function getModel($name){
        $name = 'Models\\'.$name;
        return new $name();
    }

    //za�adowanie i zrenderowanie szablonu
    public function render($name) {
        $path='templates'.DIRECTORY_SEPARATOR;
        $path.=$name.'.html.php';
        try {
            if(is_file($path)) {
                require($path);
            } else {
                throw new \Exception('Nie można załączyć szablonu '.$name.' z: '.$path);
            }
        }
        catch(\Exception $e) {
            echo $e->getMessage().'<br />
					Plik: '.$e->getFile().'<br />
					Linia: '.$e->getLine().'<br />
					Blad: '.$e->getTraceAsString();
            exit;
        }
    }
    public function set($name, $value) {
        $this->$name=$value;
    }
    public function get($name) {
        if(isset($this->$name))
            return $this->$name;
    }
}


