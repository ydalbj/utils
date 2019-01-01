<?php
namespace Tests\Helpers;

use Tests\TestCase;
use Ydalbj\Utils\Helpers\DateTimeHelper;

class DateTimeHelperTest extends TestCase
{
    /**
     * 测试 DateTimeHelper::formatMicrotime方法
     */
    public function testFormatMicrotime()
    {
        $microtime = -microtime(true);
        \sleep(1);
        $microtime += microtime(true);
        $result = DateTimeHelper::formatMicrotime($microtime);

        $this->assertRegExp('/^\d+:\d{2}:\d{2}(.\d+)*$/', $result);
    }

    /**
     * 测试 DateTimeHelper::formatTime
     */
    public function testFormatTime()
    {
        $time = 3661;
        $result = DateTimeHelper::formatTime($time);

        $this->assertEquals('1:01:01', $result);
    }
}
