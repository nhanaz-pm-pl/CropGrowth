<?php

declare(strict_types=1);

namespace NhanAZ\CropGrowth;

use pocketmine\block\Grass;
use pocketmine\math\Vector3;
use pocketmine\event\Listener;
use pocketmine\item\Fertilizer;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\world\particle\HappyVillagerParticle;

/**
 * Class Main
 * @package NhanAZ\CropGrowth
 */
class Main extends PluginBase implements Listener
{

	/**
	 * @return void
	 */
	protected function onEnable(): void
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/**
	 * @param PlayerInteractEvent $event
	 *
	 * @priority HIGHEST
	 */
	public function onPlayerInteract(PlayerInteractEvent $event)
	{
		$block = $event->getBlock();
		$particle = new HappyVillagerParticle();
		$getBlockPosition = $block->getPosition();
		$getWorld = $getBlockPosition->getWorld();
		$rightClickBlock = PlayerInteractEvent::RIGHT_CLICK_BLOCK;
		if ($block instanceof Grass) {
			if ($event->getItem() instanceof Fertilizer) {
				if ($event->getAction() === $rightClickBlock) {
					do {
						$z1 = mt_rand(5, 20) / 10;
						$y1 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add(0.5, $y1, $z1);
						$getWorld->addParticle($vector, $particle);

						$x1 = mt_rand(-20, 5) / 10;
						$z2 = mt_rand(5, 20) / 10;
						$y2 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add($x1, $y2, $z2);
						$getWorld->addParticle($vector, $particle);

						$x3 = mt_rand(-20, 5) / 10;
						$y3 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add($x3, $y3, 0.5);
						$getWorld->addParticle($vector, $particle);

						$x4 = mt_rand(-20, 5) / 10;
						$z3 = mt_rand(-20, 5) / 10;
						$y4 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add($x4, $y4, $z3);
						$getWorld->addParticle($vector, $particle);

						$z4 = mt_rand(-20, 5) / 10;
						$y5 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add(0.5, $y5, $z4);
						$getWorld->addParticle($vector, $particle);

						$x5 = mt_rand(5, 20) / 10;
						$z5 = mt_rand(-20, 5) / 10;
						$y6 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add($x5, $y6, $z5);
						$getWorld->addParticle($vector, $particle);

						$x6 = mt_rand(5, 20) / 10;
						$y7 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add($x6, $y7, 0.5);
						$getWorld->addParticle($vector, $particle);

						$x7 = mt_rand(5, 20) / 10;
						$z6 = mt_rand(5, 20) / 10;
						$y8 = mt_rand(11, 21) / 10;
						$vector = $getBlockPosition->add($x7, $y8, $z6);
						$getWorld->addParticle($vector, $particle);
						/** @phpstan-ignore-next-line */
					} while (false);
				}
			}
		}
	}
}
