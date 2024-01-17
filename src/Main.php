<?php

declare(strict_types=1);

namespace Nay\Afk;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerJumpEvent;
use pocketmine\event\player\PlayerToggleSneakEvent;
use pocketmine\plugin\PluginBase;

use pocketmine\scheduler\ClosureTask;

class Main extends PluginBase implements Listener{

    /** @var int[] */

    private $lastMoveTime = [];

    public function onEnable() : void{

    $this->getServer()->getPluginManager()->registerEvents($this, $this);

    $this->getScheduler()->scheduleRepeatingTask(new ClosureTask(function() : void{

        $timeout = $this->getConfig()->get("afk-timeout"); //temps en secondes avant de kicker un joueur inactif

        $message = $this->getConfig()->get("kick-message"); //message à afficher au joueur kické

        $worlds = $this->getConfig()->get("worlds", []); //liste des mondes à ignorer

        foreach($this->getServer()->getOnlinePlayers() as $player){

            if(!$player->hasPermission("afk.kick")){ //vérifie si le joueur a la permission de ne pas être kické

                if(!in_array($player->getWorld()->getFolderName(), $worlds)){ //vérifie si le monde du joueur n'est pas dans la liste des mondes à ignorer

                    if(time() - ($this->lastMoveTime[$player->getId()] ?? time()) >= $timeout){ //vérifie si le joueur n'a pas bougé depuis le temps défini

                        $player->kick($message); //kicke le joueur avec le message

                    }

                }

            }

        }

    }), 20); //répète la tâche toutes les secondes

}

public function onPlayerMove(PlayerMoveEvent $event) : void{
    $player = $event->getPlayer();
    $this->lastMoveTime[$player->getId()] = time(); //met à jour le    public function onPlayerSaute(PlayerJumpEvent $event) : void{

   $player = $event->getPlayer();

    $this->lastMoveTime[$player->getId()] = time(); //met à jour le temps du dernier mouvement du joueur

}
       public function onPlayerSneak(PlayerToggleSneakEvent $event) : void{
           if($this->getConfig()->get("sneak")) {
   $player = $event->getPlayer();
    $this->lastMoveTime[$player->getId()] = time(); //met à jour le temps du dernier mouvement du joueur
}
              }
    public function onPlayerSaute(PlayerJumpEvent $event) : void{
        if($this->getConfig()->get("jump")) {
   $player = $event->getPlayer();
    $this->lastMoveTime[$player->getId()] = time(); //met à jour le temps du dernier mouvement du joueur
}
    }
}
