<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Blocks;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class SandBlock implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block->isSameType(VanillaBlocks::SAND())) {
				if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::WATER())) {
					Main::playParticleAndSound($block);
				}
			}
		}
	}
}
