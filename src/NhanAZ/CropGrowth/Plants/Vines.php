<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class Vines implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$vines = [
				VanillaBlocks::WEEPING_VINES(),
				VanillaBlocks::TWISTING_VINES()
			];
			foreach ($vines as $vine) {
				if ($block->isSameType($vine)) {
					Main::onGrow($block);
					break;
				}
			}
		}
	}
}
