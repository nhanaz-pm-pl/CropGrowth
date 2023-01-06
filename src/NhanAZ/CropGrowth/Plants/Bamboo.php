<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Fertilizer;
use pocketmine\math\Facing;

class Bamboo implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		$item = $event->getItem();
		if ($item instanceof Fertilizer) {
			if ($block->isSameType(VanillaBlocks::BAMBOO())) {
				if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::AIR())) {
					Main::onGrow($block);
				}
			}
		}
	}
}
