<?php

namespace antbag\VoteStreak;
use antbag\VoteStrek\Listeners\Voting38Listener;
final class StreakManager{
  
public function AddStreak();
  $v38 = $this->Voting38Listener();
  $voteevent = $v38()->onVote();
  $player = $voteevent->$player();


}
