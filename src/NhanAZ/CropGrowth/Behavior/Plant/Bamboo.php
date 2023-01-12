<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;

class Bamboo implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block->isSameType(VanillaBlocks::BAMBOO_SAPLING())) {
				if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::AIR())) {
					Main::onGrow($block);
					return;
				}
			}
			if ($block->isSameType(VanillaBlocks::BAMBOO())) {
				# TODO: Only do this when the bamboo grows unhindered by any blocks and the bamboo has not reached the limit height.
				Main::onGrow($block);
			}
		}
	}
}
