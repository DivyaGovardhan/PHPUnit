<?php

namespace DivyaGovardhan\PHPUnit;

use PHPUnit\Framework\TestCase;
use DivyaGovardhan\PHPUnit\Collect;

class CollectTest extends TestCase
{
    protected Collect $collection; // Явно указываем тип для коллекции

    protected function setUp(): void
    {
        // Инициализация коллекции с тестовыми данными перед каждым тестом
        $this->collection = new Collect([1 => 'a', 2 => 'b', 3 => 'c']);
    }

    // Тест для метода keys() - проверяет, что ключи коллекции возвращаются правильно
    public function testKeys(): void
    {
        $keys = $this->collection->keys();
        $this->assertEquals([1, 2, 3], $keys, 'Ключи коллекции должны совпадать с ожидаемыми.');
    }

    // Тест для метода values() - проверяет, что значения коллекции возвращаются правильно
    public function testValues(): void
    {
        $values = $this->collection->values();
        $this->assertEquals(['a', 'b', 'c'], $values, 'Значения коллекции должны совпадать с ожидаемыми.');
    }

    // Тест для метода get() - проверяет, что значение по заданному ключу возвращается правильно
    public function testGet(): void
    {
        $value = $this->collection->get(2);
        $this->assertEquals('b', $value, 'Значение по ключу 2 должно быть "b".');
    }

    // Тест для метода except() - проверяет, что исключение указанных ключей работает корректно
    public function testExcept(): void
    {
        $filtered = $this->collection->except([1, 3]);
        $this->assertEquals([2 => 'b'], $filtered->toArray(), 'Исключенные ключи должны вернуть правильные значения.');
    }
}
