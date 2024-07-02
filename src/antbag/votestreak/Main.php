<?php

namespace antbag\votestreak;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use CortexPE\Commando\PacketHooker;
use antbag\votestreak\Listeners\Voting38Listener;
use antbag\votestreak\Commands\StreakCommand;
use pocketmine\player\Player;
use SQLite3;

class Main extends PluginBase {

    private $db;
    public static $instance;

    public function onEnable(): void {
        self::$instance = $this;
        $this->initDatabase();
        if(!PacketHooker::isRegistered()) {
            PacketHooker::register($this);
        }
        $this->getServer()->getCommandMap()->register("VoteStreak", new StreakCommand($this, "streak", "See your streaks"));
        $this->getServer()->getPluginManager()->registerEvents(new Voting38Listener($this), $this);
    }

    public function onDisable(): void {
        $this->db->close();
    }

    private function initDatabase(): void {
        $this->db = new SQLite3($this->getDataFolder() . "streaks.db");
        $this->db->exec("CREATE TABLE IF NOT EXISTS streaks (playerName TEXT PRIMARY KEY, streak INTEGER)");
    }

    public function addStreak(Player $player): void {
        $playerName = $player->getName();
        $currentStreak = $this->getCurrentStreak($playerName);
        $newStreak = $currentStreak + 1;
        $this->updateStreak($playerName, $newStreak);
    }

    public function resetStreak(string $playerName): void {
        $stmt = $this->db->prepare("UPDATE streaks SET streak = 0 WHERE playerName = :playerName");
        $stmt->bindValue(":playerName", $playerName, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function getCurrentStreak(string $playerName): int {
        $stmt = $this->db->prepare("SELECT streak FROM streaks WHERE playerName = :playerName");
        $stmt->bindValue(":playerName", $playerName, SQLITE3_TEXT);
        $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
        return $result ? (int) $result["streak"] : 0;
    }

    public function updateStreak(string $playerName, int $newStreak): void {
        $stmt = $this->db->prepare("INSERT OR REPLACE INTO streaks (playerName, streak) VALUES (:playerName, :streak)");
        $stmt->bindValue(":playerName", $playerName, SQLITE3_TEXT);
        $stmt->bindValue(":streak", $newStreak, SQLITE3_INTEGER);
        $stmt->execute();
    }

    public static function getInstance(): Main {
        return self::$instance;
    }
}
