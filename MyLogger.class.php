<?php  
/**
 * 
 */
class MyLogger
{
    public $origin;
    public function __construct($name)
    {
        if ($name === '') {
            throw new Exception("origin is empty");
        } else {
            $this->origin = $name;
        }
    }
    public function log($message, $level)
    {
        $this->logWithTime($level . ": " . $message);
    }
    public function warning($message)
    {
        $this->log($message, "WARNING");
    }
    public function error($message)
    {
        $this->log($message, "ERROR");
    }
    public function info($message)
    {
        $this->log($message, "INFO");
    }
    public function debug($message)
    {
        $this->log($message, "DEBUG");
    }
    private function logWithTime($message)
    {
        date_default_timezone_set('Europe/Amsterdam');
        echo Date("Y-m-d H:i:s") . " " . $this->origin . " - " . $message . PHP_EOL;
    }
}
try {
    $logger = new MyLogger('Admin');
    $logger->error("dit is een error");
}
catch(Exception $e){
    echo "Error: " . $e->getMessage();
}
catch(ArgumentCountError $e){
    echo "Error: " . $e->getMessage();
}
?>