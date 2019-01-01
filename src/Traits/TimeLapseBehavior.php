<?php
namespace Ydalbj\Utils\Traits;

use Ydalbj\Utils\Helpers\DateTimeHelper;


trait TimeLapseBehavior
{
    /**
     * 程序耗时记录
     * @var array
     */
    private $timeLapseRecord;

    /**
     * hrtime() 函数是否存在（php7.3版本以上）
     * @var bool
     */
    private $isHrtimeExists;

    /**
     * 开始记录时间
     * @param string $name 时间记录标示
     * @return void
     */
    public function startRecordTime(string $name = 'default')
    {
        $this->timeLapseRecord[$name] = $this->getMicroTime();
    }

    /**
     * 获取执行时间
     * @param string $name 时间记录标示
     * @param bool $reset 是否重置开始记录时间
     * @return string $time 执行时间 (h:i:s.microseconds)
     */
    public function getElapsedTime(string $name = 'default', bool $reset = false)
    {
        if (!isset($this->timeLapseRecord[$name])) {
            throw new \RuntimeException('you should call `$this->startRecordTime("' . $name . '");` first!');
        }

        $microtime = $this->getMicroTime() - $this->timeLapseRecord[$name];

        return DateTimeHelper::formatMicrotime($microtime);
    }

    /**
     * 输出执行时间
     * @param string $position 程序执行位置
     * @param string $name 时间记录标示
     * @param bool $reset 是否重置开始记录时间
     */
    public function echoElapsedTime(string $position, string $name = 'default', bool $reset = false)
    {
        $time = $this->getElapsedTime($name, $reset);

        return "position:{$position}, time lapsed,{$time}" . PHP_EOL;
    }

    /**
     * 获取时间(秒数.毫秒)
     * @return float $time 时间(hrtime:counted from an arbitrary point in time)
     */
    private function getMicroTime()
    {
        if (!isset($this->isHrtimeExists)) {
            $this->isHrtimeExists = function_exists('hrtime');
        }

        return $this->isHrtimeExists ? hrtime(true) / (1e+9) : microtime(true);
    }
}
