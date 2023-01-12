<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class Saplings implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$saplings = [
				VanillaBlocks::OAK_SAPLING(),
				VanillaBlocks::SPRUCE_SAPLING(),
				VanillaBlocks::BIRCH_SAPLING(),
				VanillaBlocks::JUNGLE_SAPLING(),
				VanillaBlocks::ACACIA_SAPLING(),
				VanillaBlocks::DARK_OAK_SAPLING()
			];
			foreach ($saplings as $sapling) {
				if ($block->isSameType($sapling)) {
					Main::onGrow($block);
					break;
				}
			}
		}
	}
}
