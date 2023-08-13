<?php

namespace antbag\votestreak\Manager;

use antbag\VoteStreak\Listeners\Voting38Listener;
use pocketmine\utils\Config;
use DateTime;
class StreakManager {
  

  public function addStreak(Player $player) {
    $playerName = $player->getName();
    $currentStreak = $this->getCurrentStreak($playerName); 
    $timenow = $this->DateTime::getTimestamp;
    $newStreak = $currentStreak + 1 . $timenow;
    $this->updateStreak($playerName, $newStreak);
  }
  
  private function getCurrentStreak(string $playerName): int {
    $data = new Config($this->getDataFolder() . "streaks.yml", Config::YAML);
    return $data->get($playerName, 0);
  }
  
  private function updateStreak(string $playerName, int $newStreak): void {
  $data = new Config($this->getDataFolder() . "streaks.yml", Config::YAML);
  $data->set($playerName, $newStreak);
  $data->save();
  }
  
  public function onTopStreakPlayer(): ?string {
    $data = new Config($this->getDataFolder() ."streaks.yml", Config::YAML);
    $allStreaks = $data->getAll();
    
    $topPlayer = null;
    $topStreak = -1;
    
    foreach($allStreaks as $playerName => $streak) {
      if($streak > $topStreak) {
        $topStreak = $streak;
        $topPlayer = $playerName;
      }
    }
  }
}
