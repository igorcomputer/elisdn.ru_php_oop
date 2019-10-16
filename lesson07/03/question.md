Вызов класса
======

После проработки 3 урока села пройти очередное тестирование каверзных вопросов по ООП и в одной серии тестов встретилось 3 вопроса, где встречается как бы это правильно обозвать - вызов класса, внутри этого же класса.

```
class Example 
{ 
    private $private = 'private';     
    protected $protected = 'protected';     
    public $public = 'public';
     
    const CONSTANT = 'CONST'; 
     
    public function echo_all(Example $other) { 
          echo $other->protected . "\n"; 
          echo $other->public . "\n";      
          echo $other->private . "\n"; 
          echo $other::CONSTANT . "\n";                
    } 
} 
 
$ex = new Example; 
$ex->echo_all(new Example);
```

В реальном программировании на ООП в том же Yii2 пока такое не встречалась. Где в реальном мире используются такие приемы и где их нужно использовать? Я бы сама никогда такое не реализовала, это же надо так заморочится.