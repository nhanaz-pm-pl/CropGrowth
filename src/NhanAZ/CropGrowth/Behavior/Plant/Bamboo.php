<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\BlockTypeIds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class Bamboo implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block->getTypeId() === BlockTypeIds::BAMBOO_SAPLING) {
				if ($block->getSide(Facing::UP)->getTypeId() === BlockTypeIds::AIR) {
					Main::onGrow($block);
					return;
				}
			}
			if ($block->getTypeId() === BlockTypeIds::BAMBOO) {
				# TODO: Only do this when the bamboo grows unhindered by any blocks and the bamboo has not reached the limit height.
				Main::onGrow($block);
				return;
			}
		}
	}
}
