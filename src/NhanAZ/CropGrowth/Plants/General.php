<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Plants;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class General implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$iterable_expression = [
				VanillaBlocks::WHEAT(),
				VanillaBlocks::CARROTS(),
				VanillaBlocks::POTATOES(),
				VanillaBlocks::BEETROOTS(),
				VanillaBlocks::MELON_STEM(),
				VanillaBlocks::PUMPKIN_STEM(),

				# Mushrooms [https://minecraft.fandom.com/wiki/Mushroom#Data_values]
				VanillaBlocks::BROWN_MUSHROOM(),
				VanillaBlocks::RED_MUSHROOM(),

				VanillaBlocks::COCOA_POD(),

				VanillaBlocks::SWEET_BERRY_BUSH(),

				VanillaBlocks::WEEPING_VINES(),
				VanillaBlocks::TWISTING_VINES(),

				VanillaBlocks::SUGARCANE()
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
