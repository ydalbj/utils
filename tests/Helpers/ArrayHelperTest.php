<?php
namespace Tests\Helpers;

use Ydalbj\Utils\Helpers\ArrayHelper;
use Tests\TestCase;

class CharacterHelperTest extends TestCase
{
    /**
     * 测试keyBy方法
     */
    public function testKeyBy()
    {
        $data = [
            ['id' => 1, 'name' => 'a'],
            ['id' => 2, 'name' => 'b'],
        ];

        $converted = ArrayHelper::keyBy($data, 'id');

        $this->assertEquals(1, $converted[1]['id']);
        $this->assertEquals(2, $converted[2]['id']);
        $this->assertEquals('a', $converted[1]['name']);
        $this->assertEquals('b', $converted[2]['name']);
    }

    /**
     *
     */
    public function testSortArrayByFieldValues()
    {
        $data = [
            ['id' => 1, 'name' => 'a', 'sort' => 20],
            ['id' => 2, 'name' => 'b', 'sort' => 10],
            ['id' => 3, 'name' => 'c', 'sort' => 30],
        ];

        $sort_field = 'sort';
        $sort_values = [30, 10, 20];
        $sorted = ArrayHelper::sortArrayByFieldValues($data, $sort_field, $sort_values);

        $this->assertEquals($data[2], $sorted[0]);
        $this->assertEquals($data[1], $sorted[1]);
        $this->assertEquals($data[0], $sorted[2]);
    }
}
