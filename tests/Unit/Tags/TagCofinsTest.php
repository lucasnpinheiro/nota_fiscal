<?php

declare(strict_types=1);

namespace NotaFiscal\Tests\Unit\Tags;

use NotaFiscal\Tags\TagCofins;
use PHPUnit\Framework\TestCase;

class TagCofinsTest extends TestCase
{
    public function testCreate(): void
    {
        $tagCofins = TagCofins::create(1, 'CST456', 200.0, 150.0, 0.8);

        $this->assertInstanceOf(TagCofins::class, $tagCofins);
        $this->assertSame(1, $tagCofins->item());
        $this->assertSame('CST456', $tagCofins->CST());
        $this->assertSame(200.0, $tagCofins->vCOFINS());
        $this->assertSame(150.0, $tagCofins->vBC());
        $this->assertSame(0.8, $tagCofins->pCOFINS());
        $this->assertNull($tagCofins->qBCProd());
        $this->assertNull($tagCofins->vAliqProd());
    }

    public function testQBCProd(): void
    {
        $tagCofins = TagCofins::create(1, 'CST456', 200.0, 150.0, 0.8, 10.0);

        $this->assertSame(10.0, $tagCofins->qBCProd());
    }

    public function testVAliqProd(): void
    {
        $tagCofins = TagCofins::create(1, 'CST456', 200.0, 150.0, 0.8, null, 5.0);

        $this->assertSame(5.0, $tagCofins->vAliqProd());
    }

    public function testToArray(): void
    {
        $tagCofins = TagCofins::create(1, 'CST456', 200.0, 150.0, 0.8, 10.0, 5.0);

        $expectedArray = [
            'item' => 1,
            'CST' => 'CST456',
            'vCOFINS' => 200.0,
            'vBC' => 150.0,
            'pCOFINS' => 0.8,
            'qBCProd' => 10.0,
            'vAliqProd' => 5.0,
        ];

        $this->assertSame($expectedArray, $tagCofins->toArray());
    }
}