<?php
declare(strict_types=1);

namespace Sasule\Breadcrumb;

use Nette\Application\UI\Control;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Localization\Translator;

/**
 * Class Breadcrumb
 * @package Sasule\Breadcrumb
 */
class Breadcrumb extends Control
{
	const LINK_TITLE = 'title';

	const LINK_TARGET = 'target';

	const LINK_PARAMETERS = 'parameters';

	protected array $breadcrumbLinks = [];

	protected ?Translator $translator = null;


	/**
	 * Breadcrumb constructor.
	 * @param Translator|null $translator
	 */
	public function __construct(Translator | null $translator = null)
	{

		$this->translator = $translator;

	}


	protected string $templateFile = __DIR__ . '/template/bs4.latte';


	/**
	 * @param string $templateFile
	 * @return $this
	 */
	public function setTemplateFile(string $templateFile): Breadcrumb
	{
		$this->templateFile = $templateFile;

		return $this;
	}


	public function render(): void
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
	public function addLink(string $title, string $target = null, array $parameters = []): Breadcrumb
	{
		$this->breadcrumbLinks[] = [
			self::LINK_TITLE      => $title,
			self::LINK_TARGET     => $target,
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
	public function addLinkLocalised(string $title, string $target, array $parameters = []): Breadcrumb
	{
		$this->breadcrumbLinks[] = [
			self::LINK_TITLE      => ($this->translator) ? $this->translator->translate($title) : $title,
			self::LINK_TARGET     => $target,
			self::LINK_PARAMETERS => $parameters,
		];

		return $this;
	}

}
