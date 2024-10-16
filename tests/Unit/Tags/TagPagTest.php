<?php

declare(strict_types=1);

namespace Lucasnpinheiro\NotaFiscal\Tests\Unit\Tags;

use Lucasnpinheiro\NotaFiscal\Tags\TagPag;
use PHPUnit\Framework\TestCase;

class TagPagTest extends TestCase
{
    public function testCreate(): void
    {
        $tagPag = TagPag::create(10.0);

        $this->assertInstanceOf(TagPag::class, $tagPag);
        $this->assertSame(10.0, $tagPag->vTroco());
    }

    public function testCreateWithNullVTroco(): void
    {
        $tagPag = TagPag::create(null);

        $this->assertInstanceOf(TagPag::class, $tagPag);
        $this->assertNull($tagPag->vTroco());
    }

    public function testToArray(): void
    {
        $expectedArray = [
            'vTroco' => 10.0,
        ];

        $tagPag = TagPag::create(...$expectedArray);

        $this->assertSame($expectedArray, $tagPag->toArray());
    }
}