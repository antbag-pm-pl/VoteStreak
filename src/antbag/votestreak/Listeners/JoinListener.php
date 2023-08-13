<?php

namespace antbag\votestreak;

use pocketmine\event\PlayerJoinEvent;
use pocketmine\event\Listener;
use antbag\votestreak\Manager\StreakManager;
use DateTime;

final class JoinListener implements {PlayerJoinEvent,Listener}{
public function onJoin($event PlayerJoinEvent): void {
$player = $event->getPlayer();
  $ptime = $player->getCurrentStreak();
  $timeNow = $this->DateTime()->timeNow();
  if ($ptime(TimeStamp); !<= $imenoww - 86400){
    $player->StreakManager()->updateStreak(0);
    }
}

}
