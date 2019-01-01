<?php
namespace Tests\Traits;

use Tests\TestCase;
use Ydalbj\Utils\Traits\TimeLapseBehavior;

class TimeLapseBehaviorTest extends TestCase
{
    /**
     * mock object of trait TimeLapseBehavior
     * @var objct
     */
    private $trait;

    public function setup()
    {
        $this->trait = $this->getMockForTrait(TimeLapseBehavior::class);
    }

    /**
     * 测试开始记录时间行为
     * 期待正确获取执行时间
     */
    public function testStartRecordTime()
    {
        $this->trait->startRecordTime();
        $result = $this->trait->getElapsedTime();

        $this->assertRegExp('/^\d+:\d{2}:\d{2}(.\d+)*$/', $result);
    }

    /**
     * 测试没有开始记录时间行为
     * 期待跑出异常
     * @expectedException \RuntimeException
     */
    public function testNotStartRecordTime()
    {
        $result = $this->trait->getElapsedTime();
    }
}
