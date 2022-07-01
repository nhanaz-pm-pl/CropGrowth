<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\block\VanillaBlocks;
use pocketmine\block\BlockLegacyIds;

class Crops {

	public static function CropIdsWithAreaEmitter(): array {
		return [
			# Blocks
			BlockLegacyIds::GRASS,

			# Flowers
			VanillaBlocks::DANDELION()->getID(),
			VanillaBlocks::POPPY()->getID(),
			VanillaBlocks::BLUE_ORCHID()->getID(),
			VanillaBlocks::ALLIUM()->getID(),
			VanillaBlocks::AZURE_BLUET()->getID(),
			VanillaBlocks::RED_TULIP()->getID(),
			VanillaBlocks::ORANGE_TULIP()->getID(),
			VanillaBlocks::WHITE_TULIP()->getID(),
			VanillaBlocks::PINK_TULIP()->getID(),
			VanillaBlocks::OXEYE_DAISY()->getID(),
			VanillaBlocks::CORNFLOWER()->getID(),
			VanillaBlocks::LILY_OF_THE_VALLEY()->getID(),
		];
	}

	public static function CropIdsWithEmitter(): array {
		return [
			# Saplings
			VanillaBlocks::OAK_SAPLING()->getId(),
			VanillaBlocks::SPRUCE_SAPLING()->getId(),
			VanillaBlocks::BIRCH_SAPLING()->getId(),
			VanillaBlocks::JUNGLE_SAPLING()->getId(),
			VanillaBlocks::ACACIA_SAPLING()->getId(),
			VanillaBlocks::DARK_OAK_SAPLING()->getId(),

			# Seeds
			VanillaBlocks::WHEAT()->getId(),
			VanillaBlocks::BEETROOTS()->getId(),
			VanillaBlocks::POTATOES()->getId(),
			VanillaBlocks::CARROTS()->getId(),

			# Stems
			VanillaBlocks::PUMPKIN_STEM()->getId(),
			VanillaBlocks::MELON_STEM()->getId(),

			# Grasses
			VanillaBlocks::FERN()->getId(),
			VanillaBlocks::TALL_GRASS()->getId(),

			# Flowers
			VanillaBlocks::LILAC()->getId(),
			VanillaBlocks::ROSE_BUSH()->getId(),
			VanillaBlocks::PEONY()->getId(),

			# Bamboos
			VanillaBlocks::BAMBOO()->getId(),
			VanillaBlocks::BAMBOO_SAPLING()->getId(),

			# Mushrooms
			VanillaBlocks::RED_MUSHROOM()->getId(),
			VanillaBlocks::BROWN_MUSHROOM()->getId(),

			# Other Crops
			VanillaBlocks::COCOA_POD()->getId(),
			VanillaBlocks::SUGARCANE()->getId(),
			VanillaBlocks::SWEET_BERRY_BUSH()->getId(),
		];
	}
}
