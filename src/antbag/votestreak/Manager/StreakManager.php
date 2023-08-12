<?php

namespace antbag\VoteStreak;
use antbag\VoteStrek\Listeners\Voting38Listener;
use DateTime;

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
  
/**public function AddStreak(){
  $v38 = $this->Voting38Listener();
  $voteevent = $v38()->onVote();
  $dateTine = $this->DateTime();
  $player = $voteevent->$player();
$playerdata = $this->getDataFolder("PlayerData" . YAML);
  $streak = $playerdata->get("Streak");
  $timenow = $dateTime->timeNow();
  $puid = $player->getUUID();
  $data = $puid . $streak . $timenow
  $playerdata()->file_put_Contents($data);

}
**/

 public function SetNil(){
$playerdata = $this->getDataFolder("PlayerData" . YAML);
  $streak = $playerdata->get("Streak");
   $DateTime = $this->DateTime();
  $data = $player->getUUID() . "0" .  $DateTime->TimeNow();
$dateA = $this->addStreak()->$playerdata(); 


    $dateB = $DateTime->TimeNow();
    $timediff = strtotime($dateA) - strtotime($dateB);

if($timediff > 86400){
   
  $playerdata->file_put_Contents($data);
 
}
 }
}

