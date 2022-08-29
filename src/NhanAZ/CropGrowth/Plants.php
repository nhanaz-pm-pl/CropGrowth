<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\block\VanillaBlocks;

class Plants {

	/**
	 * @see https://minecraft.fandom.com/wiki/Bone_Meal#Fertilizer
	 */
	public static function plants(): array {
		return [
			VanillaBlocks::WHEAT(), # Wheat
			VanillaBlocks::CARROTS(), # Carrots
			VanillaBlocks::POTATOES(), # Potatoes

			VanillaBlocks::BEETROOTS(), # Beetroots

			# [https://minecraft.fandom.com/wiki/Bamboo#Data_values]
			VanillaBlocks::BAMBOO(), # Bamboo
			VanillaBlocks::BAMBOO_SAPLING(), # Bamboo Sapling

			VanillaBlocks::MELON_STEM(), # Melon Seeds
			VanillaBlocks::PUMPKIN_STEM(), # Pumpkin Seeds

			# Saplings [https://minecraft.fandom.com/wiki/Sapling#Data_values]
			VanillaBlocks::OAK_SAPLING(), # Oak Sapling
			VanillaBlocks::SPRUCE_SAPLING(), # Spruce Sapling
			VanillaBlocks::BIRCH_SAPLING(), # Birch Sapling
			VanillaBlocks::JUNGLE_SAPLING(), # Jungle Sapling
			VanillaBlocks::ACACIA_SAPLING(), # Acacia Sapling
			VanillaBlocks::DARK_OAK_SAPLING(), # Dark Oak Sapling
			# TODO: Mangrove Propagule
			# TODO: Azalea
			# TODO: Flowering Azalea
			# TODO: Mangrove Propagule (not hanging)

			VanillaBlocks::SUNFLOWER(), # Sunflowers
			VanillaBlocks::LILAC(), # Lilacs
			VanillaBlocks::ROSE_BUSH(), # Rose bushes
			VanillaBlocks::PEONY(), # Peonies

			# Grass(s) [https://minecraft.fandom.com/wiki/Grass#Data_values]
			VanillaBlocks::FERN(), # Ferns (Grass and fern)
			VanillaBlocks::TALL_GRASS(), # Tall Grass (Double Tallgrass and Large Fern)
			# TODO: Seagrass

			# Mushrooms [https://minecraft.fandom.com/wiki/Mushroom#Data_values]
			VanillaBlocks::BROWN_MUSHROOM(), # Brown Mushroom
			VanillaBlocks::RED_MUSHROOM(), # Red Mushroom

			VanillaBlocks::COCOA_POD(), # Cocoa

			VanillaBlocks::SWEET_BERRY_BUSH(), # Sweet berry bush

			VanillaBlocks::SEA_PICKLE(), # Sea Pickle

			VanillaBlocks::SUGARCANE(), # Sugar Cane‌

			# TODO: Kelp

			# Flower [https://minecraft.fandom.com/wiki/Flower#Data_values]
			VanillaBlocks::DANDELION(), # Dandelion
			VanillaBlocks::POPPY(), # Poppy
			VanillaBlocks::BLUE_ORCHID(), # Blue Orchid
			VanillaBlocks::ALLIUM(), # Allium
			VanillaBlocks::AZURE_BLUET(), # Azure Bluet
			VanillaBlocks::RED_TULIP(), # Red Tulip
			VanillaBlocks::ORANGE_TULIP(), # Orange Tulip
			VanillaBlocks::WHITE_TULIP(), # White Tulip
			VanillaBlocks::PINK_TULIP(), # Pink Tulip
			VanillaBlocks::OXEYE_DAISY(), # Oxeye Daisy
			VanillaBlocks::CORNFLOWER(), # Cornflower
			VanillaBlocks::LILY_OF_THE_VALLEY(), # Lily of the Valley
			# TODO: Wither Rose [Java Only]
			# Sunflower [Imported]
			# Lilac [Imported]
			# Rose Bush [Imported]
			# Peony [Imported]

			# TODO: Fungus

			# TODO: Weeping Vines

			# TODO: Twisting Vines

			# TODO: Cave Vines

			# TODO: Glow Lichen

			# TODO: Moss Block

			# TODO: Big Dripleaf
			# TODO: Small Dripleaf

			VanillaBlocks::DIRT(), # Dirt (Rooted Dirt)

			# TODO: Mangrove Leaves

			# Mangrove Propagule [Mentioned]

			VanillaBlocks::GRASS(), # Grass Block
		];
	}
}
