<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\CaveVines as PMCaveVines;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class CaveVines implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event) : void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block instanceof PMCaveVines) {
				if (!$block->hasBerries()) {
					Main::onGrow($block);
					return;
				}
			}
		}
	}
}
