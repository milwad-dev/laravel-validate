<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use InvalidArgumentException;
use Milwad\LaravelValidate\LaravelValidateServiceProvider;
use Milwad\LaravelValidate\Rules\ValidCssColor;
use Milwad\LaravelValidate\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidCssColorTest extends TestCase
{
    public static function validColors(): array
    {
        return array_map(fn ($color) => [$color], [
            // Hex
            '#fff', '#ffff', '#fcba03', '#fcba0380', '#FCBA03',
            // Named
            'red', 'RebeccaPurple', 'transparent', 'currentColor',
            // rgb(), legacy and modern
            'rgb(255, 0, 0)', 'rgba(255,0,0,0.5)', 'rgb(100%, 0%, 0%)', 'rgb(255 0 0)',
            'rgb(255 0 0 / 50%)', 'rgb(255 0 0/.5)', 'rgb(none 0 0)',
            // hsl(), legacy and modern
            'hsl(120, 100%, 50%)', 'hsla(120deg,100%,50%,.3)', 'hsl(120 100% 50%)', 'hsl(0.5turn 100 50 / 0.5)',
            // Newer color functions
            'hwb(120 10% 20%)', 'lab(50% 40 59.5)', 'lch(52.2% 72.2 50)',
            'oklab(0.6 0.1 -0.1)', 'oklch(0.7 0.15 180)', 'oklch(70% 0.15 180deg / 0.5)',
        ]);
    }

    public static function invalidColors(): array
    {
        return array_map(fn ($color) => [$color], [
            '#ff', '#fffff', '#ggg', 'fcba03', 'notacolor', 'foo(1 2 3)',
            'rgb(256,0,0)',            // out of range
            'rgb(255,0%,0)',           // legacy rgb() mixes numbers and percentages
            'rgb(255 0)',              // missing channel
            'rgb(255,0,0,2)',          // alpha out of range
            'rgb(255 0 0 /)',          // empty alpha
            'rgb(255 0 0 / 0.5 / 1)',  // two alphas
            'rgb(255, 0 0)',           // mixed comma and space syntax
            'rgb(none, 0, 0)',         // `none` is modern syntax only
            'rgb(1e5 0 0)',
            'hsl(120, 100, 50)',       // legacy hsl() needs percentages
            'hsl(120 101% 50%)',
            'hwb(120, 10%, 20%)',      // no legacy syntax for hwb()
            'oklch(2 0.1 180)',        // lightness above 1
            'lch(50 -1 20)',           // negative chroma
            "#fff\n", "red\n", "rgb(1 2 3)\n",
        ]);
    }

    #[DataProvider('validColors')]
    public function test_css_color_is_valid(string $color)
    {
        $this->assertTrue($this->validate($color));
    }

    #[DataProvider('invalidColors')]
    public function test_css_color_is_not_valid(string $color)
    {
        $this->assertFalse($this->validate($color));
    }

    /**
     * Test non-string values are not valid.
     */
    public function test_non_string_css_color_is_not_valid()
    {
        foreach ([123, ['#fff'], null, ''] as $value) {
            $this->assertFalse((new ValidCssColor)->passes('color', $value));
        }
    }

    /**
     * Test the accepted formats can be limited.
     */
    public function test_css_color_formats_can_be_limited()
    {
        $rule = new ValidCssColor([ValidCssColor::HEX, ValidCssColor::RGB]);

        $this->assertTrue($rule->passes('color', '#fcba03'));
        $this->assertTrue($rule->passes('color', 'rgba(0, 0, 0, 0.5)'));
        $this->assertFalse($rule->passes('color', 'red'));
        $this->assertFalse($rule->passes('color', 'hsl(120 100% 50%)'));
    }

    /**
     * Test the named color list holds all 148 CSS named colors.
     */
    public function test_named_color_list_is_complete()
    {
        // 148 named colors + transparent + currentcolor
        $this->assertCount(150, array_unique(ValidCssColor::NAMED_COLORS));
    }

    /**
     * Test an unknown format throws an exception.
     */
    public function test_unknown_format_throws_exception()
    {
        $this->expectException(InvalidArgumentException::class);

        new ValidCssColor(['hex', 'cmyk']);
    }

    /**
     * Test css color rule as a string rule when using container.
     */
    public function test_css_color_as_string_rule()
    {
        config(['laravel-validate.using_container' => true]);
        (new LaravelValidateServiceProvider($this->app))->boot();

        $validator = $this->app['validator'];

        $this->assertTrue($validator->make(['c' => 'red'], ['c' => 'ValidCssColor'])->passes());
        $this->assertTrue($validator->make(['c' => '#fff'], ['c' => 'ValidCssColor:hex,rgb'])->passes());
        $this->assertFalse($validator->make(['c' => 'red'], ['c' => 'ValidCssColor:hex,rgb'])->passes());
    }

    private function validate(string $color): bool
    {
        return $this->app['validator']
            ->make(['color' => $color], ['color' => [new ValidCssColor]])
            ->passes();
    }
}
