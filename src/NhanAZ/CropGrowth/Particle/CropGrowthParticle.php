<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Particle;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\world\particle\Particle;

class CropGrowthParticle implements Particle {

	public function encode(Vector3 $vector3) : array {
		return [LevelEventPacket::standardParticle(
			particleId: 0,
			data: 0,
			position: $vector3
		)];
	}
}
