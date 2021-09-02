<?php

namespace announce;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use announce\tasks\AnnouncementTask;
class Loader extends PluginBase{
    public function onEnable()
    {
        $this->getLogger()->info("Announcement Enabled");
        $this->getScheduler()->scheduleRepeatingTask(new AnnouncementTask(), 20 * 10);
    }

    public function onLoad()
    {
        $this->getLogger()->info("Announcement Loading");
    }

    public function onDisable()
    {
        $this->getLogger()->info("Announcement Disabled");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        switch ($cmd->getName()) {
            case "announce":
                if (!$sender->isOp()) {
                    $sender->sendMessage(TextFormat::RED . "You dont have permission to run this command!");
                    return false;
                }
                $this->getScheduler()->scheduleRepeatingTask(new AnnouncementTask(), 20 * 10);
                return false;
        }
        return true;
    }
}