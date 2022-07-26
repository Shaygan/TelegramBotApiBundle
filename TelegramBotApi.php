<?php

/**
 * Description of TelegramBotApi
 *
 * @author iman
 */

namespace Shaygan\TelegramBotApiBundle;

use Symfony\Component\DependencyInjection\Container;
use TelegramBot\Api\BotApi;

class TelegramBotApi
{

    private $telegram;
    private $old_api;
    private $config;

    public function __construct(Container $container)
    {
        $this->config = $container->getParameter('shaygan_telegram_bot_api.config');

        if ($this->config['legacy'] === false) {
            $this->telegram = new \Longman\TelegramBot\Telegram($this->config['token'], $this->config['bot_name']);
        } else {
            $this->old_api = new BotApi($this->config['token']);
        }
    }

    public function __call($name, $arguments)
    {
       if ($this->config['legacy'] === true) {
            call_user_method($name, $this->old_api, $arguments);
        }
        else{
         	if(method_exists($this->telegram,$name)){
        		return $this->telegram->$name(implode(',',$arguments));
        	}else{
        		return TGRequest::$name($arguments[0]);
        	}
        }
    }

}
