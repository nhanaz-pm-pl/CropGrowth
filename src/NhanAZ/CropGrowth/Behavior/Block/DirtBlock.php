<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Block;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\BlockTypeIds;
use pocketmine\block\Dirt;
use pocketmine\block\utils\DirtType;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class DirtBlock implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block instanceof Dirt) {
				if ($block->getDirtType()->equals(DirtType::NORMAL()) || $block->getDirtType()->equals(DirtType::COARSE())) {
					foreach (Main::aquaticPlantsTypeIds() as $aquaticPlantTypeId) {
						if ($block->getSide(Facing::UP)->getTypeId() === $aquaticPlantTypeId) {
							if (Main::isInWater($block->getSide(Facing::UP))) {
								Main::onGrow($block);
								break;
							}
						}
					}
					return;
				}
				if ($block->getDirtType()->equals(DirtType::ROOTED())) {
					if ($block->getSide(Facing::DOWN)->getTypeId() === BlockTypeIds::AIR) {
						Main::onGrow($block);
					}
					return;
				}
			}
		}
	}
}
