<?
namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class CustomLogger extends Logger
{
    public function __construct($name)
    {
        parent::__construct($name);

        $handler = new StreamHandler(storage_path('logs/custom.log'), Logger::DEBUG);
        $this->pushHandler($handler);
    }
}

?>