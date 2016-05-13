<?php

namespace Spryker\Zed\Gui\Communication\Plugin\Twig\Buttons;

use Spryker\Zed\Library\Twig\TwigFunction;

abstract class AbstractButtonFunction extends TwigFunction
{

    /**
     * @return string
     */
    abstract protected function getButtonClass();

    /**
     * @return string
     */
    abstract protected function getIcon();

    /**
     * @return callable
     */
    protected function getFunction()
    {
        return function ($url, $title, $options = []) {

            $options[ButtonUrlGenerator::ICON] = $this->getIcon();
            $options[ButtonUrlGenerator::BUTTON_CLASS] = $this->getButtonClass();
            $options[ButtonUrlGenerator::DEFAULT_CSS_CLASSES] = static::DEFAULT_CSS_CLASSES;

            $button = new ButtonUrlGenerator($url, $title, $options);

            return $button->generate();
        };
    }

}