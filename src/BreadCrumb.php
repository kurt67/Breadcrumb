<?php

namespace Sasule\Breadcrumb;

use Nette\Application\UI\Control;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Framework;
use Nette\Localization\ITranslator;

/**
 * Class Breadcrumb
 * @package Sasule\Breadcrumb
 */
class Breadcrumb extends Control
{
	const LINK_TITLE = 'title';

	const LINK_TARGET = 'target';

	const LINK_PARAMETERS = 'parameters';

	/**
	 * @var array
	 */
	protected $breadcrumbLinks = [];

	/**
	 * @var ITranslator
	 */
	protected $translator;

	/**
	 * Breadcrumb constructor.
	 * @param ITranslator|null $translator
	 */
	public function __construct(ITranslator $translator = null)
	{

		if (Framework::VERSION_ID < 30000) {
			parent::__construct();
		}

		$this->translator = $translator;

	}

	/**
	 * @var string
	 */
	protected $templateFile = __DIR__ . '/template/bs4.latte';

	/**
	 * @param string $templateFile
	 * @return $this
	 */
	public function setTemplateFile(string $templateFile)
	{
		$this->templateFile = $templateFile;

		return $this;
	}


	public function render()
	{
		/* @var $template Template|\stdClass */
		$template = clone $this->getTemplate();
		$template->setFile($this->templateFile);

		$template->breadcrumbLinks = $this->breadcrumbLinks;

		$template->render();
	}

	/**
	 * @param string $title
	 * @param string $target
	 * @param array $parameters
	 * @return $this
	 */
	public function addLink(string $title, string $target, array $parameters = [])
	{
		$this->breadcrumbLinks[] = [
			self::LINK_TITLE => $title,
			self::LINK_TARGET => $target,
			self::LINK_PARAMETERS => $parameters,
		];

		return $this;
	}

	/**
	 * @param string $title
	 * @param string $target
	 * @param array $parameters
	 * @return $this
	 */
	public function addLinkLocalised(string $title, string $target, array $parameters = [])
	{
		$this->breadcrumbLinks[] = [
			self::LINK_TITLE => ($this->translator) ? $this->translator->translate($title) : $title,
			self::LINK_TARGET => $target,
			self::LINK_PARAMETERS => $parameters,
		];

		return $this;
	}

}