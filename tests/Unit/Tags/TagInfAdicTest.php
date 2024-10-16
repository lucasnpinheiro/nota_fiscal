<?php

declare(strict_types=1);

namespace Lucasnpinheiro\NotaFiscal\Tests\Unit\Tags;

use Lucasnpinheiro\NotaFiscal\Tags\TagInfAdic;
use PHPUnit\Framework\TestCase;

class TagInfAdicTest extends TestCase
{
    public function testCreate(): void
    {
        $tagInfAdic = TagInfAdic::create('infAdFisco', 'infCpl');

        $this->assertInstanceOf(TagInfAdic::class, $tagInfAdic);
        $this->assertSame('infAdFisco', $tagInfAdic->infAdFisco());
        $this->assertSame('infCpl', $tagInfAdic->infCpl());
    }

    public function testCreateWithNullValues(): void
    {
        $tagInfAdic = TagInfAdic::create();

        $this->assertInstanceOf(TagInfAdic::class, $tagInfAdic);
        $this->assertNull($tagInfAdic->infAdFisco());
        $this->assertNull($tagInfAdic->infCpl());
    }

    public function testToArray(): void
    {
        $expectedArray = [
            'infAdFisco' => 'infAdFisco',
            'infCpl' => 'infCpl',
        ];

        $tagInfAdic = TagInfAdic::create(...$expectedArray);

        $this->assertSame($expectedArray, $tagInfAdic->toArray());
    }
}