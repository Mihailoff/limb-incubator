<?php
/**
 * Limb Web Application Framework
 *
 * @link http://limb-project.com
 *
 * @copyright  Copyright &copy; 2004-2007 BIT
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 * @version    $Id: lmbTree.interface.php 5675 2007-04-18 11:36:51Z alex433 $
 * @package    tree
 */

interface lmbTree
{
  function initTree($values);
  function isNode($id);
  function getNode($id);
  function getTopNodes($level = 1);
  function getParent($id);
  function getParents($id);
  function getSiblings($id);
  function getChildren($id, $depth = 1);
  function getChildrenAll($id);
  function countChildren($id, $depth = 1);
  function countChildrenAll($id);
  function createNode($values, $parent_node = null);
  function deleteNode($id);
  function updateNode($id, $values, $internal = false);
  function moveNode($id, $target_id);
  function getNodesByIds($ids_array);
  function getNodeByPath($path, $delimiter='/');
  function getPathToNode($node, $delimeter = '/');
}

?>