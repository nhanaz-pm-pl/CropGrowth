<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use NhanAZ\CropGrowth\Math\Math;
use NhanAZ\CropGrowth\Particle\CropGrowthParticle;
use NhanAZ\CropGrowth\Sound\BoneMealUseSound;
use pocketmine\block\Dirt;
use pocketmine\block\utils\DirtType;
use pocketmine\block\VanillaBlocks;
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
					if ($block instanceof Dirt) { # Dirt (Rooted Dirt)
						if ($block->getDirtType()->equals(DirtType::ROOTED())) {
							# TODO: Only executed if below Rooted_Block is AIR
							$this->playParticleAndSound($world, $blockPos);
						}
						return;
					}
					if ($block->isSameType(VanillaBlocks::SEA_PICKLE())) {
						if ($block->getSide(Facing::DOWN)->isSameType(VanillaBlocks::CORAL_BLOCK())) {
							# TODO: Only executed if Sea_Pickle is inside Water
							$this->playParticleAndSound($world, $blockPos);
						}
						return;
					}
					# TODO: Only executed if above the Grass_Block is Air
					$this->playParticleAndSound($world, $blockPos);
				}
			}
		}
	}
}
