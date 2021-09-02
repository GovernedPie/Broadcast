<?php

namespace announce\tasks;
 use pocketmine\scheduler\Task;
 use pocketmine\Server;
 use pocketmine\utils\TextFormat;

 class AnnouncementTask extends Task{
     public function onRun(int $currentTick): void{
         Server::getInstance()->broadcastMessage(TextFormat::AQUA . "Hello, \n world!");

     }
 }