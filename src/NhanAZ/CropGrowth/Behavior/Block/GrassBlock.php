<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Block;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\BlockTypeIds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class GrassBlock implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event) : void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block->getTypeId() === BlockTypeIds::GRASS) {
				if ($block->getSide(Facing::UP)->getTypeId() === BlockTypeIds::AIR) {
					Main::onGrow($block);
				}
			}
		}
	}
}
