<?php

namespace Shaygan\TelegramBotApiBundle\Type;

use TelegramBot\Api\Types\Message;

class Update extends Type
{

    /**
     *
     * @var integer
     */
    public $update_id;

    /**
     *
     * @var Message
     */
    public $message;

    public function loadResult(\stdClass $obj)
    {
        parent::loadResult($obj);

//        if (isset($obj->message)) {
//            $this->message = new Message();
//            $this->message->fromResponse($obj->message);
//        }
    }

}
