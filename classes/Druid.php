<?php


namespace classes;


class Druid extends Character
{
    private $forest_buff = False;
    private $buff_time = 3;

    public function attack(Character $target) {
        if ($this->buff_time == 0)
        {
            $this->forest_buff = False;
            $this->buff_time = 3;
        }
        $rand = rand(1, 10);
        if ($rand == 1) {
            return $this->heal();
        } else if ($rand >7  AND !$this->forest_buff) {
            return $this->buff();
        } else {
        return $this->duffup($target);
        }
    }

    private function duffup(Character $target) {
        $attack = rand(4, 12);
        if ($this->forest_buff==True) {
            $rand = 1.5;
            $attack *= $rand;
            $this->buff_time -= 1;
        }
        $target->setLifePoints($attack);
        $status = "$this->name asséne un violent coup de baton à {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";
        return $status;
    }

    private function heal() {
        if ($this->forest_buff == True) {
            $this->buff_time -= 1;
        }
        $this->lifePoints = 100;
        $status = "{$this->name} s'est soigné et récupéré tous ses points de vie! '";
        return $status;
    }

    private function buff() {
        $this->forest_buff = True;
        $this->buff_time = 3;
        $status = "{$this->name} invoque la force de la forêt, ses dégats sont augmentés ! '";
        return $status;
    }
}