<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use NhanAZ\CropGrowth\Behavior\Block\ClayBlock;
use NhanAZ\CropGrowth\Behavior\Block\CoarseDirt;
use NhanAZ\CropGrowth\Behavior\Block\DirtBlock;
use NhanAZ\CropGrowth\Behavior\Block\GrassBlock;
use NhanAZ\CropGrowth\Behavior\Block\GravelBlock;
use NhanAZ\CropGrowth\Behavior\Block\RedSandBlock;
use NhanAZ\CropGrowth\Behavior\Block\RootedDirt;
use NhanAZ\CropGrowth\Behavior\Block\SandBlock;
use NhanAZ\CropGrowth\Behavior\Plant\Bamboo;
use NhanAZ\CropGrowth\Behavior\Plant\Flower;
use NhanAZ\CropGrowth\Behavior\Plant\General;
use NhanAZ\CropGrowth\Behavior\Plant\Sapling;
use NhanAZ\CropGrowth\Behavior\Plant\SeaPickle;
use NhanAZ\CropGrowth\Math\Math;
use NhanAZ\CropGrowth\Particle\CropGrowthParticle;
use NhanAZ\CropGrowth\Sound\BoneMealUseSound;
use pocketmine\block\Block;
use pocketmine\block\VanillaBlocks;
use pocketmine\block\Water;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	protected function onEnable(): void {
		$this->registerEvents();
	}

	public static function onGrow(Block $block): void {
		$blockPos = $block->getPosition();
		$world = $blockPos->getWorld();
		$world->addParticle($blockPos, new CropGrowthParticle());
		$world->addSound(Math::center($blockPos), new BoneMealUseSound());
	}

	public static function isUseBoneMeal(Item $item, int $action): bool {
		if ($item->equals(VanillaItems::BONE_MEAL(), true) && $action === PlayerInteractEvent::RIGHT_CLICK_BLOCK) {
			return true;
		}
		return false;
	}

	public static function isInWater(Block $block): bool {
		$blockPos = $block->getPosition();
		$world = $blockPos->getWorld();
		$hasWater = false;
		foreach ($blockPos->sides() as $vector3) {
			if ($world->getBlock($vector3) instanceof Water) {
				$hasWater = true;
				break;
			}
		}
		if ($hasWater) {
			return true;
		}
		return false;
	}

	/**
	 * @return array<Block>
	 */
	public static function aquaticPlants() {
		return [
			VanillaBlocks::CORAL(),
			VanillaBlocks::CORAL_FAN(),
			VanillaBlocks::SEA_PICKLE(),
			VanillaBlocks::WATER() # [Exception]
			# TODO: Kelp
		];
	}

	private function registerEvent(Listener $event): void {
		$this->getServer()->getPluginManager()->registerEvents($event, $this);
	}

	private function registerEvents(): void {
		$this->registerEvent(new General());
		$this->registerEvent(new Bamboo());
		$this->registerEvent(new Sapling());
		$this->registerEvent(new SeaPickle());
		$this->registerEvent(new Flower());
		$this->registerEvent(new DirtBlock());
		$this->registerEvent(new RootedDirt());
		$this->registerEvent(new CoarseDirt());
		$this->registerEvent(new SandBlock());
		$this->registerEvent(new RedSandBlock());
		$this->registerEvent(new ClayBlock());
		$this->registerEvent(new GravelBlock());
		$this->registerEvent(new GrassBlock());
		# TODO: Mangrove Propagule
		# TODO: Azalea
		# TODO: Flowering Azalea
		# TODO: Mangrove Propagule
		# TODO: Seagrass
		# TODO: Kelp
		# TODO: Fungus
		# TODO: Cave Vines
		# TODO: Glow Lichen
		# TODO: Moss Block
		# TODO: Big Dripleaf
		# TODO: Small Dripleaf
		# TODO: Mangrove Leaves
	}
}
