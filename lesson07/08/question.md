yield не только возвращает, но и принимает значения
======

Нашёл возможность у генераторов:

> yield does not only return values; it can receive values from the outside as well."

Почему эта возможность не была затронута в теме про генераторы? 
Возможно, Дмитрий считает, что так не надо делать. Тогда, такой же вопрос - почему?)

Пример, тут скомбинирован возврат и прием значений.

```
<?php
function nums() {
    for ($i = 0; $i < 5; ++$i) {
        // get a value from the caller
        $cmd = (yield $i);
        if ($cmd == 'stop') {
            return; // exit the generator
        }
    }
}

$gen = nums();

foreach ($gen as $v) {
    // we are satisfied
    if ($v == 3) {
        $gen->send('stop');
    }
    echo "{$v}\n";
}
```