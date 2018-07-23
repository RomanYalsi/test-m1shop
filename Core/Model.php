<?php

namespace Project\Core;

use PDO;
use Project\App\Config\DataBase;

/**
 * @property array posts
 * @property mixed post
 * @property string successMessage
 * @property string errorMessage
 */
class Model
{

    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . DataBase::DB_HOST . ';dbname=' . DataBase::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, DataBase::DB_USER, DataBase::DB_PASSWORD);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }

    /**
     * @param $viewName
     */
    public function getView($viewName)
    {
        $this->_get($viewName, 'Views');
    }

    /**
     * @param $modelName
     */
    public function getModel($modelName)
    {
        $this->_get($modelName, 'Models');
    }

    /**
     * @param $fileName
     * @param $type
     */
    private function _get($fileName, $type)
    {
        $path = APP_PATH . $type . '/' . $fileName . '.php';
        if (is_file($path))
            require_once($path);
        else
            exit('The "' . $path . '" file doesn\'t exist');
    }

    /**
     * Переменные для вьюх
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->$key = $value;
    }

}