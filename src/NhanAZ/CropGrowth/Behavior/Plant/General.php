<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class General implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$iterable_expression = [
				VanillaBlocks::BEETROOTS(),
				VanillaBlocks::BROWN_MUSHROOM(),
				VanillaBlocks::CARROTS(),
				VanillaBlocks::COCOA_POD(),
				VanillaBlocks::MELON_STEM(),
				VanillaBlocks::POTATOES(),
				VanillaBlocks::PUMPKIN_STEM(),
				VanillaBlocks::RED_MUSHROOM(),
				VanillaBlocks::SUGARCANE(),
				VanillaBlocks::SWEET_BERRY_BUSH(),
				VanillaBlocks::TWISTING_VINES(),
				VanillaBlocks::WEEPING_VINES(),
				VanillaBlocks::WHEAT()
			];
			foreach ($iterable_expression as $value) {
				if ($block->isSameType($value)) {
					Main::onGrow($block);
					break;
				}
			}
		}
	}
}
