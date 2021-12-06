<?php

declare(strict_types=1);

namespace NhanAZ\FertilizerParticles;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\world\particle\HappyVillagerParticle;

class Main extends PluginBase implements Listener
{

	public function onEnable() : void
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onPlayerInteract(PlayerInteractEvent $event)
	{

		$item = $event->getItem()->getId();
		$block = $event->getBlock();

		if ($event->getBlock()->getId() == 2) {
			if ($item == 351) {
				if($event->getAction() === PlayerInteractEvent::RIGHT_CLICK_BLOCK) {
					do {
						$z1 = mt_rand(5, 20) / 10;
						$y1 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add(0.5, $y1, $z1);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->addParticle($summon_particle);

						$x1 = mt_rand(-20, 5) / 10;
						$z2 = mt_rand(5, 20) / 10;
						$y2 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add($x1, $y2, $z2);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->getWorld()->addParticle($summon_particle);

						$x3 = mt_rand(-20, 5) / 10;
						$y3 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add($x3, $y3, 0.5);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->getWorld()->addParticle($summon_particle);

						$x4 = mt_rand(-20, 5) / 10;
						$z3 = mt_rand(-20, 5) / 10;
						$y4 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add($x4, $y4, $z3);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->getWorld()->addParticle($summon_particle);

						$z4 = mt_rand(-20, 5) / 10;
						$y5 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add(0.5, $y5, $z4);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->getWorld()->addParticle($summon_particle);

						$x5 = mt_rand(5, 20) / 10;
						$z5 = mt_rand(-20, 5) / 10;
						$y6 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add($x5, $y6, $z5);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->getWorld()->addParticle($summon_particle);

						$x6 = mt_rand(5, 20) / 10;
						$y7 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add($x6, $y7, 0.5);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->getWorld()->addParticle($summon_particle);

						$x7 = mt_rand(5, 20) / 10;
						$z6 = mt_rand(5, 20) / 10;
						$y8 = mt_rand(11, 21) / 10;
						$coordinates_particle = $block->getPosition()->add($x7, $y8, $z6);
						$summon_particle = new HappyVillagerParticle($coordinates_particle);
						$block->getWorld()->addParticle($summon_particle);
					/** @phpstan-ignore-next-line */
					}while(false);
				}
			}
		}
	}
}
