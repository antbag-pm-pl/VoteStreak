<?php

namespace antbag\votestreak;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use antbag\votestreak\Manager\StreakManager;
use DateTime;

class JoinListener implements Listener{
public function onJoin(PlayerJoinEvent $event): void {
$player = $event->getPlayer();
  $ptime = $player->getCurrentStreak();
  $timeNow = $this->DateTime()->timeNow();
  if ($ptime()->timeStamp(); !<= $timenoww - 86400){
    $player->StreakManager()->updateStreak(0);
    }
}

}
