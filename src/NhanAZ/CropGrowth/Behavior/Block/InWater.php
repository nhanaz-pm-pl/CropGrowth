<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Block;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\BlockTypeIds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class InWater implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event) : void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$blocksForAquaticPlants = [
				BlockTypeIds::CLAY,
				BlockTypeIds::GRAVEL,
				BlockTypeIds::RED_SAND,
				BlockTypeIds::SAND
			];
			foreach ($blocksForAquaticPlants as $blockForAquaticPlant) {
				if ($block->getTypeId() === $blockForAquaticPlant) {
					foreach (Main::aquaticPlantsTypeIds() as $aquaticPlantTypeId) {
						if ($block->getSide(Facing::UP)->getTypeId() === $aquaticPlantTypeId) {
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
