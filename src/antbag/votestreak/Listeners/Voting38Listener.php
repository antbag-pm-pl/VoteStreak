<?php

namespace antbag\votestreak\Listeners;

use kingofturkey38\voting38\events\PlayerVoteEvent;
use antbag\votestreak\Main;

class Voting38Listener implements Listener {
  
  
  public function onVote(PlayerVoteEvent $event) {
    $player = $event->getPlayer();
    Main::getInstance()->addStreak($player);
  
  }
  
}
