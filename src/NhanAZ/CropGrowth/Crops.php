<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\block\VanillaBlocks;

class Crops {

	public static function crops(): array {
		return [
			# Blocks
			VanillaBlocks::GRASS()->getTypeId(),

			# Flowers
			VanillaBlocks::DANDELION()->getTypeId(),
			VanillaBlocks::POPPY()->getTypeId(),
			VanillaBlocks::BLUE_ORCHID()->getTypeId(),
			VanillaBlocks::ALLIUM()->getTypeId(),
			VanillaBlocks::AZURE_BLUET()->getTypeId(),
			VanillaBlocks::RED_TULIP()->getTypeId(),
			VanillaBlocks::ORANGE_TULIP()->getTypeId(),
			VanillaBlocks::WHITE_TULIP()->getTypeId(),
			VanillaBlocks::PINK_TULIP()->getTypeId(),
			VanillaBlocks::OXEYE_DAISY()->getTypeId(),
			VanillaBlocks::CORNFLOWER()->getTypeId(),
			VanillaBlocks::LILY_OF_THE_VALLEY()->getTypeId(),

			# Saplings
			VanillaBlocks::OAK_SAPLING()->getTypeId(),
			VanillaBlocks::SPRUCE_SAPLING()->getTypeId(),
			VanillaBlocks::BIRCH_SAPLING()->getTypeId(),
			VanillaBlocks::JUNGLE_SAPLING()->getTypeId(),
			VanillaBlocks::ACACIA_SAPLING()->getTypeId(),
			VanillaBlocks::DARK_OAK_SAPLING()->getTypeId(),

			# Seeds
			VanillaBlocks::WHEAT()->getTypeId(),
			VanillaBlocks::BEETROOTS()->getTypeId(),
			VanillaBlocks::POTATOES()->getTypeId(),
			VanillaBlocks::CARROTS()->getTypeId(),

			# Stems
			VanillaBlocks::PUMPKIN_STEM()->getTypeId(),
			VanillaBlocks::MELON_STEM()->getTypeId(),

			# Grasses
			VanillaBlocks::FERN()->getTypeId(),
			VanillaBlocks::TALL_GRASS()->getTypeId(),

			# Flowers
			VanillaBlocks::LILAC()->getTypeId(),
			VanillaBlocks::ROSE_BUSH()->getTypeId(),
			VanillaBlocks::PEONY()->getTypeId(),
			VanillaBlocks::SUNFLOWER()->getTypeId(),

			# Bamboos
			VanillaBlocks::BAMBOO()->getTypeId(),
			VanillaBlocks::BAMBOO_SAPLING()->getTypeId(),

			# Mushrooms
			VanillaBlocks::RED_MUSHROOM()->getTypeId(),
			VanillaBlocks::BROWN_MUSHROOM()->getTypeId(),

			# Other Crops
			VanillaBlocks::COCOA_POD()->getTypeId(),
			VanillaBlocks::SUGARCANE()->getTypeId(),
			VanillaBlocks::SWEET_BERRY_BUSH()->getTypeId(),
		];
	}
}
