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
			VanillaBlocks::WHEAT()->getTypeId(), # Wheat
			VanillaBlocks::CARROTS()->getTypeId(), # Carrots
			VanillaBlocks::POTATOES()->getTypeId(), # Potatoes

			VanillaBlocks::BEETROOTS()->getTypeId(), # Beetroots

			# [https://minecraft.fandom.com/wiki/Bamboo#Data_values]
			VanillaBlocks::BAMBOO()->getTypeId(), # Bamboo
			VanillaBlocks::BAMBOO_SAPLING()->getTypeId(), # Bamboo Sapling

			VanillaBlocks::MELON_STEM()->getTypeId(), # Melon Seeds
			VanillaBlocks::PUMPKIN_STEM()->getTypeId(), # Pumpkin Seeds

			# Saplings [https://minecraft.fandom.com/wiki/Sapling#Data_values]
			VanillaBlocks::OAK_SAPLING()->getTypeId(), # Oak Sapling
			VanillaBlocks::SPRUCE_SAPLING()->getTypeId(), # Spruce Sapling
			VanillaBlocks::BIRCH_SAPLING()->getTypeId(), # Birch Sapling
			VanillaBlocks::JUNGLE_SAPLING()->getTypeId(), # Jungle Sapling
			VanillaBlocks::ACACIA_SAPLING()->getTypeId(), # Acacia Sapling
			VanillaBlocks::DARK_OAK_SAPLING()->getTypeId(), # Dark Oak Sapling
			# TODO: Mangrove Propagule
			# TODO: Azalea
			# TODO: Flowering Azalea
			# TODO: Mangrove Propagule (not hanging)

			VanillaBlocks::SUNFLOWER()->getTypeId(), # Sunflowers
			VanillaBlocks::LILAC()->getTypeId(), # Lilacs
			VanillaBlocks::ROSE_BUSH()->getTypeId(), # Rose bushes
			VanillaBlocks::PEONY()->getTypeId(), # Peonies

			# Grass(s) [https://minecraft.fandom.com/wiki/Grass#Data_values]
			VanillaBlocks::FERN()->getTypeId(), # Ferns (Grass and fern)
			VanillaBlocks::TALL_GRASS()->getTypeId(), # Tall Grass (Double Tallgrass and Large Fern)
			# TODO: Seagrass

			# Mushrooms [https://minecraft.fandom.com/wiki/Mushroom#Data_values]
			VanillaBlocks::BROWN_MUSHROOM()->getTypeId(), # Brown Mushroom
			VanillaBlocks::RED_MUSHROOM()->getTypeId(), # Red Mushroom

			VanillaBlocks::COCOA_POD()->getTypeId(), # Cocoa

			VanillaBlocks::SWEET_BERRY_BUSH()->getTypeId(), # Sweet berry bush

			# TODO: Sea Pickle

			VanillaBlocks::SUGARCANE()->getTypeId(), # Sugar Cane‌

			# TODO: Kelp

			# Flower [https://minecraft.fandom.com/wiki/Flower#Data_values]
			VanillaBlocks::DANDELION()->getTypeId(), # Dandelion
			VanillaBlocks::POPPY()->getTypeId(), # Poppy
			VanillaBlocks::BLUE_ORCHID()->getTypeId(), # Blue Orchid
			VanillaBlocks::ALLIUM()->getTypeId(), # Allium
			VanillaBlocks::AZURE_BLUET()->getTypeId(), # Azure Bluet
			VanillaBlocks::RED_TULIP()->getTypeId(), # Red Tulip
			VanillaBlocks::ORANGE_TULIP()->getTypeId(), # Orange Tulip
			VanillaBlocks::WHITE_TULIP()->getTypeId(), # White Tulip
			VanillaBlocks::PINK_TULIP()->getTypeId(), # Pink Tulip
			VanillaBlocks::OXEYE_DAISY()->getTypeId(), # Oxeye Daisy
			VanillaBlocks::CORNFLOWER()->getTypeId(), # Cornflower
			VanillaBlocks::LILY_OF_THE_VALLEY()->getTypeId(), # Lily of the Valley
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

			# TODO: Rooted Dirt

			# TODO: Rooted Dirt

			# Mangrove Propagule [Mentioned]

			VanillaBlocks::GRASS()->getTypeId(), # Grass Block
		];
	}
}
