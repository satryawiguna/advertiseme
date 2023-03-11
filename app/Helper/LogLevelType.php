<?php

namespace App\Helper;

enum LogLevel: string
{
    case FATAL = "FATAL";
    case ERROR = "ERROR";
    case WARNING = "WARNING";
    case INFO = "INFO";
    case DEBUG = "DEBUG";
    case TRACE = "TRACE";
}
