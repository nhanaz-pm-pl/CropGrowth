<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Blocks;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\Dirt;
use pocketmine\block\utils\DirtType;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Fertilizer;
use pocketmine\math\Facing;

class CoarseDirt implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		$item = $event->getItem();
		if ($item instanceof Fertilizer) {
			if ($block->isSameType(VanillaBlocks::DIRT())) {
				if ($block instanceof Dirt) {
					if ($block->getDirtType()->equals(DirtType::COARSE())) {
						foreach (Main::aquaticPlants() as $plant) {
							if ($block->getSide(Facing::UP)->isSameType($plant)) {
								if (Main::isInWater($block->getSide(Facing::UP))) {
									Main::onGrow($block);
									break;
								}
							}
						}
					}
				}
			}
		}
	}
}
