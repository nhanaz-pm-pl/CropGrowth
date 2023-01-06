<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use NhanAZ\CropGrowth\Blocks\CoarseDirt;
use NhanAZ\CropGrowth\Blocks\DirtBlock;
use NhanAZ\CropGrowth\Blocks\GrassBlock;
use NhanAZ\CropGrowth\Blocks\RedSandBlock;
use NhanAZ\CropGrowth\Blocks\RootedDirt;
use NhanAZ\CropGrowth\Blocks\SandBlock;
use NhanAZ\CropGrowth\Math\Math;
use NhanAZ\CropGrowth\Particle\CropGrowthParticle;
use NhanAZ\CropGrowth\Plants\Bamboo;
use NhanAZ\CropGrowth\Plants\BambooSapling;
use NhanAZ\CropGrowth\Plants\Beetroots;
use NhanAZ\CropGrowth\Plants\BrownMushroom;
use NhanAZ\CropGrowth\Plants\Carrots;
use NhanAZ\CropGrowth\Plants\Cocoa;
use NhanAZ\CropGrowth\Plants\DoubleTallgrassAndLargeFern;
use NhanAZ\CropGrowth\Plants\FernAndGrass;
use NhanAZ\CropGrowth\Plants\Flowers\Allium;
use NhanAZ\CropGrowth\Plants\Flowers\AzureBluet;
use NhanAZ\CropGrowth\Plants\Flowers\BlueOrchid;
use NhanAZ\CropGrowth\Plants\Flowers\Cornflower;
use NhanAZ\CropGrowth\Plants\Flowers\Dandelion;
use NhanAZ\CropGrowth\Plants\Flowers\LilyOfTheValley;
use NhanAZ\CropGrowth\Plants\Flowers\OrangeTulip;
use NhanAZ\CropGrowth\Plants\Flowers\OxeyeDaisy;
use NhanAZ\CropGrowth\Plants\Flowers\PinkTulip;
use NhanAZ\CropGrowth\Plants\Flowers\Poppy;
use NhanAZ\CropGrowth\Plants\Flowers\RedTulip;
use NhanAZ\CropGrowth\Plants\Flowers\WhiteTulip;
use NhanAZ\CropGrowth\Plants\Lilacs;
use NhanAZ\CropGrowth\Plants\MelonSeeds;
use NhanAZ\CropGrowth\Plants\Peonies;
use NhanAZ\CropGrowth\Plants\Potatoes;
use NhanAZ\CropGrowth\Plants\PumpkinSeeds;
use NhanAZ\CropGrowth\Plants\RedMushroom;
use NhanAZ\CropGrowth\Plants\RoseBushes;
use NhanAZ\CropGrowth\Plants\Saplings\AcaciaSapling;
use NhanAZ\CropGrowth\Plants\Saplings\BirchSapling;
use NhanAZ\CropGrowth\Plants\Saplings\DarkOakSapling;
use NhanAZ\CropGrowth\Plants\Saplings\JungleSapling;
use NhanAZ\CropGrowth\Plants\Saplings\OakSapling;
use NhanAZ\CropGrowth\Plants\Saplings\SpruceSapling;
use NhanAZ\CropGrowth\Plants\SeaPickle;
use NhanAZ\CropGrowth\Plants\SugarCane;
use NhanAZ\CropGrowth\Plants\Sunflowers;
use NhanAZ\CropGrowth\Plants\SweetBerryBush;
use NhanAZ\CropGrowth\Plants\TwistingVines;
use NhanAZ\CropGrowth\Plants\WeepingVines;
use NhanAZ\CropGrowth\Plants\Wheat;
use NhanAZ\CropGrowth\Sound\BoneMealUseSound;
use pocketmine\block\Block;
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

	/** Check water inside the block itself (not supported on the API yet) */
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

	private function registerEvent(Listener $event): void {
		$this->getServer()->getPluginManager()->registerEvents($event, $this);
	}

	/**
	 * @see https://minecraft.fandom.com/wiki/Bone_Meal#Fertilizer
	 */
	private function registerEvents(): void {
		$this->registerEvent(new Wheat());
		$this->registerEvent(new Carrots());
		$this->registerEvent(new Potatoes());

		$this->registerEvent(new Beetroots());

		# [https://minecraft.fandom.com/wiki/Bamboo#Data_values]
		$this->registerEvent(new Bamboo());
		$this->registerEvent(new BambooSapling());

		$this->registerEvent(new MelonSeeds());
		$this->registerEvent(new PumpkinSeeds());

		# Saplings [https://minecraft.fandom.com/wiki/Sapling#Data_values]
		$this->registerEvent(new OakSapling());
		$this->registerEvent(new SpruceSapling());
		$this->registerEvent(new BirchSapling());
		$this->registerEvent(new JungleSapling());
		$this->registerEvent(new AcaciaSapling());
		$this->registerEvent(new DarkOakSapling());
		# TODO: Mangrove Propagule
		# TODO: Azalea
		# TODO: Flowering Azalea
		# TODO: Mangrove Propagule (not hanging)

		$this->registerEvent(new Sunflowers());
		$this->registerEvent(new Lilacs());
		$this->registerEvent(new RoseBushes());
		$this->registerEvent(new Peonies());

		# Grass(s) [https://minecraft.fandom.com/wiki/Grass#Data_values]
		$this->registerEvent(new FernAndGrass()); # (Ferns)
		$this->registerEvent(new DoubleTallgrassAndLargeFern()); # (Tall Grass)
		# TODO: Seagrass

		# Mushrooms [https://minecraft.fandom.com/wiki/Mushroom#Data_values]
		$this->registerEvent(new BrownMushroom());
		$this->registerEvent(new RedMushroom());

		$this->registerEvent(new Cocoa());

		$this->registerEvent(new SweetBerryBush());

		$this->registerEvent(new SeaPickle());

		$this->registerEvent(new SugarCane());

		# TODO: Kelp

		# Flowers [https://minecraft.fandom.com/wiki/Flower#Data_values]
		$this->registerEvent(new Dandelion());
		$this->registerEvent(new Poppy());
		$this->registerEvent(new BlueOrchid());
		$this->registerEvent(new Allium());
		$this->registerEvent(new AzureBluet());
		$this->registerEvent(new RedTulip());
		$this->registerEvent(new OrangeTulip());
		$this->registerEvent(new WhiteTulip());
		$this->registerEvent(new PinkTulip());
		$this->registerEvent(new OxeyeDaisy());
		$this->registerEvent(new Cornflower());
		$this->registerEvent(new LilyOfTheValley());
		# TODO: Wither Rose [Java Only]
		# Sunflower [Imported]
		# Lilac [Imported]
		# Rose Bush [Imported]
		# Peony [Imported]

		# TODO: Fungus

		$this->registerEvent(new WeepingVines());

		$this->registerEvent(new TwistingVines());

		# TODO: Cave Vines

		# TODO: Glow Lichen

		# TODO: Moss Block

		# TODO: Big Dripleaf
		# TODO: Small Dripleaf

		$this->registerEvent(new DirtBlock());
		$this->registerEvent(new RootedDirt());
		$this->registerEvent(new CoarseDirt());
		$this->registerEvent(new SandBlock());
		$this->registerEvent(new RedSandBlock());

		# TODO: Mangrove Leaves

		# Mangrove Propagule [Mentioned]

		$this->registerEvent(new GrassBlock());
	}
}
