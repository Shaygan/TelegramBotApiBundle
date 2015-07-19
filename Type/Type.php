<?php

namespace Shaygan\TelegramBotApiBundle\Type;

abstract class Type implements TypeInterface
{

    /**
     * @param \stdClass $obj
     */
    public function __construct(\stdClass $obj = null)
    {
        if ($obj instanceof \stdClass) {
            $this->loadResult($obj);
        }
    }

    /**
     * @param \stdClass $obj
     */
    public function loadResult(\stdClass $obj)
    {
        foreach ($obj as $key => $value) {
            $this->$key = $value;
        }
    }

}
