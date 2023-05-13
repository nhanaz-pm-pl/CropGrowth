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

	private function isCanGrow(Block $block): bool {
		$block = $this->seekToTop($block);
		if ($this->getBamboHeight($block) >= $this->getMaxHeight($block->getPosition()->getFloorX(), $block->getPosition()->getFloorZ())) {
			return false;
		}
		$block = $block->getSide(Facing::UP);
		if ($block->getTypeId() === BlockTypeIds::AIR) {
			return true;
		}
		return false;
	}

	private function getBamboHeight(Block $block): int {
		$world = $block->getPosition()->getWorld();
		$height = 0;
		while ($world->getBlock($block->getPosition()->subtract(0, $height, 0))->getTypeId() === BlockTypeIds::BAMBOO) {
			$height++;
		}
		return $height;
	}

	private function seekToTop(Block $block) : Block{
		$world = $block->getPosition()->getWorld();
		$top = $block;
		while((($next = $world->getBlock($top->getPosition()->up()))->getTypeId() === BlockTypeIds::BAMBOO)){
			$top = $next;
		}
		return $top;
	}

	/**
	 * PM-COPYPASTA (See pocketmine/block/Bamboo.php)
	 */
	private function getOffsetSeed(int $x, int $y, int $z) : int{
		$p1 = gmp_mul($z, 0x6ebfff5);
		$p2 = gmp_mul($x, 0x2fc20f);
		$p3 = $y;

		$xord = gmp_xor(gmp_xor($p1, $p2), $p3);

		$fullResult = gmp_mul(gmp_add(gmp_mul($xord, 0x285b825), 0xb), $xord);
		return gmp_intval(gmp_and($fullResult, 0xffffffff));
	}

	private function getMaxHeight(int $x, int $z) : int{
		return 12 + ($this->getOffsetSeed($x, 0, $z) % 5);
	}
}
