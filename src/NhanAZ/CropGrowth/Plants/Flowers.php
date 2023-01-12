<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class Flowers implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$flowers = [
				VanillaBlocks::DANDELION(),
				VanillaBlocks::POPPY(),
				VanillaBlocks::BLUE_ORCHID(),
				VanillaBlocks::ALLIUM(),
				VanillaBlocks::AZURE_BLUET(),
				VanillaBlocks::RED_TULIP(),
				VanillaBlocks::ORANGE_TULIP(),
				VanillaBlocks::WHITE_TULIP(),
				VanillaBlocks::PINK_TULIP(),
				VanillaBlocks::OXEYE_DAISY(),
				VanillaBlocks::CORNFLOWER(),
				VanillaBlocks::LILY_OF_THE_VALLEY(),
				VanillaBlocks::SUNFLOWER(),
				VanillaBlocks::LILAC(),
				VanillaBlocks::ROSE_BUSH(),
				VanillaBlocks::PEONY()
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
