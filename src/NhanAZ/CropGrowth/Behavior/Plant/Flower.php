<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class Flower implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$flowers = [
				VanillaBlocks::ALLIUM(),
				VanillaBlocks::AZURE_BLUET(),
				VanillaBlocks::BLUE_ORCHID(),
				VanillaBlocks::CORNFLOWER(),
				VanillaBlocks::DANDELION(),
				VanillaBlocks::LILAC(),
				VanillaBlocks::LILY_OF_THE_VALLEY(),
				VanillaBlocks::ORANGE_TULIP(),
				VanillaBlocks::OXEYE_DAISY(),
				VanillaBlocks::PEONY(),
				VanillaBlocks::PINK_TULIP(),
				VanillaBlocks::POPPY(),
				VanillaBlocks::RED_TULIP(),
				VanillaBlocks::ROSE_BUSH(),
				VanillaBlocks::SUNFLOWER(),
				VanillaBlocks::WHITE_TULIP()
			];
			foreach ($flowers as $flower) {
				if ($block->isSameType($flower)) {
					Main::onGrow($block);
					break;
				}
			}
		}
	}
}
