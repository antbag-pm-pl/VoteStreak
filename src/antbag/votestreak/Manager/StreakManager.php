<?php

namespace antbag\VoteStreak;
use antbag\VoteStrek\Listeners\Voting38Listener;
use DateTime;
use pocketmine\player\Player;

final class StreakManager {
  
  public function addStreak(Player $player) {
    $name = $player->getName();
    
    $data = new Config($this->getDataFolder() ."_data/streaks.yml", Config::YAML);
    $up = $data->get($name);
    $data->set($name, $up + 1);
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

