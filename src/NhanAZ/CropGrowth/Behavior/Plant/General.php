<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\BlockTypeIds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class General implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event) : void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			$generalCropTypeIds = [
				BlockTypeIds::BEETROOTS,
				BlockTypeIds::BROWN_MUSHROOM,
				BlockTypeIds::CARROTS,
				BlockTypeIds::COCOA_POD,
				BlockTypeIds::MELON_STEM,
				BlockTypeIds::POTATOES,
				BlockTypeIds::PUMPKIN_STEM,
				BlockTypeIds::RED_MUSHROOM,
				BlockTypeIds::SUGARCANE,
				BlockTypeIds::SWEET_BERRY_BUSH,
				BlockTypeIds::TWISTING_VINES,
				BlockTypeIds::WEEPING_VINES,
				BlockTypeIds::WHEAT,
				BlockTypeIds::BIG_DRIPLEAF_HEAD,
				BlockTypeIds::BIG_DRIPLEAF_STEM,
				BlockTypeIds::SMALL_DRIPLEAF,
				BlockTypeIds::PINK_PETALS,
				BlockTypeIds::TORCHFLOWER_CROP,
				BlockTypeIds::PITCHER_CROP
			];
			foreach ($generalCropTypeIds as $cropTypeId) {
				if ($block->getTypeId() === $cropTypeId) {
					Main::onGrow($block);
					break;
				}
			}
		}
	}
}
