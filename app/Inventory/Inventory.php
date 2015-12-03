<?php

namespace App\Inventory;

class Inventory
{
	private $inventory;

	public function __construct(OrderHandler $inventory)
	{
		$this->inventory = $inventory;
	}

}

class OrderHandler implements InventoryHandlerInterface
{
	public function add($money){
		return $money.'added';
	}
}