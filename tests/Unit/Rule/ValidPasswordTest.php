<?php

namespace Tests\Unit\Rule;

use App\Rules\ValidPassword;
use PHPUnit\Framework\TestCase;

class ValidPasswordTest extends TestCase
{
    protected $rule;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rule = new ValidPassword;
    }

    public function test_good_password()
    {
        $password = 'Abcd123@EfGh';
        $this->isPasswordCorrect($password);
    }

    public function test_no_small_letter_in_password()
    {
        $password = 'ASBDASI12@@@@@!@$';
        $this->isPasswordNotCorrect($password);
    }

    public function test_no_capital_letter_in_password()
    {
        $password = 'aaasdsadk111@@';
        $this->isPasswordNotCorrect($password);
    }

    public function test_no_digit_in_password()
    {
        $password = 'asdasdbbBBB@LK:KK';
        $this->isPasswordNotCorrect($password);
    }

    public function test_no_special_letter_in_password()
    {
        $password = 'PoewEOPWKEWQKEAaEW2331';
        $this->isPasswordNotCorrect($password);
    }

    private function verifyPassword($password)
    {
        return $this->rule->passes('test', $password);
    }

    private function isPasswordCorrect($password)
    {
        $this->assertTrue($this->verifyPassword($password));
    }

    private function isPasswordNotCorrect($password)
    {
        $this->assertFalse($this->verifyPassword($password));
    }
}
