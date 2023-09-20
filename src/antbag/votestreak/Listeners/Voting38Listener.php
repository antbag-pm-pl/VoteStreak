<?php

namespace antbag\votestreak\Listeners;

use kingofturkey38\voting38\events\PlayerVoteEvent;
use antbag\votestreak\Main;

class Voting38Listener extends Listener {
  
  
  public function onVote(PlayerVoteEvent $event) {
    $player = $event->getPlayer();
    Main::getInstance()->addStreak($player);
    /*
    $player = $event()->getPlayer();
    $addstreak = $this->StreakManager();
     $player->addStreak();
     */
  }
  
}
