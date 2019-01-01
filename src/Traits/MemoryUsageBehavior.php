<?php
namespace Ydalbj\Utils\Traits;

use Ydalbj\Utils\Helpers\CharacterHelper;


trait MemoryUsageBehavior
{
    /**
     * 获取内存占用
     */
    public function getMemoryUsage()
    {
        return CharacterHelper::formatBytes(memory_get_usage(true));
    }
}
