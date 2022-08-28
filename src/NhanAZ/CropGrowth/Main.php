<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\block\Block;
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

	private const CROP_GROWTH_AREA_EMITTER = "minecraft:crop_growth_area_emitter";
	private const CROP_GROWTH_EMITTER = "minecraft:crop_growth_emitter";

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function spawnParticleEffect(Vector3 $vector3, bool $particleArea): void {
		if ($particleArea) {
			$particleName = self::CROP_GROWTH_AREA_EMITTER;
		} else {
			$vector3 = Math::center($vector3);
			$particleName = self::CROP_GROWTH_EMITTER;
		}
		$packet = SpawnParticleEffectPacket::create(DimensionIds::OVERWORLD, -1, $vector3, $particleName, null);
		$recipients = $this->getServer()->getOnlinePlayers();
		$this->getServer()->broadcastPackets($recipients, [$packet]);
	}

	private function addSound(Block $block): void {
		$blockPosition = $block->getPosition();
		// I'm really confused:
		// Math::center($blockPosition)
		// $blockPosition->add(0.0, 1.0, 0.0)
		// $blockPosition->add(0.0, 1.5, 0.0)
		// Please PR if you know exactly where the sound should be placed ><
		$block->getPosition()->getWorld()->addSound(Math::center($blockPosition), new BoneMealUseSound(), null);
	}

	public function onPlayerInteract(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		$blockPosition = $block->getPosition();
		if ($event->getItem()->equals(VanillaItems::BONE_MEAL(), true)) {
			if (PlayerInteractEvent::RIGHT_CLICK_BLOCK === $event->getAction()) {
				// Crop Ids With Area Emitter
				if (in_array($block->getTypeId(), Crops::CropIdsWithAreaEmitter(), true)) {
					if ($block->isSameType(VanillaBlocks::GRASS())) {
						if ($block->getSide(Facing::UP)->isSameType(VanillaBlocks::AIR())) {
							$position = $blockPosition->add(0.5, 1.5, 0.5);
							$this->spawnParticleEffect($position, true);
							$this->addSound($block);
						}
					} else {
						$position = Math::center($blockPosition);
						$this->spawnParticleEffect($position, true);
						$this->addSound($block);
					}
				}
				// Crop Ids With Emitter
				if (in_array($block->getTypeId(), Crops::CropIdsWithEmitter(), true)) {
					$this->spawnParticleEffect($blockPosition, false);
					$this->addSound($block);
				}
			}
		}
	}
}
