<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants;

use NhanAZ\CropGrowth\Main;
use NhanAZ\CropGrowth\Utils\InWater;
use pocketmine\block\CoralBlock;
use pocketmine\block\VanillaBlocks;
use pocketmine\block\Water;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class SeaPickle implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		$blockPos = $block->getPosition();
		$world = $blockPos->getWorld();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block->isSameType(VanillaBlocks::SEA_PICKLE())) {
				$blockSideDown = $block->getSide(Facing::DOWN);
				if ($blockSideDown instanceof CoralBlock) {
					if (!$blockSideDown->isDead()) {
						if (InWater::inWater($block)) {
							Main::playParticleAndSound($world, $blockPos);
						}
					}
				}
			}
		}
	}
}
