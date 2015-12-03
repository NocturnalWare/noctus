<?php

namespace App\Inventory;

class Order
{
	private $inventory;

	public function __construct(InventoryHandlerInterface $inventory)
	{
		$this->inventory = $inventory;
	}

}

interface InventoryHandlerInterface
{
	function add();
}

class OrderHandler implements InventoryHandlerInterface;
{
	public function add(){

	}
}