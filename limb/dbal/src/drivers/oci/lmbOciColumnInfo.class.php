<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com 
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html 
 */
lmb_require('limb/dbal/src/drivers/lmbDbColumnInfo.class.php');
lmb_require(dirname(__FILE__) . '/lmbOciTypeInfo.class.php');

/**
 * class lmbOciColumnInfo.
 *
 * @package dbal
 * @version $Id: lmbOciColumnInfo.class.php,v 1.1 2009/06/16 13:23:48 mike Exp $
 */
class lmbOciColumnInfo extends lmbDbColumnInfo
{
  protected $nativeType;
  protected $isAutoIncrement;
  protected $isExisting = false;

  function __construct(
                $table,
                $name,
                $nativeType = null,
                $size = null,
                $scale = null,
                $isNullable = null,
                $default = null,
                $isAutoIncrement = null,
                $isExisting = false)
  {

    $this->nativeType = $this->canonicalizeNativeType($nativeType);
    $this->isAutoIncrement = $this->canonicalizeIsAutoincrement($isAutoIncrement);

    $typeinfo = new lmbOciTypeInfo();
    $typemap = $typeinfo->getNativeToColumnTypeMapping();
    $type = $typemap[$nativeType];

    $this->isExisting = $isExisting;

    parent::__construct($table, $name, $type, $size, $scale, $isNullable, $default);
  }

  function getNativeType()
  {
    return $this->nativeType;
  }

  function canonicalizeNativeType($nativeType)
  {
    return $nativeType;
  }

  function isAutoIncrement()
  {
    return $this->isAutoIncrement === true;
  }

  function canonicalizeIsAutoIncrement($isAutoIncrement)
  {
    return is_null($isAutoIncrement) ?  null : (bool) $isAutoIncrement;
  }

  function escapeIdentifier($name)
  {
    return "\"$name\"";
  }
}


