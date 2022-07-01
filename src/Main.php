<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\math\Vector3;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\item\VanillaItems;
use pocketmine\block\BlockLegacyIds;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\network\mcpe\protocol\SpawnParticleEffectPacket;
use NhanAZ\CropGrowth\Crops;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function spawnParticleEffect(Vector3 $position, string $particleName): void {
		$packet = new SpawnParticleEffectPacket();
		$packet->position = $position;
		$packet->particleName = $particleName;
		$recipients = $this->getServer()->getOnlinePlayers();
		$this->getServer()->broadcastPackets($recipients, [$packet]);
	}

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if ($event->getItem()->equals(VanillaItems::BONE_MEAL(), true)) {
			if ($event->getAction() === PlayerInteractEvent::RIGHT_CLICK_BLOCK) {
				if (in_array($block->getId(), Crops::CropIdsWithAreaEmitter())) {
					if ($block->getID() === BlockLegacyIds::GRASS) {
						$position = $block->getPosition()->add(0.5, 1.5, 0.5);
					} else {
						$position = $block->getPosition()->add(0.5, 0.5, 0.5);
					}
					$particleName = "minecraft:crop_growth_area_emitter";
					$this->spawnParticleEffect($position, $particleName);
				}
				if (in_array($block->getId(), Crops::CropIdsWithEmitter())) {
					$position = $block->getPosition()->add(0.5, 0.5, 0.5);
					$particleName = "minecraft:crop_growth_emitter";
					$this->spawnParticleEffect($position, $particleName);
				}
			}
		}
	}
}
