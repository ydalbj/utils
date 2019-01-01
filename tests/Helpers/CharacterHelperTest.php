<?php
namespace Tests\Helpers;

use Ydalbj\Utils\Helpers\CharacterHelper;
use Tests\TestCase;

class CharacterHelperTest extends TestCase
{
    /**
     * 测试格式化bytes成可读格式
     */
    public function testFormatBytes()
    {
        $result = CharacterHelper::formatBytes(1024);
        $this->assertEquals('1 kb', $result);

        $result = CharacterHelper::formatBytes(pow(1024, 2));
        $this->assertEquals('1 mb', $result);

        $result = CharacterHelper::formatBytes(pow(1024, 3));
        $this->assertEquals('1 gb', $result);
    }
}
