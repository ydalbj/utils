<?php
namespace Ydalbj\Utils\Helpers;

use Ydalbj\Utils\Helpers\CommonHelper;
use Tests\TestCase;

class CommonHelperTest extends TestCase
{
    public function testInt2String()
    {
        $int = 2;

        $string = CommonHelper::int2String($int);

        $this->assertEquals('2', $string);
    }
}
