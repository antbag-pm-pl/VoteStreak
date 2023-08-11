<?php

namespace antbag\VoteStreak;
use antbag\VoteStrek\Listeners\Voting38Listener;
use DateTime;
final class StreakManager{
public function AddStreak(){
  $v38 = $this->Voting38Listener();
  $voteevent = $v38()->onVote();
  $DateTime = $this->DateTime();
  $player = $voteevent->$player();
$playerdata = $this->getDataFolder("PlayerData" . YAML);
  $streak = $playerdata->get("Streak");
  $data = $player->getUUID(); . $streak . $DateTime->TimeNow();
  $playerdata->file_put_Contents($data);

}
 public function SetNil(){
$playerdata = $this->getDataFolder("PlayerData" . YAML);
  $streak = $playerdata->get("Streak");
   $DateTime = $this->DateTime();
  $data = $player->getUUID(); . "0" .  $DateTime->TimeNow();
$dateA = $this->addStreak()->$playerdata(); 


    $dateB = $DateTime->TimeNow();
    $timediff = strtotime($dateA) - strtotime($dateB);

if($timediff > 86400){
   
  $playerdata->file_put_Contents($data);
 
}

