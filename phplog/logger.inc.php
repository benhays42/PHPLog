<?php
// PHP Simple Logger By Ben Hays

//Set Log Level Constants
    // EMERGENCY = 0
    // ALERT     = 1
    // CRITICAL  = 2
    // ERROR     = 3
    // WARNING   = 4
    // NOTICE    = 5
    // INFO      = 6
    // DEBUG     = 7
    
    define("PHPLOG_EMERG", 0);
    define("PHPLOG_ALERT", 1);
    define("PHPLOG_CRIT", 2);
    define("PHPLOG_ERR", 3);
    define("PHPLOG_WARN", 4);
    define("PHPLOG_NOTIC", 5);
    define("PHPLOG_INFO", 6);
    define("PHPLOG_DEBUG", 7);

// Set Log Type Constants
    // LOG_TYPE_FILE = 0
    // LOG_TYPE_DB = 1
    // LOG_TYPE_EMAIL = 2
    // LOG_TYPE_CONSOLE = 3
    // LOG_TYPE_NONE = 4
    
    define("PHPLOG_TYPE_FILE", 0);
    define("PHPLOG_TYPE_DB", 1);
    define("PHPLOG_TYPE_EMAIL", 2);
    define("PHPLOG_TYPE_CONSOLE", 3);
    define("PHPLOG_TYPE_NONE", 4);

    
// Main Logger Class
// This class is used to log messages to a file.
// It can be used to log messages to a file, to the screen, or both.
// TODO: Add ability to log to a database.
// TODO: Add ability to log to a web service.
// TODO: Add ability to log to an email address.
class Logger {
    
    public $log_file;
    public $log_level;
    public $log_type;


    public function __construct($log_file, $log_level, $log_type) {
        $this->log_file = $log_file;
        $this->log_level = $log_level;
        $this->log_type = $log_type;
    }
    
    public function log_to_file($message, $level) {
        if ($level <= $this->log_level) {
            $log_message = date("Y-m-d H:i:s") . " - " . $message . "\n";
            file_put_contents($this->log_file, $log_message, FILE_APPEND);
        }
    }

    public function log_to_console($message, $level) {
        if ($level <= $this->log_level) {
            echo $message . "\n";
        }
    }

    public function log_to_db($message, $level) {
        if ($level <= $this->log_level) {
            
        }
    }

    public function log_to_email($message, $level) {
        if ($level <= $this->log_level) {

        }
    }


    // Should be called with the log level and message 
    // Level defaults as PHPLOG_INFO
    public function log($message, $level=PHPLOG_INFO) {
        if ($level <= $this->log_level) {

            switch ($this->log_type) {
                case PHPLOG_TYPE_FILE:
                    $this->log_to_file($message, $level);
                    break;
                case PHPLOG_TYPE_DB:
                    $this->log_to_db($message, $level);
                    break;
                case PHPLOG_TYPE_EMAIL:
                    $this->log_to_email($message, $level);
                    break;
                case PHPLOG_TYPE_CONSOLE:
                    $this->log_to_console($message, $level);
                    break;
                case PHPLOG_TYPE_NONE:
                    break;
                default:
                    break;
            }
        }
    }
}    
    
?>
