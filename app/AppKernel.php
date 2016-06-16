<?php

namespace app;

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
    /**
     * Returns an array of bundles to register.
     *
     * @return BundleInterface[] An array of bundle instances.
     */
    public function registerBundles()
    {
        $bundles = [
            new FrameworkBundle(),
            new SecurityBundle(),
            new TwigBundle(),
            new MonologBundle(),
            new SensioFrameworkExtraBundle(),
            new AppBundle(),
        ];

        if ($this->getEnvironment() === 'dev') {
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
        $env = $this->getEnvironment() === 'dev' ? '_dev' : '';
        $config = sprintf('%s/config/config%s.yml', __DIR__, $env);

        $loader->load($config);
    }

    /**
     * Returns root dir
     *
     * @return string
     */
    public function getRootDir()
    {
        return __DIR__;
    }

    /**
     * Returns cache dir
     *
     * @return string
     */
    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    /**
     * Returns log dir
     *
     * @return string
     */
    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }
}
