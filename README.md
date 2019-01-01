# 关于 Ydalbj/Utils

这是一个自定义PHP通用Helper类库(DateTime,Character相关辅助类),Trait类库(统计运行时间,内存使用情况)

## Installation

```
composer require Ydalbj\Utils
```

## Usage Example
```
use Ydalbj\Utils\Helpers\DateTimeHelper;

...

  $time = 12.123;
  $result = DataTimeHelper::formatMicrotime($time);

...
```

```
use Ydalbj\Utils\Traits\TimeLapseBehavior

class XXX {
   use TimeLapseBehavior;

   ...
    $name = 'test';
    $this->startRecordTime($name);
    $this->getElapsedTime($name);
   ...
```

#TODO 添加单元测试覆盖率检测
