<?php
/**
 * RedBean Tree
 *
 * @file 		RedBean/TreeManager.php
 * @description		Shields you from race conditions automatically.
 * @author			Gabor de Mooij
 * @license			BSD
 */
class RedBean_TreeManager {

	/**
	 *
	 * @var string
	 */
	private $property = "parent_id";

	/**
	 * @var RedBean_OODB
	 */
	private $oodb;

	/**
	 * @var RedBean_Adapter_DBAdapter
	 */
	private $adapter;

	/**
	 * @var RedBean_QueryWriter
	 */
	private $writer;

	/**
	 * Constructor
	 * @param RedBean_ToolBox $tools
	 */
	public function __construct( RedBean_ToolBox $tools ) {
		$this->oodb = $tools->getRedBean();
		$this->adapter = $tools->getDatabaseAdapter();
		$this->writer = $tools->getWriter();
	}

	/**
	 *
	 * @param RedBean_OODBBean $parent
	 * @param RedBean_OODBBean $child
	 */
	public function attach( RedBean_OODBBean $parent, RedBean_OODBBean $child ) {
		$idfield = $this->writer->getIDField($parent->getMeta("type"));
		if (!intval($parent->$idfield)) $this->oodb->store($parent);
		$child->{$this->property} = $parent->$idfield;
		$this->oodb->store($child);
	}

	/**
	 *
	 * @param RedBean_OODBBean $parent
	 * @return array $childObjects
	 */
	public function children( RedBean_OODBBean $parent ) {
		$idfield = $this->writer->getIDField($parent->getMeta("type"));
		try {$ids = $this->adapter->getCol("SELECT `".$idfield."` FROM
			`".$parent->getMeta("type")."`
			WHERE `".$this->property."` = ".intval( $parent->$idfield )."
		");
		}
		catch(RedBean_Exception_SQL $e) {
			return array();
		}
		return $this->oodb->batch($parent->getMeta("type"),$ids	);
	}
	
}