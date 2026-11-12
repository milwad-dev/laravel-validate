<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidNoEmoji;
use Milwad\LaravelValidate\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidNoEmojiTest extends TestCase
{
    public static function textWithoutEmoji(): array
    {
        return [
            'plain text' => ['Hello world'],
            'persian' => ['سلام دنیا'],
            'japanese' => ['こんにちは'],
            'accents' => ['naïve café'],
            'legal symbols' => ['© 2026 Milwad ™ ®'],
            'arrows and currency' => ['Price: 10€ → 20€'],
            'text-style symbols' => ['☺ ‼ ↔ ▶ ☀ ✔'],
            'digits, # and *' => ['1 + 1 = 2 # done *'],
            'zero width joiner alone' => ["x\u{200D}y"],
        ];
    }

    public static function textWithEmoji(): array
    {
        return [
            'face' => ['Hello 😀'],
            'rocket' => ['🚀'],
            'skin tone' => ['👍🏽'],
            'family (ZWJ sequence)' => ['👨‍👩‍👧'],
            'flag' => ['🇮🇷'],
            'subdivision flag' => ['🏴󠁧󠁢󠁳󠁣󠁴󠁿'],
            'heart with variation selector' => ['❤️'],
            'smiley with variation selector' => ['☺️'],
            'keycap' => ['1️⃣'],
            'keycap without variation selector' => ['#⃣'],
            'check mark button' => ['✅ done'],
            'watch' => ['⌚'],
            'single regional indicator' => ["\u{1F1E6}"],
        ];
    }

    #[DataProvider('textWithoutEmoji')]
    public function test_text_without_emoji_is_valid(string $text)
    {
        $this->assertTrue($this->validate($text));
    }

    #[DataProvider('textWithEmoji')]
    public function test_text_with_emoji_is_not_valid(string $text)
    {
        $this->assertFalse($this->validate($text));
    }

    /**
     * Test non-string values and invalid UTF-8 are not valid.
     */
    public function test_non_string_and_invalid_utf8_is_not_valid()
    {
        foreach ([123, ['Hello'], null, "\xC3\x28"] as $value) {
            $this->assertFalse((new ValidNoEmoji)->passes('text', $value));
        }
    }

    /**
     * Test the built-in ranges agree with PCRE's Emoji_Presentation property, where it is supported.
     */
    public function test_ranges_match_emoji_presentation_property()
    {
        if (@preg_match('/\p{Emoji_Presentation}/u', '') === false) {
            $this->markTestSkipped('This PCRE version does not support \p{Emoji_Presentation}.');
        }

        $rule = new ValidNoEmoji;

        foreach ([0x2600, 0x2700, 0x1F000, 0x1F300, 0x1F600, 0x1F900, 0x1FA00] as $blockStart) {
            for ($cp = $blockStart; $cp < $blockStart + 0x100; $cp++) {
                $char = mb_chr($cp, 'UTF-8');
                $isEmoji = preg_match('/\p{Emoji_Presentation}/u', $char) === 1;

                $this->assertSame(! $isEmoji, $rule->passes('text', $char), sprintf('Mismatch at U+%04X', $cp));
            }
        }
    }

    private function validate(string $text): bool
    {
        return $this->app['validator']
            ->make(['text' => $text], ['text' => [new ValidNoEmoji]])
            ->passes();
    }
}
