<?php

namespace Test;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/model/Translator.php';

use Nette;
use Tester;
use Tester\Assert;
use App\Translator;

Tester\Environment::setup();


class TranslatorTests extends Tester\TestCase {

    /** @var Translator $translator */
    private $translator;

    public function __construct() {
        $this->translator = new Translator();
    }

    public function testOne() {
        Assert::equal('east-bay', $this->translator->translate('beast', '-'));
    }
    public function testTwo() {
        Assert::equal('ough-day',  $this->translator->translate('dough', '-'));
    }
    public function testThree() {
        Assert::equal('appy-hay',  $this->translator->translate('happy', '-'));
    }
    public function testFour() {
        Assert::equal('uestion´qay',  $this->translator->translate('question', '´'));
    }
    public function testFive() {
        Assert::equal('ar-stay',  $this->translator->translate('star', '-'));
    }
    public function testSix() {
        Assert::equal('eethray',  $this->translator->translate('three', ''));
    }
    public function testSeven() {
        Assert::equal('eagle´hay',  $this->translator->translate('eagle', '´'));
    }
    public function testEight()    {
        Assert::equal('ays-pray', $this->translator->translate('prays', '-'));
    }
    public function testNine() {
        Assert::equal('ay-spray',  $this->translator->translate('spray', '-'));
    }
}

$testCase = new TranslatorTests;
$testCase->run();

