<?php

namespace antbag\VoteStreak\Manager;

use antbag\VoteStrek\Listeners\Voting38Listener;

final class StreakManager {
  

  public function addStreak(Player $player) {
    $playerName = $player->getName();
    $currentStreak = $this->getCurrentStreak($playerName);
    $newStreak = $currentStreak + 1;
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