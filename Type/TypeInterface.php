<?php

namespace Shaygan\TelegramBotApiBundle\Type;

interface TypeInterface
{
    /**
     * @param \stdClass $obj
     */
    public function loadResult(\stdClass $obj);
}
