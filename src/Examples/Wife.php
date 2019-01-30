<?php 
namespace App\Examples;

class Wife {
    protected $jokeName;
    protected static $instance;

    /**
     * We want to prohibit the instanciation so we set the constructor to private
     *
     * @param string $jokeName For the example and the funny part
     */
    private function __construct($jokeName) {
        $this->jokeName = $jokeName;
    }

    /**
     * This method handle the Wife instance and ensure that we have only one
     *
     * @return App\Examples\Wife 
     */
    public static function getInstance() : Wife {
        if (is_null(self::$instance)) {
            self::$instance = new Wife("Darling");
        }
        return self::$instance;
    }
    
    /**
     * Funny action for faithful guys
     *
     * @return void
     */
    public function sayLove() : string {
        return \sprintf("Thanks for being faithful %s. I love you.", $this->jokeName);
    }

    /**
     * Funny action for unfaithful guys
     *
     * @return void
     */
    public function sayFuck() : string {
        return "You can't cheat on me, bastard !";
    }

    /**
     * Funny action for smarter guys
     *
     * @return void
     */
    public function sayIamTheSame() : string {
        return \sprintf("Yes %s. Unfortunately, I'm still your wife.", $this->jokeName);
    }
} 