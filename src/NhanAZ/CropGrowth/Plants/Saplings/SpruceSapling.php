<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants\Saplings;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Fertilizer;

class SpruceSapling implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		$item = $event->getItem();
		if ($item instanceof Fertilizer) {
			if ($block->isSameType(VanillaBlocks::SPRUCE_SAPLING())) {
				Main::onGrow($block);
			}
		}
	}
}
