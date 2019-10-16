Абстрактный репозиторий?
======

Как вам идея создать абстрактный репозиторий, с базовыми операциями, а энтэти бросать через protected поле - по аналогии с RestController

```
class AbstractRepository implements RepositoryContract
{   
    protected $entityClass = null;

    public function find($id) {}

    public function findAll() {}
}
```

Что думаете?