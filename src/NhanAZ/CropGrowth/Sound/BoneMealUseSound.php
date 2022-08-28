<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth\Sound;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\types\LevelEvent;
use pocketmine\world\sound\Sound;

class BoneMealUseSound implements Sound {

	private const EVENT_DATA = 0;

	public function encode(Vector3 $vector3): array {
		return [LevelEventPacket::create(LevelEvent::BONE_MEAL_USE, self::EVENT_DATA, $vector3)];
	}
}
