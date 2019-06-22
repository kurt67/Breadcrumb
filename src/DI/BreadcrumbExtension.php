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
        $config = $this->getConfig();

//        if (empty($config)) {
//            throw new \UnexpectedValueException("Please configure the Flexibee extensions using the section '{$this->name}:' in your config file.");
//        }


        $builder->addDefinition($this->prefix('sasule.breadcrumb'))
            ->setFactory(Breadcrumb::class/*, [$this->config['company'], $this->config['url'], $this->config['user'], $this->config['password']]*/)
            ->setAutowired(true);
    }
}