<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Particle;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\world\particle\Particle;

class CropGrowthParticle implements Particle {

	private const CROP_GROWTH = 0;
	private const DATA = 0;

	public function encode(Vector3 $vector3): array {
		return [LevelEventPacket::standardParticle(self::CROP_GROWTH, self::DATA, $vector3)];
	}
}
