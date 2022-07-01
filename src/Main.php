<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\item\VanillaItems;
use pocketmine\block\VanillaBlocks;
use pocketmine\block\BlockLegacyIds;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\network\mcpe\protocol\SpawnParticleEffectPacket;
use NhanAZ\CropGrowth\Crops;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function spawnParticleEffect(Vector3 $position, bool $particleArea): void {
		$packet = new SpawnParticleEffectPacket();
		$packet->position = $position;
		if ($particleArea) {
			$packet->particleName = "minecraft:crop_growth_area_emitter";
		} else {
			$packet->position = $position->add(0.5, 0.5, 0.5);
			$packet->particleName = "minecraft:crop_growth_emitter";
		}
		$recipients = $this->getServer()->getOnlinePlayers();
		$this->getServer()->broadcastPackets($recipients, [$packet]);
	}

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if ($event->getItem()->equals(VanillaItems::BONE_MEAL(), true)) {
			if ($event->getAction() === PlayerInteractEvent::RIGHT_CLICK_BLOCK) {

				# Crop Ids With Area Emitter
				if (in_array($block->getId(), Crops::CropIdsWithAreaEmitter())) {
					if ($block->getID() === BlockLegacyIds::GRASS) {
						if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::AIR())) {
							$position = $block->getPosition()->add(0.5, 1.5, 0.5);
							$this->spawnParticleEffect($position, true);
						}
					} else {
						$position = $block->getPosition()->add(0.5, 0.5, 0.5);
						$this->spawnParticleEffect($position, true);
					}
				}

				# Crop Ids With Emitter
				if (in_array($block->getId(), Crops::CropIdsWithEmitter())) {
					$this->spawnParticleEffect($block->getPosition(), false);
				}
			}
		}
	}
}
