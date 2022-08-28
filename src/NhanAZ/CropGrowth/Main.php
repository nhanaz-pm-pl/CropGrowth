<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use NhanAZ\CropGrowth\Math\Math;
use NhanAZ\CropGrowth\Particle\CropGrowthParticle;
use NhanAZ\CropGrowth\Sound\BoneMealUseSound;
use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\VanillaItems;
use pocketmine\plugin\PluginBase;
use function in_array;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function addParticle(Block $block) {
		$block->getPosition()->getWorld()->addParticle($block->getPosition(), new CropGrowthParticle());
	}

	private function addSound(Block $block): void {
		$block->getPosition()->getWorld()->addSound(Math::center($block->getPosition()), new BoneMealUseSound());
	}

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		if ($event->getItem()->equals(VanillaItems::BONE_MEAL(), true)) {
			if (PlayerInteractEvent::RIGHT_CLICK_BLOCK === $event->getAction()) {
				if (in_array($event->getBlock()->getTypeId(), Crops::crops(), true)) {
					$this->addParticle($event->getBlock());
					$this->addSound($event->getBlock());
				}
			}
		}
	}
}
