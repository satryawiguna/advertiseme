<?php

namespace App\Helper;

enum MessageType: string
{
    case SUCCESS = "SUCCESS";
    case INFO = "INFO";
    case WARNING = "WARNING";
    case ERROR = "ERROR";
}
