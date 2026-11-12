<?php

namespace Milwad\LaravelValidate\Utils;

class Keccak
{
    /**
     * Round constants (big-endian hex).
     */
    private const array ROUND_CONSTANTS = [
        '0000000000000001', '0000000000008082', '800000000000808a', '8000000080008000',
        '000000000000808b', '0000000080000001', '8000000080008081', '8000000000008009',
        '000000000000008a', '0000000000000088', '0000000080008009', '000000008000000a',
        '000000008000808b', '800000000000008b', '8000000000008089', '8000000000008003',
        '8000000000008002', '8000000000000080', '000000000000800a', '800000008000000a',
        '8000000080008081', '8000000000008080', '0000000080000001', '8000000080008008',
    ];

    /**
     * Rotation offsets, indexed by x + 5y.
     */
    private const array ROTATIONS = [
        0, 1, 62, 28, 27,
        36, 44, 6, 55, 20,
        3, 10, 43, 25, 39,
        41, 45, 15, 21, 8,
        18, 2, 61, 56, 14,
    ];

    /**
     * Rate in bytes for Keccak-256 (1600 - 2 * 256 bits).
     */
    private const int RATE = 136;

    private static ?array $roundConstants = null;

    /**
     * Get the Keccak-256 hash of the given string as lowercase hex.
     */
    public static function hash256(string $input): string
    {
        $state = array_fill(0, 25, 0);

        // Keccak padding: 0x01 ... 0x80
        $input .= "\x01";
        $input .= str_repeat("\x00", (self::RATE - strlen($input) % self::RATE) % self::RATE);
        $input[strlen($input) - 1] = chr(ord($input[strlen($input) - 1]) | 0x80);

        foreach (str_split($input, self::RATE) as $block) {
            $lanes = array_values(unpack('P17', $block));

            for ($i = 0; $i < 17; $i++) {
                $state[$i] ^= $lanes[$i];
            }

            self::permute($state);
        }

        return bin2hex(pack('P4', $state[0], $state[1], $state[2], $state[3]));
    }

    /**
     * Keccak-f[1600] permutation.
     */
    private static function permute(array &$s): void
    {
        self::$roundConstants ??= array_map(
            fn (string $hex) => unpack('J', hex2bin($hex))[1],
            self::ROUND_CONSTANTS,
        );

        $b = array_fill(0, 25, 0);

        foreach (self::$roundConstants as $rc) {
            // Theta
            $c = [];
            for ($x = 0; $x < 5; $x++) {
                $c[$x] = $s[$x] ^ $s[$x + 5] ^ $s[$x + 10] ^ $s[$x + 15] ^ $s[$x + 20];
            }
            for ($x = 0; $x < 5; $x++) {
                $d = $c[($x + 4) % 5] ^ self::rotate($c[($x + 1) % 5], 1);
                for ($y = 0; $y < 25; $y += 5) {
                    $s[$x + $y] ^= $d;
                }
            }

            // Rho and Pi
            for ($x = 0; $x < 5; $x++) {
                for ($y = 0; $y < 5; $y++) {
                    $b[$y + 5 * ((2 * $x + 3 * $y) % 5)] = self::rotate($s[$x + 5 * $y], self::ROTATIONS[$x + 5 * $y]);
                }
            }

            // Chi
            for ($y = 0; $y < 25; $y += 5) {
                for ($x = 0; $x < 5; $x++) {
                    $s[$x + $y] = $b[$x + $y] ^ (~$b[($x + 1) % 5 + $y] & $b[($x + 2) % 5 + $y]);
                }
            }

            // Iota
            $s[0] ^= $rc;
        }
    }

    /**
     * Rotate a 64-bit integer left by $n bits.
     */
    private static function rotate(int $value, int $n): int
    {
        if ($n === 0) {
            return $value;
        }

        return ($value << $n) | (($value >> (64 - $n)) & ((1 << $n) - 1));
    }
}
