<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\BlockTypeIds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class Sapling implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event) : void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$saplingsTypeIds = [
				BlockTypeIds::ACACIA_SAPLING,
				BlockTypeIds::BIRCH_SAPLING,
				BlockTypeIds::DARK_OAK_SAPLING,
				BlockTypeIds::JUNGLE_SAPLING,
				BlockTypeIds::OAK_SAPLING,
				BlockTypeIds::SPRUCE_SAPLING
			];
			foreach ($saplingsTypeIds as $saplingTypeId) {
				if ($block->getTypeId() === $saplingTypeId) {
					Main::onGrow($block);
					break;
				}
			}
		}
	}
}
