<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Behavior\Plant;

use NhanAZ\CropGrowth\Main;
use pocketmine\block\Block;
use pocketmine\block\BlockTypeIds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Facing;
use pocketmine\world\World;

class Bamboo implements Listener {

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if (Main::isUseBoneMeal($event->getItem(), $event->getAction())) {
			if ($block->getTypeId() === BlockTypeIds::BAMBOO_SAPLING) {
				if ($block->getSide(Facing::UP)->getTypeId() === BlockTypeIds::AIR) {
					Main::onGrow($block);
					return;
				}
			}
			if ($block->getTypeId() === BlockTypeIds::BAMBOO) {
				if ($this->isCanGrow($block)) {
					Main::onGrow($block);
				}
			}
		}
	}

	public function isCanGrow(Block $block): bool {
		$block = $this->getTopBamboo($block);
		if ($block->getPosition()->getY() === World::Y_MAX){
			return false;
		}
		$block = $block->getSide(Facing::UP);
		if ($block->getTypeId() === BlockTypeIds::AIR) {
			return true;
		}
		return false;
	}

	private function getTopBamboo(Block $block): Block {
		$blockPos = $block->getPosition();
		$world = $blockPos->getWorld();
		$topBamboo = $block;
		while ($world->getBlock($blockPos)->getTypeId() === BlockTypeIds::BAMBOO) {
			$topBamboo = $world->getBlock($blockPos);
			$blockPos = $blockPos->getSide(Facing::UP);
		}
		return $topBamboo;
	}
}
