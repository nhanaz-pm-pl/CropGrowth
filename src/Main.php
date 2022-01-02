<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\block\Grass;
use pocketmine\event\Listener;
use pocketmine\item\Fertilizer;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\network\mcpe\protocol\SpawnParticleEffectPacket;

class Main extends PluginBase implements Listener {

	protected function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onPlayerInteract(PlayerInteractEvent $event) {
		if ($event->getItem() instanceof Fertilizer) {
			$block = $event->getBlock();
			if ($block instanceof Grass) {
				$rightClickBlock = PlayerInteractEvent::RIGHT_CLICK_BLOCK;
				if ($event->getAction() === $rightClickBlock) {
					$position = $block->getPosition();
					$packet = new SpawnParticleEffectPacket();
					$packet->position = $position->add(0.5, 1.5, 0.5);
					$packet->particleName = "minecraft:crop_growth_area_emitter";
					$recipients = $this->getServer()->getOnlinePlayers();
					$this->getServer()->broadcastPackets($recipients, [$packet]);
				}
			}
		}
	}
}
