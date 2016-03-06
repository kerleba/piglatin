<?php

namespace App\Presenters;

use Nette\Application\UI;
use App\Translator;


define('SEPARATOR', ['-', '´', '']);

class HomepagePresenter extends UI\Presenter
{
    /**
     * @var Translator
     */
    private $translator;

    /**
     * @return UI\Form
     */
    protected function createComponentTranslationForm()
    {
        $this->translator = new Translator();
        $form = new UI\Form;
        $form->addText('text', 'Insert text for translation:');
        $form->addSubmit('translate', 'Translate');
        $form->addSelect('separator', 'Select separator:', ['hyphen', 'apostrophe', 'nothing']);
        $form->addText('translated', 'Translated text:')->setDisabled();
        $form->onSuccess[] = array($this, 'translationFormSucceeded');
        return $form;
    }

    /**
     * @param UI\Form $form
     * @param $values
     */
    public function translationFormSucceeded(UI\Form $form, $values) {
        $form['translated']->setvalue($this->translator->translate($values['text'], SEPARATOR[$values['separator']]));
    }
}
