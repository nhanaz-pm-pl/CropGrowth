<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Block;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class InWater implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$iterable_expression = [
				VanillaBlocks::CLAY(),
				VanillaBlocks::GRAVEL(),
				VanillaBlocks::RED_SAND(),
				VanillaBlocks::SAND()
			];
			foreach ($iterable_expression as $value) {
				if ($block->isSameType($value)) {
					foreach (Main::aquaticPlants() as $plant) {
						if ($block->getSide(Facing::UP)->isSameType($plant)) {
							if (Main::isInWater($block->getSide(Facing::UP))) {
								Main::onGrow($block);
								break;
							}
						}
					}
				}
				break;
			}
		}
	}
}
