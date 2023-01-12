<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Block;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\Dirt;
use pocketmine\block\utils\DirtType;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class DirtBlock implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block->isSameType(VanillaBlocks::DIRT())) {
				if ($block instanceof Dirt) {
					if ($block->getDirtType()->equals(DirtType::NORMAL()) || $block->getDirtType()->equals(DirtType::COARSE())) {
						foreach (Main::aquaticPlants() as $plant) {
							if ($block->getSide(Facing::UP)->isSameType($plant)) {
								if (Main::isInWater($block->getSide(Facing::UP))) {
									Main::onGrow($block);
									break;
								}
							}
						}
						return;
					}
					if ($block->getDirtType()->equals(DirtType::ROOTED())) {
						if ($block->getSide(Facing::DOWN)->isSameType(VanillaBlocks::AIR())) {
							Main::onGrow($block);
						}
						return;
					}
				}
			}
		}
	}
}
