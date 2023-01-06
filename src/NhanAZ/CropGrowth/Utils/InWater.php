<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Utils;

use pocketmine\block\Block;
use pocketmine\block\Water;

class InWater {

	/** Check water inside the block itself (not supported on the API yet) */
	public static function inWater(Block $block): bool {
		$blockPos = $block->getPosition();
		$world = $blockPos->getWorld();
		$hasWater = false;
		foreach ($blockPos->sides() as $vector3) {
			if ($world->getBlock($vector3) instanceof Water) {
				$hasWater = true;
				break;
			}
		}
		if ($hasWater) {
			return true;
		}
		return false;
	}
}
