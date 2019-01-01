<?php
namespace Ydalbj\Utils\Helpers;

class DateTimeHelper
{
    /**
     * 时间格式化成可读格式H:M:S.microseconds
     * @param int $microtime 时间(毫秒)
     * @return string $format
     */
    public static function formatMicrotime(float $microtime)
    {
        $milliseconds = strstr($microtime, '.') ?: '';
        $seconds = intval($microtime);
        return static::formatTime($seconds) . substr($milliseconds, 0, 3);
    }

    /**
     * 秒时间格式化成可读格式H:M:S
     * @param int $time 时间(秒)
     * @return string $format
     */
    public static function formatTime(int $time)
    {
        $hours = intval($time / 3600);
        $minutes_seconds = \gmstrftime('%M:%S', $time % 3600);

        return "{$hours}:" . $minutes_seconds;
    }
}
