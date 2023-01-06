<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants;

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
					if ($block->getDirtType()->equals(DirtType::NORMAL())) {
						if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::WATER())) {
							Main::playParticleAndSound($block);
						}
					}
				}
			}
		}
	}
}
