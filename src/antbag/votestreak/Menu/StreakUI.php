<?php

namespace antbag\votestreak\Menu;

use pocketmine\player\Player;
use antbag\votestreak\StreakManager;
class StreakUI {
  
  public function StreakUI(Player $player) {
    $form = new SimpleForm(function(Player $player, int $data): void {
      if($data !== null) {
        
      }
    });
    $form->setTitle("VoteStreaks");
    $form->setContent("Your current VoteStreak: " .$player->getStreak());
    $form->sendToPlayer($player);
  }
  public function getStreak() {
    $streakManager = $this->StreakManager();
    $this->getCurrentStreak($streakManager);
    return true;
  }
}
