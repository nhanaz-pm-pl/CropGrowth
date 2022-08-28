<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use _64FF00\PurePerms\Commands\PPInfo;
use NhanAZ\CropGrowth\Math\Math;
use NhanAZ\CropGrowth\Particle\CropGrowthParticle;
use NhanAZ\CropGrowth\Sound\BoneMealUseSound;
use pocketmine\block\CoralBlock;
use pocketmine\block\Dirt;
use pocketmine\block\utils\DirtType;
use pocketmine\block\VanillaBlocks;
use pocketmine\block\Water;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\VanillaItems;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\world\World;
use function in_array;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function playParticleAndSound(World $world, Vector3 $blockPos): void {
		$world->addParticle($blockPos, new CropGrowthParticle());
		$world->addSound(Math::center($blockPos), new BoneMealUseSound());
	}

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		$blockPos = $block->getPosition();
		$world = $blockPos->getWorld();
		if ($event->getItem()->equals(VanillaItems::BONE_MEAL(), true)) {
			if (PlayerInteractEvent::RIGHT_CLICK_BLOCK === $event->getAction()) {
				if (in_array($block->getTypeId(), Plants::plants(), true)) {
					if ($block instanceof Dirt) { # Dirts
						if ($block->getDirtType()->equals(DirtType::ROOTED())) { # Rooted Dirt
							if ($block->getSide(Facing::DOWN)->isSameType(VanillaBlocks::AIR())) {
								$this->playParticleAndSound($world, $blockPos);
								return;
							}
							return;
						}
						foreach ($blockPos->sides() as $vector3) { # Dirt
							if ($world->getBlock($vector3) instanceof Water) {
								if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::WATER())) {
									$this->playParticleAndSound($world, $blockPos);
								}
								break;
							}
						}
						return;
					}
					if ($block->isSameType(VanillaBlocks::SEA_PICKLE())) { # Sea Pickle
						$blockSideDown = $block->getSide(Facing::DOWN);
						if ($blockSideDown instanceof CoralBlock) {
							if (!$blockSideDown->isDead()) {
								foreach ($blockPos->sides() as $vector3) {
									if ($world->getBlock($vector3) instanceof Water) {
										$this->playParticleAndSound($world, $blockPos);
										break;
									}
								}
							}
						}
						return;
					}
					if ($block->isSameType(VanillaBlocks::GRASS())) { # Grass
						if ($block->getSide(FACING::UP)->isSameType(VanillaBlocks::AIR())) {
							$this->playParticleAndSound($world, $blockPos);
						}
						return;
					}
					if ($block->isSameType(VanillaBlocks::BAMBOO()) ||
						$block->isSameType(VanillaBlocks::BAMBOO_SAPLING())) { # Bamboo and Bamboo Sapling
						if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::AIR())) {
							$this->playParticleAndSound($world, $blockPos);
						}
						return;
					}
					$this->playParticleAndSound($world, $blockPos);
				}
			}
		}
	}
}
