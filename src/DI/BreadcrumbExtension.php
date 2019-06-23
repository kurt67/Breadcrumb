<?php

namespace Sasule\Breadcrumb\DI;

use Nette\DI\CompilerExtension;
use Sasule\Breadcrumb\Breadcrumb;

/**
 * Class BreadcrumbExtension
 * @package Sasule\Breadcrumb\DI
 */
class BreadcrumbExtension extends CompilerExtension
{
	/**
	 * Loads configuration
	 */
	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();


		$builder->addDefinition($this->prefix('sasule.breadcrumb'))
			->setFactory(Breadcrumb::class)
			->setAutowired(true);
	}
}