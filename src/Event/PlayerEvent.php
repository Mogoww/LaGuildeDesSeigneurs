<?php
namespace App\Event;
use App\Entity\Player;
use Symfony\Contracts\EventDispatcher\Event;

class PlayerEvent extends Event{
    
    public const PLAYER_MODIFY = 'app.player.modify';
    protected $player;
    public function __construct(Player $player){
        $this->player = $player;
    }
    
    public function getPlayer(){
        return $this->player;
    }


}
