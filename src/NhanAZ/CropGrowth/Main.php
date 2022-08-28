<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\VanillaItems;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\SpawnParticleEffectPacket;
use pocketmine\network\mcpe\protocol\types\DimensionIds;
use pocketmine\plugin\PluginBase;
use function in_array;

class Main extends PluginBase implements Listener {
	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function spawnParticleEffect(Vector3 $position, bool $particleArea): void {
		if ($particleArea) {
			$particleName = "minecraft:crop_growth_area_emitter";
		} else {
			$position = $position->add(0.5, 0.5, 0.5);
			$particleName = "minecraft:crop_growth_emitter";
		}
		$packet = SpawnParticleEffectPacket::create(DimensionIds::OVERWORLD, -1, $position, $particleName, null);
		$recipients = $this->getServer()->getOnlinePlayers();
		$this->getServer()->broadcastPackets($recipients, [$packet]);
	}

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if ($event->getItem()->equals(VanillaItems::BONE_MEAL(), true)) {
			if (PlayerInteractEvent::RIGHT_CLICK_BLOCK === $event->getAction()) {
				// Crop Ids With Area Emitter
				if (in_array($block->getTypeId(), Crops::CropIdsWithAreaEmitter(), true)) {
					if ($block->isSameType(VanillaBlocks::GRASS())) {
						if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::AIR())) {
							$position = $block->getPosition()->add(0.5, 1.5, 0.5);
							$this->spawnParticleEffect($position, true);
						}
					} else {
						$position = $block->getPosition()->add(0.5, 0.5, 0.5);
						$this->spawnParticleEffect($position, true);
					}
				}

				// Crop Ids With Emitter
				if (in_array($block->getTypeId(), Crops::CropIdsWithEmitter(), true)) {
					$this->spawnParticleEffect($block->getPosition(), false);
				}
			}
		}
	}
}
