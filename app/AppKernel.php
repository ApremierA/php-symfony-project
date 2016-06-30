<?php

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle;
use Symfony\Bundle\DebugBundle\DebugBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * AppKernel
 */
class AppKernel extends Kernel
{
    const NON_PROD_ENV = ['dev', 'test'];

    /**
     * Returns an array of bundles to register.
     *
     * @return BundleInterface[] An array of bundle instances.
     */
    public function registerBundles() : array
    {
        $bundles = [
            new FrameworkBundle(),
            new SecurityBundle(),
            new TwigBundle(),
            new MonologBundle(),
            new SensioFrameworkExtraBundle(),
            new AppBundle(),
        ];

        if (in_array($this->getEnvironment(), self::NON_PROD_ENV, true)) {
            $bundles[] = new DebugBundle();
            $bundles[] = new WebProfilerBundle();
            $bundles[] = new SensioGeneratorBundle();
        }

        return $bundles;
    }

    /**
     * Loads the container configuration.
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     *
     * @return void
     * @throws \Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $env = '';
        if (in_array($this->getEnvironment(), self::NON_PROD_ENV, true)) {
            $env = sprintf('_%s', $this->getEnvironment());
        }

        $loader->load($this->getRootDir().'/config/config'.$env.'.yml');
    }

    /**
     * Returns root dir
     *
     * @return string
     */
    public function getRootDir() : string
    {
        return __DIR__;
    }

    /**
     * Returns cache dir
     *
     * @return string
     */
    public function getCacheDir() : string
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    /**
     * Returns log dir
     *
     * @return string
     */
    public function getLogDir() : string
    {
        return dirname(__DIR__).'/var/logs';
    }
}
