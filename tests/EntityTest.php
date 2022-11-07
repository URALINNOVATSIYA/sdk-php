<?php

namespace Tests\Twin\Sdk;

use DateTimeImmutable;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Twin\Sdk\Entity;

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
            'p7' => ['castTo' => 'string|null|' . TestEntity::class],
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

    public function testAssignPropertiesWithIgnoringNonExistent(): void
    {
        $entity = new TestEntity(['p2' => 'abc', 'p3' => 123, 'p4' => false], true);

        $this->assertSame([
            'p2' => 'abc',
            'p3' => 123,
            'p4' => false,
        ], $entity->toArray());
        $this->assertTrue($entity->propertyExists('p3'));
        $this->assertFalse($entity->propertyExists('p1'));
        $this->assertFalse($entity->propertyExists('p5'));
        $this->assertFalse($entity->propertyExists('p6'));
        $this->assertFalse($entity->propertyExists('p7'));
    }

    public function testInvalidTypeAssignmentForSingleType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage(
            'Invalid format of the test entity: p2 must be an instance of type string, int used.'
        );

        new TestEntity(['p2' => 123], true);
    }

    public function testInvalidTypeAssignmentForUnionType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage(
            'Invalid format of the test entity: p5 must be an instance of type float, bool or null, array used.'
        );

        new TestEntity(['p5' => []], true);
    }

    public function testInvalidTypeCastingOfSingleType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage(
            'Invalid format of the test entity: p6 must be an instance of type ' .
            'DateTimeImmutable or null, bool used.'
        );

        new TestEntity(['p6' => true], true);
    }

    public function testInvalidTypeCastingOfUnionType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage(
            'Invalid format of the test entity: p7 must be an instance of type ' .
            'string, ' . TestEntity::class . ' or null, float used.'
        );

        new TestEntity(['p7' => 3.45], true);
    }

    public function testToArrayIgnoringNulls(): void
    {
        $props = [
            'p1' => .45,
            'p2' => 'abc',
            'p3' => 123,
            'p4' => false
        ];
        $entity = new TestEntity($props, false);

        $this->assertSame($props, $entity->toArray(true));
    }

    public function testToNestedArrayIgnoringNulls(): void
    {
        $props = [
            'p2' => 'abc',
            'p3' => 123,
            'p4' => false,
            'p7' => [
                'p2' => 'test',
                'p3' => 1,
                'p4' => true
            ]
        ];
        $entity = new TestEntity($props, false);

        $this->assertSame($props, $entity->toNestedArray(true));
    }
}