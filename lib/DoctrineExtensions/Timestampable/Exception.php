<?php

namespace DoctrineExtensions\Timestampable;

/**
 * The exception list for Timestampable behavior
 * 
 * @author Gediminas Morkevicius <gediminas.morkevicius@gmail.com>
 * @package DoctrineExtensions.Timestampable
 * @subpackage Exception
 * @link http://www.gediminasm.org
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Exception extends \Exception
{    
    static public function notValidFieldType($field, $class)
    {
        return new self("Timestampable field - [{$field}] type is not valid date or time field in class - {$class}");
    }
}