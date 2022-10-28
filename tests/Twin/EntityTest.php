<?php

namespace Tests\Twin;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Twin\Entity;

class TestEntity extends Entity
{
    public mixed $p1 = null;
    public string $p2 = '';
    public int $p3 = 0;
    public bool $p4 = true;
    public bool|float|null $p5 = null;
    public ?DateTimeImmutable $p6 = null;
    public string|TestEntity|null $p7 = null;

    public function __construct(array $properties, bool $ignoreNonExistingValues = true)
    {
        $propMap = [
            'p1',
            'p2',
            'p3',
            'p4',
            'p5',
            'p6' => ['castTo' => '?' . DateTimeImmutable::class],
            'p7' => ['castTo' => 'string|null|' . TestEntity::class]
        ];
        $this->assignProperties($properties, $propMap, $ignoreNonExistingValues);
    }
}

class EntityTest extends TestCase
{
    public function testAssignScalarProperties(): void
    {
        $props = [
            'p1' => 'foo',
            'p2' => 'abc',
            'p3' => 123,
            'p4' => false,
            'p5' => 1.23
        ];
        $entity = new TestEntity($props, true);

        $this->assertSame($props, $entity->toArray());
    }

    public function testAssignPropertiesWithTypeCasting(): void
    {
        $props = [
            'p6' => new DateTimeImmutable(),
            'p7' => [
                'p5' => true,
                'p7' => 'test'
            ]
        ];
        $entity = new TestEntity($props, true);

        $this->assertSame($props, $entity->toNestedArray());
    }

    public function testAssignPropertiesWithoutIgnoringNonExistent(): void
    {
        $entity = new TestEntity(['p2' => 'abc', 'p3' => 123, 'p4' => false], false);

        $this->assertSame([
            'p1' => null,
            'p2' => 'abc',
            'p3' => 123,
            'p4' => false,
            'p5' => null,
            'p6' => null,
            'p7' => null
        ], $entity->toArray());
    }
}