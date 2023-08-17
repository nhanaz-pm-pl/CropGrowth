<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\BlockTypeIds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class Flower implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event) : void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$flowersTypeIds = [
				BlockTypeIds::ALLIUM,
				BlockTypeIds::AZURE_BLUET,
				BlockTypeIds::BLUE_ORCHID,
				BlockTypeIds::CORNFLOWER,
				BlockTypeIds::DANDELION,
				BlockTypeIds::LILAC,
				BlockTypeIds::LILY_OF_THE_VALLEY,
				BlockTypeIds::ORANGE_TULIP,
				BlockTypeIds::OXEYE_DAISY,
				BlockTypeIds::PEONY,
				BlockTypeIds::PINK_TULIP,
				BlockTypeIds::POPPY,
				BlockTypeIds::RED_TULIP,
				BlockTypeIds::ROSE_BUSH,
				BlockTypeIds::SUNFLOWER,
				BlockTypeIds::WHITE_TULIP
			];
			foreach ($flowersTypeIds as $flowerTypeId) {
				if ($block->getTypeId() === $flowerTypeId) {
					Main::onGrow($block);
					break;
				}
			}
		}
	}
}
