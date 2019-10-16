Абстрактный класс
======

встречаю такой код:


```
abstract class RbacAbstractUserActiveRecord extends ActiveRecord
{
	public function getRole()
	{
		return $this->getRoleObject()->name;
	}

	public function getRoleForView()
	{
		return $this->getRoleObject()->description;
	}

	public function setUserRole($roleName)
	{
		...
	}

	protected function roleExists(Role $role)
	{
		...
	}

	protected function removePreviousRoles()
	{
		...
	}

}
```

Бросается в глаза что абстрактный класс расширяется от ActiveRecord.

Далее от этого абстрактного класса расширяются ещё два класса.

Рою доку, нахожу что да, можно расширится от обычного класса как абстрактный класс, но везде в примерах есть ещё абстрактные методы в абстрактых классах, а тут нет.

Имеет ли смысл данный код? Код с реального проекта, написанного не мной.