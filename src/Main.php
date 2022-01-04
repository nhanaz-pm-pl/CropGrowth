<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\math\Vector3;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\item\VanillaItems;
use pocketmine\block\VanillaBlocks;
use pocketmine\block\BlockLegacyIds;
use pocketmine\event\block\BlockGrowEvent;
use pocketmine\event\block\StructureGrowEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\network\mcpe\protocol\SpawnParticleEffectPacket;

class Main extends PluginBase implements Listener
{

	protected function onEnable(): void
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
	}

	public function spawnParticleEffect(Vector3 $position, string $particleName): void
	{
		$packet = new SpawnParticleEffectPacket();
		$packet->position = $position;
		$packet->particleName = $particleName;
		$recipients = $this->getServer()->getOnlinePlayers();
		$this->getServer()->broadcastPackets($recipients, [$packet]);
	}

	public function onPlayerInteract(PlayerInteractEvent $event): void
	{
		$block = $event->getBlock();
		$blockID = $block->getId();
		$item = $event->getItem();
		$rightClickBlock = PlayerInteractEvent::RIGHT_CLICK_BLOCK;
		if ($item->equals(VanillaItems::BONE_MEAL(), true)) {
			if ($blockID === BlockLegacyIds::GRASS) {
				if ($event->getAction() === $rightClickBlock) {
					$position = $block->getPosition()->add(0.5, 1.5, 0.5);
					$particleName = "minecraft:crop_growth_area_emitter";
					$this->spawnParticleEffect($position, $particleName);
				}
			}
			if (
				$blockID === VanillaBlocks::FERN()->getId() or
				$blockID === VanillaBlocks::WHEAT()->getId() or
				$blockID === VanillaBlocks::BAMBOO()->getId() or
				$blockID === VanillaBlocks::POTATOES()->getId() or
				$blockID === VanillaBlocks::BEETROOTS()->getId() or
				$blockID === VanillaBlocks::SUGARCANE()->getId() or
				$blockID === VanillaBlocks::COCOA_POD()->getId() or
				$blockID === VanillaBlocks::MELON_STEM()->getId() or
				$blockID === VanillaBlocks::OAK_SAPLING()->getId() or
				$blockID === VanillaBlocks::PUMPKIN_STEM()->getId() or
				$blockID === VanillaBlocks::BIRCH_SAPLING()->getId() or
				$blockID === VanillaBlocks::ACACIA_SAPLING()->getId() or
				$blockID === VanillaBlocks::JUNGLE_SAPLING()->getId() or
				$blockID === VanillaBlocks::SPRUCE_SAPLING()->getId() or
				$blockID === VanillaBlocks::DARK_OAK_SAPLING()->getId() or
				$blockID === VanillaBlocks::SWEET_BERRY_BUSH()->getId()
			) {
				if ($event->getAction() === $rightClickBlock) {
					$position = $block->getPosition()->add(0.5, 0.5, 0.5);
					$particleName = "minecraft:crop_growth_emitter";
					$this->spawnParticleEffect($position, $particleName);
				}
			}
		}
	}

	public function onGrow($event): void
	{
		if ($this->getConfig()->get("advancedCropGrowthParticles") == true) {
			$block = $event->getBlock();
			$position = $block->getPosition()->add(0.5, 0.5, 0.5);
			$particleName = "minecraft:crop_growth_emitter";
			$this->spawnParticleEffect($position, $particleName);
		}
	}

	public function onBlockGrow(BlockGrowEvent $event): void
	{
		$this->onGrow($event);
	}

	public function onStructureGrow(StructureGrowEvent $event): void
	{
		$this->onGrow($event);
	}
}
