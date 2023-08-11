<?php

namespace antbag\VoteStreak;
use antbag\VoteStrek\Listeners\Voting38Listener;
final class StreakManager{
public function AddStreak();
  $v38 = $this->Voting38Listener();
  $voteevent = $v38()->onVote();
  $player = $voteevent->$player();
$playerdata = $this->getDataFolder("PlayerData" . YAML);
  $streak = $playerdata->get("Streak");
  $data = $player->getUUID(); . $streak 
  $playerdata->file_put_Contents($data);

}
