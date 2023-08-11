<?php

namespace antbag\votestreak\Listeners;

use kingofturkey38\voting38\events\PlayerVoteEvent;
use antbag\VoteStreak\Manager\StreakManager;
class Voting38Listener implements Listener {
  
  public function onVote(PlayerVoteEvent $event) {
   $player = $event()->getPlayer();
    $addstreak = $this->StreakManager();
    $player->addStreak(1);
    
  }
  
}
