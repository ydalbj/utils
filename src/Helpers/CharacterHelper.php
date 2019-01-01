<?php
namespace Ydalbj\Utils\Helpers;

class CharacterHelper
{
    /**
     * Bytes格式化成可读格式kb,mb,gb...
     * @param int $size Bytes个数
     * @return string $result xx mb
     */
    public function formatBytes(int $size)
    {
        $unit=array('b','kb','mb','gb','tb','pb');
        return round($size / pow(1024, ($i=floor(log($size, 1024)))), 2).' '.$unit[$i];
    }

    /**
     * 编码转换防止在cmd下乱码
     */
    public function cmdPrint(string $str)
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            echo(iconv("UTF-8", "GB2312//IGNORE", $str)) . PHP_EOL;
        } else {
            echo($str . PHP_EOL);
        }
    }
}
